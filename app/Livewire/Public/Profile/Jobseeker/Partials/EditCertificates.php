<?php

namespace App\Livewire\Public\Profile\Jobseeker\Partials;

use App\Models\Certificate;
use App\Models\Certificate_Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditCertificates extends Component
{
    public $certName, $certTypeID, $certFrom, $certEarned, $certRate, $certID;
    // $workPosition, $workPositionTitle, $workStatus = "", $workAdd, $workStart, $workEnd, $workID;
    public $userID;
    public $search;

    // public function rules()
    // {
    //     return [
    //         'certName' => ['required', 'string'],
    //         'certFrom' => ['required', 'string'],
    //         'certEarned' => ['required'],
    //         'certRate' => ['required'],
    //     ];
    // }

    public function save()
    {
        $rules = [
            'certName' => [
                'required',
                'string',
                'max:255', // Optional: add a max length if needed
            ],
            'certFrom' => [
                'required',
                'string',
                'max:255', // Optional: add a max length if needed
            ],
            'certEarned' => [
                'required',
                'date', // Ensures the value is a valid date
                'before_or_equal:today', // Optional: ensure the date is not in the future
            ],
            'certRate' => [
                'required',
                'numeric', // Ensures the value is a number
                'min:0', // Optional: ensures the value is non-negative
                'max:100', // Optional: if the rate should be a percentage, this limits it to 100
            ],
        ];

        $messages = [
            'certName.required' => 'The certificate name is required.',
            'certName.string' => 'The certificate name must be a string.',
            'certName.max' => 'The certificate name must not exceed 255 characters.',
            'certFrom.required' => 'The certificate provider is required.',
            'certFrom.string' => 'The certificate provider must be a string.',
            'certFrom.max' => 'The certificate provider must not exceed 255 characters.',
            'certEarned.required' => 'The date when the certificate was earned is required.',
            'certEarned.date' => 'The date earned must be a valid date.',
            'certEarned.before_or_equal' => 'The date earned must be today or in the past.',
            'certRate.required' => 'The certificate rate is required.',
            'certRate.numeric' => 'The certificate rate must be a number.',
            'certRate.min' => 'The certificate rate must be at least 0.',
            'certRate.max' => 'The certificate rate must not exceed 100.',
        ];

        // Validate input
        $this->validate($rules, $messages);

        // Begin transaction
        DB::beginTransaction();

        try {
            if ($this->certID) {
                // Update existing record
                $certificate = Certificate::find($this->certID);

                if (!$certificate) {
                    toastr()->error('Certificate not found.');
                    DB::rollBack();
                    return;
                }

                // Update attributes if they are changed
                $certificate->cert_Type_id = $this->certTypeID;
                $certificate->cert_From = $this->certFrom;
                $certificate->cert_Date_Issued = $this->certEarned;
                $certificate->cert_Rating = $this->certRate;

                if ($certificate->isDirty()) {
                    $certificate->save();
                    toastr()->success('Certificate Record has been Updated!');
                } else {
                    toastr()->info('No changes detected. Certificate Record remains the same.');
                }
            } else {
                // Create new record
                Certificate::create([
                    'employee_id' => $this->userID,
                    'cert_Type_id' => $this->certTypeID,
                    'cert_From' => $this->certFrom,
                    'cert_Date_Issued' => $this->certEarned,
                    'cert_Rating' => $this->certRate,
                ]);

                toastr()->success('New Certificate Record Created!');
            }

            DB::commit(); // Commit transaction
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            toastr()->error('There was an Error: ' . $e->getMessage());
        }
        // Close the modal and dispatch an event
        $this->close();
        $this->dispatch('reload-table');
    }

    public function certtypeid($certid)
    {

        $this->certTypeID = $certid;
        $this->certName = Certificate_Type::find($certid)->cert_Name;
//iba sa Khen code idk if may bearing but its working lol
    }

    public function editModal($id)
    {
        $this->certID = $id;

        $certinfo = Certificate::find($id);

        $this->certName = $certinfo->certificateType->cert_Name;
        $this->certFrom = $certinfo->cert_From;
        $this->certEarned = Carbon::parse($certinfo->cert_Date_Issued)->format('Y-m-d');
        $this->certRate = $certinfo->cert_Rating;

        $this->certTypeID = $certinfo->cert_Type_id;

        $this->dispatch('open-modal', 'certificate-modal');
    }

    public function addModal()
    {
        $this->reset('certName', 'certFrom', 'certEarned', 'certRate', 'certID', 'search', 'certTypeID');
        $this->dispatch('open-modal', 'certificate-modal');
    }

    public function close()
    {
        $this->reset('certName', 'certFrom', 'certEarned', 'certRate', 'certID', 'search', 'certTypeID');
        $this->dispatch('close-modal', 'certificate-modal');
    }

    public function render()
    {
        $certs = Certificate::where('employee_id', '=', $this->userID)
            ->orderBy('cert_Date_Issued', 'desc')
            ->get();

        $certTypes = Certificate_Type::where('cert_Name', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.public.profile.jobseeker.partials.edit-certificates', compact('certs', 'certTypes'));
    }
}

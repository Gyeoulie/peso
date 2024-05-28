<?php

namespace App\Livewire\Public\Profile\Jobseeker\Partials;

use App\Models\Certificate_Type;
use App\Models\Certificate;
use Carbon\Carbon;
use Livewire\Component;


class EditCertificates extends Component
{
    public $certName, $certTypeID, $certFrom, $certEarned, $certRate, $certID;
    // $workPosition, $workPositionTitle, $workStatus = "", $workAdd, $workStart, $workEnd, $workID;     
    public $userID;
    public $search;


    public function rules()
    {
        return [
            'certName' => ['required', 'string'],
            'certFrom' => ['required', 'string'],
            'certEarned' => ['required'],
            'certRate' => ['required'],
        ];
    }


    public function save()
    {
        $this->validate();

        if ($this->certID) {

            try {
                // Create the user record
                Certificate::where('cert_id', $this->certID)->update([
                    'cert_Type_id' => $this->certTypeID,
                    'cert_From' => $this->certFrom,
                    'cert_Date_Issued' => $this->certEarned,
                    'cert_Rating' => $this->certRate,
                ]);

                toastr()->success('Work Experience Record has been Updated!');
            } catch (\Exception $e) {

                // Show error toastr notification
                toastr()->error('There was an Error');
            }
        } else {

            try {
                // Create the user record
                Certificate::create([
                    'employee_id' => $this->userID,
                    'cert_Type_id' => $this->certTypeID,
                    'cert_From' => $this->certFrom,
                    'cert_Date_Issued' => $this->certEarned,
                    'cert_Rating' => $this->certRate,
                ]);
                toastr()->success('New Work Experience Record Created!');
            } catch (\Exception $e) {

                // Show error toastr notification
                toastr()->error('There was an Error');
            }
        }

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

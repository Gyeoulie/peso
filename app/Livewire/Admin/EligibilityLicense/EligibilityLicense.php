<?php

namespace App\Livewire\Admin\EligibilityLicense;

use App\Models\Eligibility_Type;
use App\Models\License_Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class EligibilityLicense extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $rows = 10;

    public $searchEligiblity, $searchLicense;

    public $eligibilityPost, $ecodePost, $eligibilityID;

    public $licensePost, $lcodePost, $licenseID;

    public function saveEligibility()
    {

        if ($this->eligibilityID) {
            $rules = [
                'eligibilityID' => ['required'],
                'eligibilityPost' => ['required', 'string', Rule::unique('eligibility_type', 'eligibility_Name')->ignore($this->eligibilityID, 'eligibility_type_id')],
                'ecodePost' => ['required', 'string', Rule::unique('eligibility_type', 'eligibility_Code')->ignore($this->eligibilityID, 'eligibility_type_id')],
            ];

            $messages = [
                'eligibilityID.required' => 'The eligiblity ID is required.',
                'eligibilityPost.required' => 'The eligiblity title is required.',
                'eligibilityPost.string' => 'The eligiblity title must be a string.',
                'eligibilityPost.unique' => 'The eligiblity title has already been taken.',
                'ecodePost.required' => 'The eligiblity code is required.',
                'ecodePost.string' => 'The eligiblity code must be a string.',
                'ecodePost.unique' => 'The eligiblity code has already been taken.',
            ];

            $this->validate($rules, $messages);
            DB::beginTransaction();

            try {
                $eligibility_type = Eligibility_Type::findOrFail($this->eligibilityID);

                $eligibility_type->eligibility_Name = strtoupper($this->eligibilityPost);
                $eligibility_type->eligibility_Code = strtoupper($this->ecodePost);
                if ($eligibility_type->isDirty()) {
                    $eligibility_type->save();
                    toastr()->success('Eligibility has been updated!');
                } else {
                    toastr()->info('No changes detected.');
                }
                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error updating the job position.');
            }
        } else {
            $rules = [
                'eligibilityPost' => ['required', 'string', Rule::unique('eligibility_type', 'eligibility_Name')],
                'ecodePost' => ['required', 'string', Rule::unique('eligibility_type', 'eligibility_Code')],
            ];

            $messages = [
                'eligibilityPost.required' => 'The eligiblity title is required.',
                'eligibilityPost.string' => 'The eligiblity title must be a string.',
                'eligibilityPost.unique' => 'The eligiblity title has already been taken.',
                'ecodePost.required' => 'The eligiblity code is required.',
                'ecodePost.string' => 'The eligiblity code must be a string.',
                'ecodePost.unique' => 'The eligiblity code has already been taken.',
            ];

            $this->validate($rules, $messages);
            DB::beginTransaction();
            try {
                Eligibility_Type::create([
                    'eligibility_Name' => strtoupper($this->eligibilityPost),
                    'eligibility_Code' => strtoupper($this->ecodePost),
                ]);
                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error updating the eligibility record.');
            }
            toastr()->success('Eligibility Created!');
        }

        $this->close('eligibility');

    }

    public function editEligibility($id)
    {

        $eligibility = Eligibility_Type::findOrFail($id);

        if ($eligibility) {
            $this->eligibilityID = $eligibility->eligibility_type_id;
            $this->eligibilityPost = $eligibility->eligibility_Name;
            $this->ecodePost = $eligibility->eligibility_Code;
            $this->dispatch('open-modal', 'eligibility-modal');
        } else {
            toastr()->error('There was an error in finding the data.');
        }
    }

    public function saveLicense()
    {

        if ($this->licenseID) {
            $rules = [
                'licenseID' => ['required'],
                'licensePost' => ['required', 'string', Rule::unique('license_type', 'license_Name')->ignore($this->licenseID, 'license_type_id')],
                'lcodePost' => ['required', 'string', Rule::unique('license_type', 'license_Code')->ignore($this->licenseID, 'license_type_id')],
            ];

            $messages = [
                'licenseID.required' => 'The license ID is required.',
                'licensePost.required' => 'The license title is required.',
                'licensePost.string' => 'The license title must be a string.',
                'licensePost.unique' => 'The license title has already been taken.',
                'lcodePost.required' => 'The license code is required.',
                'lcodePost.string' => 'The license code must be a string.',
                'lcodePost.unique' => 'The license code has already been taken.',

            ];

            $this->validate($rules, $messages);
            DB::beginTransaction();

            try {
                $license = License_Type::findOrFail($this->licenseID);

                $license->license_Name = strtoupper($this->licensePost);
                $license->license_Code = strtoupper($this->lcodePost);
                if ($license->isDirty()) {
                    $license->save();
                    toastr()->success('License has been updated!');
                } else {
                    toastr()->info('No changes detected.');
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error updating the license.');
            }
        } else {
            $rules = [
                'licensePost' => ['required', 'string', Rule::unique('license_type', 'license_Name')],
                'lcodePost' => ['required', 'string', Rule::unique('license_type', 'license_Code')],
            ];

            $messages = [
                'licenseID.required' => 'The license ID is required.',
                'licensePost.required' => 'The license title is required.',
                'licensePost.string' => 'The license title must be a string.',
                'licensePost.unique' => 'The license title has already been taken.',
                'lcodePost.required' => 'The license code is required.',
                'lcodePost.string' => 'The license code must be a string.',
                'lcodePost.unique' => 'The license code has already been taken.',
            ];

            $this->validate($rules, $messages);
            DB::beginTransaction();

            try {
                License_Type::create([
                    'license_Name' => strtoupper($this->licensePost),
                    'license_Code' => strtoupper($this->lcodePost), // Validate role selection
                ]);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                toastr()->error('There was an error updating the license.');
            }

            toastr()->success('License Created!');
        }
        $this->close('License');

    }

    public function editLicense($id)
    {
        $license = License_Type::findOrFail($id);

        if ($license) {
            $this->licenseID = $license->license_type_id;
            $this->licensePost = $license->license_Name;
            $this->lcodePost = $license->license_Code;
            $this->dispatch('open-modal', 'license-modal');
        } else {
            toastr()->error('There was an error in finding the data.');
        }
    }

    public function open($modal)
    {
        $this->resetExcept('searchEligiblity', 'searchLicense', 'rows');
        $this->resetValidation();
        $this->dispatch('open-modal', $modal . '-modal');

    }

    public function close($modal)
    {
        $this->dispatch('close-modal', $modal . '-modal');
        $this->resetExcept('searchEligiblity', 'searchLicense', 'rows');
        $this->resetValidation();
    }

    public function render()
    {
        $eligibility = Eligibility_Type::where('eligibility_Name', 'like', '%' . $this->searchEligiblity . '%')
            ->orderBy('eligibility_Name', 'asc')
            ->paginate($this->rows);

        $license = License_Type::where('license_Name', 'like', '%' . $this->searchLicense . '%')
            ->orderBy('license_Name', 'asc')
            ->paginate($this->rows);

        return view('livewire.admin.eligibility-license.eligibility-license', compact('eligibility', 'license'));
    }
}

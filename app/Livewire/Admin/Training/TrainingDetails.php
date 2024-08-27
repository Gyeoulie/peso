<?php

namespace App\Livewire\Admin\Training;

use App\Models\Employee;
use App\Models\Programs;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class TrainingDetails extends Component
{

    public $id;

    public function editTraining($id)
    {
        session()->put('programData', $this->id);

        $this->redirectRoute('admin-edit-training', navigate: true);

    }

    public function getMatched($programInfo)
    {
        $programMunicipalityId = $programInfo->municipality_id;
        $jobIndustryId = $programInfo->industry_id;
        $jobTagIds = $programInfo->program_tags->pluck('position_id');

        return Employee::whereHas('barangay.municipality', function ($query) use ($programMunicipalityId) {
            $query->where('municipality_id', $programMunicipalityId);
        })
            ->whereHas('job_preference', function ($query) use ($jobTagIds) {
                $query->whereIn('position_id', $jobTagIds);
            })
            ->withCount(['job_preference as num_matched_tags' => function ($query) use ($jobTagIds) {
                $query->whereIn('position_id', $jobTagIds);
            }])
            ->withCount(['industry_preference as num_matched_industry' => function ($query) use ($jobIndustryId) {
                $query->where('industry_id', $jobIndustryId);
            }])
            ->orderByRaw('
                CASE
                    WHEN num_matched_industry > 0 AND num_matched_tags > 0 THEN 1
                    WHEN num_matched_industry > 0 AND num_matched_tags = 0 THEN 2
                    WHEN num_matched_industry = 0 AND num_matched_tags > 0 THEN 3
                    ELSE 4
                END
            ')
            ->orderByDesc('num_matched_tags')
            ->get();
    }

    public function render()
    {

        $programInfo = Programs::findOrFail($this->id);

        $matchingEmployees = $this->getMatched($programInfo);

        return view('livewire.admin.training.training-details', compact('programInfo', 'matchingEmployees'));
    }
}

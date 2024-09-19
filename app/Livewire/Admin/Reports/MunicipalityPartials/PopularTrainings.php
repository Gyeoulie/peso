<?php

namespace App\Livewire\Admin\Reports\MunicipalityPartials;

use App\Models\Programs;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class PopularTrainings extends Component
{

    public $municipalityID;
    public $startYear, $currentYear;

    public $selectedMonths = [], $selectedYear;
    public $mountSelectedMonths = [], $mountSelectedYear;

    public $provinceID;

    #[On('updateProv')]
    public function updateProv($id)
    {
        $this->provinceID = $id;
    }

    #[On('updateMun')]
    public function updateMun($id)
    {
        $this->municipalityID = $id;
    }

    public function mount()
    {
        $this->startYear = 2024;
        $this->currentYear = date('Y');

    }

    public function resetFilter()
    {
        $this->reset('mountSelectedMonths', 'mountSelectedYear', 'selectedMonths', 'selectedYear');

    }

    public function mountFilter()
    {

        $this->selectedMonths = $this->mountSelectedMonths;
        $this->selectedYear = $this->mountSelectedYear;

        $this->dispatch('close-modal', 'filter-trainings-modal');
    }

    private function getTopPrograms($municipalityId = null, $provinceId = null)
    {
        return Programs::withCount(['program_reg as registration_count' => function ($query) use ($municipalityId, $provinceId) {
            // Apply filter based on municipality or province
            $query->whereHas('employee.barangay', function ($query) use ($municipalityId, $provinceId) {
                if ($municipalityId) {
                    // Filter by municipality if provided
                    $query->where('municipality_id', $municipalityId);
                } elseif ($provinceId) {
                    // Otherwise, filter by all municipalities within the province
                    $query->whereHas('municipality', function ($query) use ($provinceId) {
                        $query->where('province_id', $provinceId);
                    });
                }
            });
        }])
            ->when($this->selectedYear, function ($query) {
                // Filter by year if provided
                $query->whereYear('created_at', $this->selectedYear);
            })
            ->when(!empty($this->mountSelectedMonths), function ($query) {
                // Filter by months if provided
                $query->whereIn(DB::raw('MONTH(created_at)'), $this->mountSelectedMonths);
            })
            ->having('registration_count', '>', 0) // Ensure registration count is greater than zero
            ->orderBy('registration_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {

        $topPrograms = null;

        if ($this->municipalityID) {
            $topPrograms = $this->getTopPrograms($this->municipalityID);

        } elseif ($this->provinceID) {
            $topPrograms = $this->getTopPrograms(null, $this->provinceID);

        }

        return view('livewire.admin.reports.municipality-partials.popular-trainings', compact('topPrograms'));
    }
}

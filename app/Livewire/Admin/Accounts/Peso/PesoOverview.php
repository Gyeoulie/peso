<?php

namespace App\Livewire\Admin\Accounts\Peso;

use App\Helpers\AuditFormatter;
use App\Models\PESO;
use Livewire\Attributes\Layout;
use Livewire\Component;
use OwenIt\Auditing\Models\Audit;

#[Layout('layouts.admin')]
class PesoOverview extends Component
{

    public $id;
    public function render()
    {

        $user = PESO::findOrFail($this->id);

        $audits = Audit::where('user_id', $user->user_id)
            ->latest()
            ->paginate(5); // Adjust the number of items per page as needed
        // Adjust the number of items per page as needed

        // Format each audit entry
        $formattedAudits = $audits->map(function ($audit) {
            return AuditFormatter::format($audit);
        });

        return view('livewire.admin.accounts.peso.peso-overview', compact('user', 'audits', 'formattedAudits'));
    }
}

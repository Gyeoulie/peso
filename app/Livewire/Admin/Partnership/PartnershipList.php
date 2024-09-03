<?php

namespace App\Livewire\Admin\Partnership;

use App\Models\Partnerships;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class PartnershipList extends Component
{

    public $search;
    public function render()
    {
        $user = Auth::user();

        $partnersData = Partnerships::where('peso_id', $user->peso_accounts->peso_id)
            ->where('partnership_Status', 'PENDING')
            ->whereHas('company', function ($query) {
                $query->where('trade_Name', 'like', '%' . $this->search . '%')
                    ->orWhere('business_Name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.admin.partnership.partnership-list', compact('partnersData'));
    }
}

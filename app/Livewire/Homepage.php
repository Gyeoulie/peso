<?php

namespace App\Livewire;

use App\Models\Announcements;
use Livewire\Component;

class Homepage extends Component
{

    public $sam = 'asdasd';

    public function render()
    {
        $announ = Announcements::orderBy('created_at', 'desc')
        ->where('announcement_Status', 'ACTIVE')
        ->limit(5)
        ->get();

        // dd($announ);

        return view('livewire.homepage', compact('announ'));
    }
}


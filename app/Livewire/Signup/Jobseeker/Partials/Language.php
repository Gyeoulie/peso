<?php

namespace App\Livewire\Signup\Jobseeker\Partials;

use Livewire\Attributes\On;
use Livewire\Component;

class Language extends Component
{

    public $languages = [];
    public $languageError = '';

    public function removeLanguage($index)
    {
        unset($this->languages[$index]);
        $this->languages = array_values($this->languages);

    }

    public function next()
    {
        $this->validate([
            'languages' => 'required|array|min:1',
        ]);

        dd($this->languages);
    }

    #[On('refreshLanguage')]
    public function render()
    {
        return view('livewire.signup.jobseeker.partials.language');
    }
}

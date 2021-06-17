<?php

namespace App\Http\Livewire;

use App\Models\Calculation;
use Livewire\Component;

class SaveAndShare extends Component
{
    public $calculation;

    public function saveAndShare()
    {
        $this->calculation->generateToken();
        $this->calculation = Calculation::find($this->calculation->id);
    }

    public function unShare()
    {
        $this->calculation->access_token = null;
        $this->calculation->save();
    }

    public function mount(Calculation $calculation)
    {
        $this->calculation = $calculation;
    }

    public function render()
    {
        return view('livewire.save-and-share');
    }
}

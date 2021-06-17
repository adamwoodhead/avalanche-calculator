<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StartOverButton extends Component
{
    public function startOver()
    {
        session()->forget(['edit_calculation', 'temp_calculation']);
        session()->save();

        return redirect()->to(route('calculator.avalanche.show'));
    }

    public function render()
    {
        return view('livewire.start-over-button');
    }
}

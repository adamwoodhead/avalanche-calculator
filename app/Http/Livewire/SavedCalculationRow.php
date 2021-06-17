<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SavedCalculationRow extends Component
{
    public $calculation;

    public function load()
    {
        session(['edit_calculation' => $this->calculation->id]);

        return redirect()->to(route('calculator.avalanche.show'));
    }

    public function view()
    {
        // TODO Add reference to which calculation
        return redirect()->to(route('calculator.results.avalanche.show'));
    }

    public function render()
    {
        return view('livewire.saved-calculation-row');
    }
}

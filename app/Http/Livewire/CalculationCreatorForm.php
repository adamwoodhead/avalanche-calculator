<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalculationCreatorForm extends Component
{
    public $budget;

    protected $rules = [
        'budget' => 'required'
    ];

    public function submit(){
        $this->validate();
    }

    public function render()
    {
        return view('livewire.calculation-creator-form');
    }
}

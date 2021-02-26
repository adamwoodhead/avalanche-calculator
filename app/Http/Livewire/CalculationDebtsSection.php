<?php

namespace App\Http\Livewire;

use App\Models\CalculationDebt;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CalculationDebtsSection extends Component
{
    public $calculation;
    public $debts;

    protected $listeners = [
        'rerenderDebtsSection' => '$refresh',
    ];

    protected $rules = [
        'calculation.budget' => 'required'
    ];

    public function updated()
    {
        $this->validate();

        $this->calculation->save();
    }

    public function mount(){

        $this->debts = $this->calculation->calculationDebts;
    }

    public function render()
    {
        return view('livewire.calculation-debts-section');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\CalculationDebt;
use Livewire\Component;

class CalculationDeleteDebtModal extends Component
{
    public $title;
    public $description;

    public $debt;

    protected $listeners = ['assignDebtToDelete' => 'assign'];

    public function assign(CalculationDebt $model){
        $this->debt = $model;
    }

    public function delete(){
        $this->debt->delete();
        $this->emit('rerenderDebtsSection');
    }

    public function mount(){
        
    }

    public function render()
    {
        return view('livewire.calculation-delete-debt-modal');
    }
}

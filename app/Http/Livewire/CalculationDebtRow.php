<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalculationDebtRow extends Component
{
    public $debt;

    protected $listeners = [
        'rerenderDebtRow' => '$refresh',
    ];

    public function edit(){
        if($this->debt->exists){
            $this->emit('assignDebtToEdit', $this->debt->id);
        }
    }

    public function delete(){
        if($this->debt->exists){
            $this->emit('assignDebtToDelete', $this->debt->id);
            $this->dispatchBrowserEvent('delete-debt-modal-show');
        }
    }

    public function render()
    {
        return view('livewire.calculation-debt-row');
    }
}

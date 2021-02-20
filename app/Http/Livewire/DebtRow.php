<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DebtRow extends Component
{
    public $debt;

    protected $listeners = [
        'rerenderDebtRow' => '$refresh',
    ];

    public function edit(){
        $this->emit('assignDebtToEdit', $this->debt->id);
        $this->dispatchBrowserEvent('debt-modal-show');
    }

    public function delete(){
        $this->emit('assignDebtToDelete', $this->debt->id);
        $this->dispatchBrowserEvent('delete-debt-modal-show');
    }

    public function render()
    {
        return view('livewire.debt-row');
    }
}

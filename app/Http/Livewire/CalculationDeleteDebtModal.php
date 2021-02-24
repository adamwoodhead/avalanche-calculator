<?php

namespace App\Http\Livewire;

use App\Models\Debt;
use Livewire\Component;

class DeleteDebtModal extends Component
{
    public $title;
    public $description;

    public $debt;

    protected $listeners = ['assignDebtToDelete' => 'assign'];

    public function assign(Debt $model){
        $this->debt = $model;
    }

    public function delete(){
        $this->debt->delete();
        $this->emit('rerenderDebtsSection');
        $this->emit('debtModalRefresh');
    }

    public function mount(){
        
    }

    public function render()
    {
        return view('livewire.calculation-delete-debt-modal');
    }
}

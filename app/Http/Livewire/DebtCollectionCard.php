<?php

namespace App\Http\Livewire;

use App\Models\DebtCollection;
use Livewire\Component;

class DebtCollectionCard extends Component
{
    public $collection;

    protected $listeners = ['rerenderDebtCollectionCard' => '$refresh'];

    public function delete(){
        $this->emit('assignModelToDelete', $this->collection->id);
        $this->dispatchBrowserEvent('delete-modal-show');
    }

    public function delete_confirm(){
        $this->collection->delete();
        $this->emit('rerenderDebtCollectionSection');
        $this->collection = null;
    }

    public function render()
    {
        return view('livewire.debt-collection-card');
    }
}

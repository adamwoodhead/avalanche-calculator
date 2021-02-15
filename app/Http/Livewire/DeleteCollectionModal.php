<?php

namespace App\Http\Livewire;

use App\Models\DebtCollection;
use Livewire\Component;

class DeleteCollectionModal extends Component
{
    public $title;
    public $description;

    public DebtCollection $debt_collection;

    protected $listeners = ['assignModelToDelete' => 'assign'];

    public function assign(DebtCollection $model){
        $this->debt_collection = $model;
    }

    public function delete(){
        $this->debt_collection->delete();

        $this->emit('rerenderDebtCollectionSection');
        // if($this->model_to_delete != null){
        //     $this->model_to_delete->delete();
        // }
    }

    public function render()
    {
        return view('livewire.delete-collection-modal');
    }
}

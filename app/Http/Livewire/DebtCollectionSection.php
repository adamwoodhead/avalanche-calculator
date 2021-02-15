<?php

namespace App\Http\Livewire;

use App\Models\DebtCollection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DebtCollectionSection extends Component
{
    public $collections;

    public function create(){
        $collection = DebtCollection::create([
            'user_id' => Auth::user()->id,
            'name' => 'My New Collection'
        ]);

        //$this->collections = $this->collections->push($collection);
        $this->collections = Auth::user()->debt_collections()->with('debts')->orderByDesc('id')->get();
    }

    protected $listeners = ['rerenderDebtCollectionSection' => '$refresh'];

    public function mount(){
        $this->collections = Auth::user()->debt_collections()->with('debts')->orderByDesc('id')->get();
    }

    public function render()
    {
        return view('livewire.debt-collection-section');
    }
}

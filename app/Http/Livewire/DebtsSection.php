<?php

namespace App\Http\Livewire;

use App\Models\Debt;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DebtsSection extends Component
{
    public $debts;

    protected $listeners = [
        'rerenderDebtsSection' => '$refresh',
    ];

    public function create(){
        $debt = new Debt;

        $this->emit('assignDebtToCreate');
    }

    public function mount(){
        $this->debts = Auth::user()->debts()->orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.debts-section');
    }
}

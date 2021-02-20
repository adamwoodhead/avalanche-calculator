<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DebtsSection extends Component
{
    public $debts;

    protected $listeners = [
        'rerenderDebtsSection' => '$refresh',
    ];

    public function mount(){
        $this->debts = Auth::user()->debts()->get();
    }

    public function render()
    {
        return view('livewire.debts-section');
    }
}

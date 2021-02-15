<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Sidebar extends Component
{
    public $contains_calculate = false;
    public $contains_how_to = false;

    public function mount(){
        if(strpos(Route::currentRouteName(), 'calculate') !== false){
            $this->contains_calculate = true;
        }
        
        if(strpos(Route::currentRouteName(), 'how-to') !== false){
            $this->contains_how_to = true;
        }
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
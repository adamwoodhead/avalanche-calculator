<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $contains_calculate = false;
    public $contains_how_to = false;

    public function __construct(){
        if(strpos(Route::currentRouteName(), 'calculator') !== false){
            $this->contains_calculate = true;
        }
        
        if(strpos(Route::currentRouteName(), 'how-to') !== false){
            $this->contains_how_to = true;
        }
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SidebarLink extends Component
{
    public $title;
    public $route;
    public $background = "bg-transparent";
    public $foreground = "text-black";

    public function mount()
    {
        if(Route::currentRouteName() == $this->route){
            $this->background = "bg-green-500";
            $this->foreground = "text-white";
        }
    }

    public function render()
    {
        return view('livewire.sidebar-link');
    }
}
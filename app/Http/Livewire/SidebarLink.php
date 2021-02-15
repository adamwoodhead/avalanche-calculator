<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SidebarLink extends Component
{
    public $title;
    public $route;
    public $background = "bg-transparent";

    public function mount()
    {
        if(Route::currentRouteName() == $this->route){
            $this->background = "bg-gray-200";
        }
    }

    public function render()
    {
        return view('livewire.sidebar-link');
    }
}
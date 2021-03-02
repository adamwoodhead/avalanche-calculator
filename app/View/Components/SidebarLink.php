<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class SidebarLink extends Component
{
    public $title;
    public $route;
    public $background = "bg-transparent";
    public $foreground = "text-black";

    public function __construct($title, $route)
    {
        $this->title = $title;
        $this->route = $route;

        if(Route::currentRouteName() == $this->route){
            $this->background = "bg-green-600";
            $this->foreground = "text-white";
        }
    }

    public function render()
    {
        return view('components.sidebar-link');
    }
}
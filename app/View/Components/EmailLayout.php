<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmailLayout extends Component
{
    public $salutation;

    public function __construct(){
        $hour = date("H", time());
    
        if ($hour < 13){
            $this->salutation = 'Good Morning';
        }
        else if ($hour >= 13 && $hour <= 17){
            $this->salutation =  'Good Afternoon';
        }
        else {
            $this->salutation =  'Good Evening';
        }
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.email');
    }
}

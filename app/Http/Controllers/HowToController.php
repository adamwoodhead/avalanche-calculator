<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HowToController extends Controller
{
    public function avalanche(){
        return View::make('how-to.avalanche');
    }

    public function snowball(){
        return View::make('how-to.snowball');
    }
}

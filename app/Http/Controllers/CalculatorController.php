<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CalculatorController extends Controller
{
    public function avalanche(){
        return View::make('calculators.avalanche');
    }
    
    public function snowball(){
        return View::make('calculators.snowball');
    }
}

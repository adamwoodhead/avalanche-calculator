<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebtsController extends Controller
{
    public function show(){
        return view('debts');
    }
}

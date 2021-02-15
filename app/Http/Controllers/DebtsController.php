<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebtsController extends Controller
{
    public function show(){
        $user = Auth::user();

        return view('debts', [
            'user' => $user
        ]);
    }
}

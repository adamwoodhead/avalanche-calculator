<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function show(){
        return view('dashboard');
    }
}

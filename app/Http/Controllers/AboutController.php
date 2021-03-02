<?php

namespace App\Http\Controllers;

use App\Models\CommitLog;
use Carbon\Carbon;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AboutController extends Controller
{
    public function show(){
        $commits = CommitLog::all();
        
        return View::make('about', [
            'commits' => $commits,
        ]);
    }
}

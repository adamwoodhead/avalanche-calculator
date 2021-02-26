<?php

namespace App\Http\Controllers;

use App\Enums\CalculationMode;
use App\Models\Calculation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CalculatorController extends Controller
{
    public function avalanche()
    {
        $calculation = null;

        if (session()->has('temp_calculation')) {
            $calculation_id = session('temp_calculation');
            $calculation = Calculation::find($calculation_id) ?? Calculation::create();
        } else {
            $calculation = Calculation::create();
        }

        session(['temp_calculation' => $calculation->id]);
        
        return View::make('calculators.avalanche', [
            'calculation' => $calculation
        ]);
    }
    
    public function snowball()
    {
        $calculation = null;

        if (session()->has('temp_calculation')) {
            $calculation_id = session('temp_calculation');
            $calculation = Calculation::find($calculation_id) ?? Calculation::create();
        } else {
            $calculation = Calculation::create();
        }

        session(['temp_calculation' => $calculation->id]);

        return View::make('calculators.snowball', [
            'calculation' => $calculation
        ]);
    }

    public function avalanche_results(Request $request)
    {
        // Determine Calculation Data

        $calculation = null;

        if ($request->isMethod('get')) {
            if($request->has('secret')){
                $accessToken = preg_replace("/[^a-zA-Z0-9]+/", "", $request->secret);
                $calculation = Calculation::with('calculationDebts')->where('access_token', '=', $accessToken)->first();
            } else if (session()->has('temp_calculation')) {
                $calculation_id = session('temp_calculation');
                $calculation = Calculation::find($calculation_id);
            }
        }

        $results = null;
        if($calculation != null){
            $results = $calculation->calculate(CalculationMode::AVALANCHE);
        }

        //dd($results);

        return View::make('calculators.results.avalanche', [
            'calculation' => $calculation,
            'user' => Auth::check() ? Auth::user() : null,
            'results' => $results
        ]);
    }

    public function snowball_results(Request $request)
    {
        // Determine Calculation Data

        $calculation = null;

        if ($request->isMethod('get')) {
            if($request->has('secret')){
                $accessToken = preg_replace("/[^a-zA-Z0-9]+/", "", $request->secret);
                $calculation = Calculation::with('calculationDebts')->where('access_token', '=', $accessToken)->first();
            } else if (session()->has('temp_calculation')) {
                $calculation_id = session('temp_calculation');
                $calculation = Calculation::find($calculation_id);
            }
        }

        $results = null;
        if($calculation != null){
            $results = $calculation->calculate(CalculationMode::SNOWBALL);
        }

        //dd($results);

        return View::make('calculators.results.snowball', [
            'calculation' => $calculation,
            'user' => Auth::check() ? Auth::user() : null,
            'results' => $results
        ]);
    }


}

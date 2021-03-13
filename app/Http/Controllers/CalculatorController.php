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
            'results' => $results,
            'chartjs' => $this->createChart($results),
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
            'results' => $results,
            'chartjs' => $this->createChart($results),
        ]);
    }

    private function createChart($calculationResults)
    {
        $colours = [
            "#F44336", // RED
            "#2196F3", // BLUE
            "#4CAF50", // GREEN
            "#FFEB3B", // YELLOW
            "#3F51B5", // INDIGO
            "#FF9800", // ORANGE
            "#9C27B0", // PURPLE
            "#9E9E9E", // GREY
            "#E91E63", // PINK
            "#00BCD4", // CYAN
            "#CDDC39", // LIME
            "#009688", // TEAL
            "#FF5722", // DEEP ORANGE
            "#673AB7", // DEEP PURPLE
            "#8BC34A", // LIGHT GREEN
            "#F44336", "#2196F3", "#4CAF50", "#FFEB3B", "#3F51B5", "#FF9800", "#9C27B0", "#9E9E9E", "#E91E63", "#00BCD4", "#CDDC39", "#009688", "#FF5722", "#673AB7", "#8BC34A",
            "#F44336", "#2196F3", "#4CAF50", "#FFEB3B", "#3F51B5", "#FF9800", "#9C27B0", "#9E9E9E", "#E91E63", "#00BCD4", "#CDDC39", "#009688", "#FF5722", "#673AB7", "#8BC34A",
            "#F44336", "#2196F3", "#4CAF50", "#FFEB3B", "#3F51B5", "#FF9800", "#9C27B0", "#9E9E9E", "#E91E63", "#00BCD4", "#CDDC39", "#009688", "#FF5722", "#673AB7", "#8BC34A",
        ];

        $datasets = [];

        $i = 0;
        foreach($calculationResults['chart_data'] as $key => $value)
        {
            $datasets[] = [
                'label' => $key,
                'fill' => false,
                'borderWidth' => 3,
                'borderColor' => $colours[0],
                'data' => array_map(function($num){ return number_format($num, 2, '.', ''); }, $value)
            ];

            $i++;
        }

        // dd($datasets);

        return app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->labels($calculationResults['chart_keys'])
        ->datasets($datasets)
        ->optionsRaw("{ scales: { yAxes: [{ ticks: { beginAtZero: true } }] } }");
    }
}

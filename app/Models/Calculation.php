<?php

namespace App\Models;

use App\Enums\CalculationMode;
use App\Enums\DebtType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',

        'description',

        'budget',

        'access_token'
    ];

    public function calculate($calculationMode)
    {
        $debts = $this->calculationDebts->toArray();

        //dd($debts);

        foreach($debts as &$debt){
            $debt['balance'] = $debt['opening_balance'];
        }

        if($calculationMode === CalculationMode::AVALANCHE){
            $debts = $this->avalancheSort($debts);
        } elseif($calculationMode === CalculationMode::SNOWBALL){
            $debts = $this->snowballSort($debts);
        }

        $start_Date = date('M Y');

        $months = [];

        $pay_off_dates = [];

        $chartData = [];
        foreach($debts as &$debt){
            $debt['original_balance'] = $debt['balance'];
            $debt['interestgained'] = 0;
            $chartData[$debt["name"]][] = $debt["balance"];
        }
        $chartKeys = ["Now"];

        $maxMonths = 420; // 35 Years

        $thirtyFiveYearWarning = false;

        // Cycle Monthly Payments
        while($maxMonths > 0 && !$this->allDebtsAreZeroBalance($debts)){
            $maxMonths--;
            $budget = $this->budget;
            $start_Date = $this->nextMonth($start_Date);

            $monthlyPayments = array(
                "month" => $start_Date,
                "total" => 0,
                "accruedinterest" => 0,
                "accruedcharges" => 0,
                "payments" => []
            );

            // Chew away at interest free periods... :(
            foreach($debts as &$debt){
                if($debt["debt_type"] === DebtType::BALANCE_TRANSFER){
                    // Balance Transfer
                    if($debt["bt_free_period"] > 0){
                        if(!isset($debt['saved_interest_rate'])){
                            $debt['saved_interest_rate'] = $debt['interest_rate'];
                            $debt['interest_rate'] = 0;
                        }
                        $debt["bt_free_period"]--;
                    } else {
                        if(isset($debt['saved_interest_rate'])){
                            $debt['interest_rate'] = $debt['saved_interest_rate'];
                            unset($debt['saved_interest_rate']);
                        }
                    }
                }
            }
            unset($debt);

            if($calculationMode === CalculationMode::AVALANCHE){
                $debts = $this->avalancheSort($debts);
            }

            // Make Minimum Payments
            foreach($debts as &$debt){
                if($debt["balance"] > 0){

                    $monthlyPayments["payments"][$debt["name"]] = Array( "name" => $debt["name"], "payment" => null, "interest" => null);

                    $calculated_minimum = $debt["min_payment_fixed"];

                    if(isset($debt['min_payment_percent']) && $debt['min_payment_percent'] > 0){
                        $percentage_of_balance = $debt['balance'] * ($debt['min_payment_percent'] / 100);
                        $calculated_minimum = max($percentage_of_balance, $calculated_minimum);
                    }

                    $payment = min($debt["balance"], $calculated_minimum);
                    $debt["balance"] = $debt["balance"] - $payment;
                    $budget = $budget - $payment;

                    $monthlyPayments["total"] = $monthlyPayments["total"] + $payment;
                    $monthlyPayments["payments"][$debt["name"]]["payment"] = $payment;

                    if($debt['balance'] == 0){
                        $monthlyPayments["payments"][$debt["name"]]["balance"] = 0;
                        $monthlyPayments["payments"][$debt["name"]]["interest"] = 0;
                        $monthlyPayments["payments"][$debt["name"]]["charge"] = 0;
                    }
                }
            }

            // Make Larger Payments
            foreach($debts as &$debt){
                if($debt["balance"] > 0 && $budget > 0){

                    if($debt["debt_type"] === DebtType::SHORT_TERM_LOAN && $debt["sl_can_overpay"] === false){
                        continue;
                    }

                    $mostPayable = min($budget, $debt["balance"]);

                    if($debt["debt_type"] === DebtType::LONG_TERM_LOAN){
                        if($debt["ll_can_overpay"] === false){
                            continue;
                        }
                    }

                    $debt["balance"] = $debt["balance"] - $mostPayable;
                    $budget = $budget - $mostPayable;

                    $monthlyPayments["total"] = $monthlyPayments["total"] + $mostPayable;
                    $monthlyPayments["payments"][$debt["name"]]["payment"] = $monthlyPayments["payments"][$debt["name"]]["payment"] + $mostPayable;

                    if($debt['balance'] == 0){
                        $monthlyPayments["payments"][$debt["name"]]["balance"] = 0;
                        $monthlyPayments["payments"][$debt["name"]]["interest"] = 0;
                        $monthlyPayments["payments"][$debt["name"]]["charge"] = 0;
                    }
                }
            }

            // Accrue Interest
            foreach($debts as &$debt){
                if($debt["balance"] > 0){
                    if($debt["debt_type"] === DebtType::BALANCE_TRANSFER && $debt["bt_free_period"] > 0){
                        $interest = 0;
                    } else {
                        $interest = round($debt["balance"] * (($debt["interest_rate"] / 100) / 12), 2);
                    }

                    $debt["balance"] = $debt["balance"] + $interest + $debt["monthly_charge"];
                    $debt["interestgained"] = $debt["interestgained"] + $interest;
                    $monthlyPayments["accruedinterest"] = $monthlyPayments["accruedinterest"] + $interest;
                    $monthlyPayments["accruedcharges"] = $monthlyPayments["accruedcharges"] + $debt["monthly_charge"];
                    $monthlyPayments["payments"][$debt["name"]]["interest"] = $interest;
                    $monthlyPayments["payments"][$debt["name"]]["charge"] = $debt["monthly_charge"];
                }
            }

            // Calculate Balances
            foreach($debts as &$debt){
                if($debt["balance"] > 0){
                    $monthlyPayments["payments"][$debt["name"]]["balance"] = $debt["balance"];
                }

                if(end($chartData[$debt["name"]]) != 0)
                {
                    $chartData[$debt["name"]][] = $debt["balance"];
                    $monthlyPayments["payments"][$debt["name"]]["percent_remaining"] = $debt["balance"] / $debt["original_balance"];
                    $monthlyPayments["payments"][$debt["name"]]["percent_paid"] = 1 - ($debt["balance"] / $debt["original_balance"]);
                }
            }

            $months[$monthlyPayments["month"]] = $monthlyPayments;
            $chartKeys[] = $start_Date;

            foreach($debts as &$debt){
                if($debt['balance'] == 0 && !array_key_exists($debt['name'], $pay_off_dates)) {
                    $pay_off_dates[$debt['name']] = [
                        'debt' => str_replace('_', ' ', $debt['name']),
                        'date' => $start_Date,
                        'paid' => array_sum(array_column($months, "total")),
                        'balance' => array_sum(array_column($debts, 'balance'))
                    ];
                }
            }

            unset($budget);
        }

        if(!$this->allDebtsAreZeroBalance($debts)){
            $thirtyFiveYearWarning = true;
        }

        // ! TODO Add Thirty Five Year Warning to view

        return [
            'months' => $months,
            'pay_off_dates' => $pay_off_dates,
            'chart_keys' => $chartKeys,
            'chart_data' => $chartData,
            'thirtyFiveYearWarning' => $thirtyFiveYearWarning
        ];
    }

    private function nextMonth(&$date) {
        return date('M Y', strtotime("+1 months", strtotime($date)));
    }

    private function allDebtsAreZeroBalance(&$debts){
        foreach($debts as &$debt){
            if($debt["balance"] > 0) {
                return false;
            }
        }
        
        unset($debt);
        return true;
    }

    private function avalancheSort(&$arr)
    {
        usort($arr, function($a, $b) {
            $combineda = $a["interest_rate"] + $this->combinedInterestAndChargeCost($a);
            $combinedb = $b["interest_rate"] + $this->combinedInterestAndChargeCost($b);
    
            return ($combineda < $combinedb);
        });
    
        return $arr;
    }
    
    private function snowballSort(&$arr)
    {
        usort($arr, function($a, $b) {
            return ($a["balance"] > $b["balance"]);
        });
    
        return $arr;
    }

    function combinedInterestAndChargeCost(&$debt){
        if ($debt["balance"] == 0) {
            if($debt["monthly_charge"] > 0) {
                return 100;
            }else{
                return 0;
            }
        }

        $monthly = $debt["monthly_charge"] / $debt["balance"];
        $annual = $monthly * 12;
        $nondecimal = $annual * 100;

        return $nondecimal;
    }

    public function calculationDebts()
    {
        return $this->hasMany(CalculationDebt::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        parent::boot();

        static::deleting(function ($calculation) {
            $calculation->calculation_debts()->delete();
        });
    }
}

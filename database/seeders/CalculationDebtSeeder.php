<?php

namespace Database\Seeders;

use App\Models\CalculationDebt;
use Illuminate\Database\Seeder;

class CalculationDebtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CalculationDebt::create([
            'calculation_id' => 1,

            'name' => 'Big Bad Bank',
            
            'debt_type' => 10,
            
            'opening_balance' => 2000,
            'interest_rate' => 35.1,
            'monthly_charge' => 0,

            'min_payment_fixed' => 25,
            'min_payment_percent' => 1.50
        ]);
        
        CalculationDebt::create([
            'calculation_id' => 1,

            'name' => 'American Express',
            
            'debt_type' => 10,
            
            'opening_balance' => 5000,
            'interest_rate' => 34.99,
            'monthly_charge' => 0,

            'min_payment_fixed' => 25,
            'min_payment_percent' => 1.50
        ]);
        
        CalculationDebt::create([
            'calculation_id' => 1,

            'name' => 'Chase',
            'description' => 'Balance Transfer',
            
            'debt_type' => 20,
            
            'opening_balance' => 5000,
            'interest_rate' => 0,
            'monthly_charge' => 0,

            'min_payment_fixed' => 25,
            'min_payment_percent' => 1.5,
        
            'bt_free_period' => 18,
            'bt_interest_post' => 16.50,
        ]);
    }
}

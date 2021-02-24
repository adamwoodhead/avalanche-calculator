<?php

namespace Database\Seeders;

use App\Models\Calculation;
use Illuminate\Database\Seeder;

class CalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Calculation::create([
            'user_id' => 1,
            'description' => 'My First Description',
            'budget' => 500,
            'access_token' => 'abc123'
        ]);
    }
}

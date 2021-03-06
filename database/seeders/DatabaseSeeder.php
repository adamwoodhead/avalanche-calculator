<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DebtSeeder::class);
        $this->call(CalculationSeeder::class);
        $this->call(CalculationDebtSeeder::class);
        $this->call(CommitSeeder::class);
    }
}

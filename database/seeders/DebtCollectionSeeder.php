<?php

namespace Database\Seeders;

use App\Models\DebtCollection;
use Illuminate\Database\Seeder;

class DebtCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DebtCollection::create([
            'user_id' => 1,
            'name' => 'My First Collection',
            'description' => null
        ]);
        
        DebtCollection::create([
            'user_id' => 1,
            'name' => 'My Second Collection',
            'description' => 'My Partners Debts'
        ]);
        
        DebtCollection::create([
            'user_id' => 1,
            'name' => 'My Third Collection',
            'description' => 'Seperate Collection'
        ]);
    }
}

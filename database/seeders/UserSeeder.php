<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Adam',
            'email' => 'info@adamwoodhead.co.uk',
            'password' => 'secrethedgehog'
        ]);
    }
}

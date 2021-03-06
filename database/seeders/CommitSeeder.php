<?php

namespace Database\Seeders;

use App\Models\CommitLog;
use Illuminate\Database\Seeder;

class CommitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommitLog::retrieveCommits();
    }
}

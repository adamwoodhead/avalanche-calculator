<?php

namespace App\Console;

use App\Models\Calculation;
use App\Models\CommitLog;
use Carbon\Carbon;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            Calculation::whereNull('user_id')
                        ->whereDate('created_at', '<=', Carbon::now()->subMonth()->toDateString())
                        ->delete();
        })->dailyAt('05:00');

        $schedule->call(function(){
            $commits = GitHub::repo()->commits()->all('adamwoodhead', 'avalanche-calculator', ['sha' => 'main', 'per_page' => 50]);

            foreach($commits as $commit){
                if(CommitLog::where('sha', '=', $commit['sha'])->first() == null){

                    $commit_detail = GitHub::repo()->commits()->show('adamwoodhead', 'avalanche-calculator', $commit['sha']);

                    CommitLog::create([
                        'sha' => $commit['sha'],
                        'message' => $commit['commit']['message'],
                        'author' => $commit['commit']['author']['name'],
                        'author_email' => $commit['commit']['author']['email'],
                        'date' => Carbon::parse($commit['commit']['author']['date']),
                        'avatar_url' => $commit['author']['avatar_url'],
                        'changes' => array_sum(array_column($commit_detail['files'], 'changes')),
                        'additions' => array_sum(array_column($commit_detail['files'], 'additions')),
                        'deletions' => array_sum(array_column($commit_detail['files'], 'deletions')),
                    ]);
                }
            }
        })->dailyAt('05:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

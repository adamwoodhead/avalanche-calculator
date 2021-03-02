<?php

namespace App\Models;

use Carbon\Carbon;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'sha',
        'message',
        'author',
        'author_email',
        'date',
        'avatar_url',
        'changes',
        'additions',
        'deletions'
    ];

    protected $dates = [
        'date'
    ];

    public static function retrieveCommits()
    {
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
    }
}

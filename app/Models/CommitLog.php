<?php

namespace App\Models;

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


}

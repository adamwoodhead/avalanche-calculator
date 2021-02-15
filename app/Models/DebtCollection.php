<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function debts(){
        return $this->hasMany(Debt::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

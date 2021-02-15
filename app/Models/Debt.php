<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    // Debt Types
    const TYPES = [
        'REGULAR',
        'BALANCE_TRANSFER',
        'PURCHASE',
        'SHORT_LOAN',
        'LONG_LOAN'
    ];

    protected $fillable = [
        'debt_collection_id',

        'name',
        'description',
        
        'debt_type',
        
        'opening_balance',
        'interest_rate',
        'monthly_charge',

        'minimum_payment_flat',
        'minimum_payment_percentage',
        
        'interest_free_months'
    ];

    public function getDebtTypeTextAttribute(){
        switch($this->debt_type){
            case 1:
                return 'Regular';
            case 2:
                return 'Balance Transfer';
            case 3:
                return 'Purchase';
            case 4:
                return 'Short Term Loan';
            case 5:
                return 'Long Term Loan';
            default:
                return 'Invalid';
        }
    }

    public function debt_collection(){
        return $this->belongsTo(DebtCollection::class);
    }

    public function user(){
        return $this->debt_collection()->user();
    }
}

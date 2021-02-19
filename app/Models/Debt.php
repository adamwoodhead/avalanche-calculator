<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    // Debt Types
    const REGULAR = 10;
    const BALANCE_TRANSFER = 20;
    const PURCHASE = 30;
    const SHORT_TERM_LOAN = 40;
    const LONG_TERM_LOAN = 50;

    protected $fillable = [
        'debt_collection_id',

        'name',
        'description',
        
        'debt_type',
        
        'opening_balance',
        'interest_rate',
        'monthly_charge',

        'min_payment_fixed',
        'min_payment_percent',
        
        'bt_free_period',
        'bt_interest_post',

        'pc_free_period',
        'pc_amount_spent',

        'sl_can_overpay',

        'll_can_overpay',
    ];

    public function getDebtTypeTextAttribute(){
        switch($this->debt_type){
            case DEBT::REGULAR:
                return 'Regular';
            case DEBT::BALANCE_TRANSFER:
                return 'Balance Transfer';
            case DEBT::PURCHASE:
                return 'Purchase';
            case DEBT::SHORT_TERM_LOAN:
                return 'Short Term Loan';
            case DEBT::LONG_TERM_LOAN:
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

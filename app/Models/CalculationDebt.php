<?php

namespace App\Models;

use App\Enums\DebtType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculationDebt extends Model
{
    use HasFactory;

    protected $fillable = [
        'calculation_id',

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
            case DebtType::REGULAR:
                return 'Regular';
            case DebtType::BALANCE_TRANSFER:
                return 'Balance Transfer';
            case DebtType::PURCHASE:
                return 'Purchase';
            case DebtType::SHORT_TERM_LOAN:
                return 'Short Term Loan';
            case DebtType::LONG_TERM_LOAN:
                return 'Long Term Loan';
            default:
                return 'Invalid';
        }
        
    }

    public function calculation(){
        return $this->belongsTo(Calculation::class);
    }

    public function user(){
        return $this->calculation()->user();
    }
}

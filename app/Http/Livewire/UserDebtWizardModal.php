<?php

namespace App\Http\Livewire;

use App\Models\Debt;
use Livewire\Component;

class UserDebtWizardModal extends Component
{
    public $title;
    
    
    public $name;
    public $debt_type;
    public $opening_balance;
    public $interest_rate;
    public $monthly_charge;
    public $min_payment_fixed;
    public $min_payment_percent;

    public $bt_free_period;
    public $bt_interest_post;

    public $pc_free_period;
    public $pc_amount_spent;

    public $sl_can_overpay;

    public $ll_can_overpay;

    public function rules(){
        return [
            'name' => 'required',
            'debt_type' => 'required',
            'opening_balance' => 'required|between:1,100000',
            'interest_rate' => 'required',
            'monthly_charge' => 'required',
    
            'bt_free_period' => ($this->debt_type == 20 ? 'required' : ''),
            'bt_interest_post' => ($this->debt_type == 20 ? 'required' : ''),
    
            'pc_free_period' => ($this->debt_type == 30 ? 'required' : ''),
            'pc_amount_spent' => ($this->debt_type == 30 ? 'required' : ''),
    
            'sl_can_overpay' => ($this->debt_type == 40 ? 'required' : ''),
    
            'll_can_overpay' => ($this->debt_type == 50 ? 'required' : ''),
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    protected $listeners = [
        'assignModelToEdit' => 'assign',
        'rerenderDebtCollectionCard' => '$refresh'
    ];

    public function save_debt(){
        $i = 1/0;
        // 
    }

    public function render()
    {
        return view('livewire.user-debt-wizard-modal');
    }
}

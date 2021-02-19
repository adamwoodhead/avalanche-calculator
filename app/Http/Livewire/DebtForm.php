<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DebtForm extends Component
{
    public $debt_name;
    public $debt_type;
    public $opening_balance;
    public $interest_rate;
    public $monthly_charge;

    public $bt_free_period;
    public $bt_interest_post;

    public $pc_free_period;
    public $pc_amount_spent;

    public $sl_can_overpay;

    public $ll_can_overpay;

    public function rules(){
        return [
            'debt_name' => 'required',
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

    public function updating(){
        $this->validate();
    }

    public function submit(){
        $this->validate();

    }

    public function render()
    {
        return view('livewire.debt-form');
    }
}

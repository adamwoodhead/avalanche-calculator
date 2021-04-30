<?php

namespace App\Http\Livewire;

use App\Enums\DebtType;
use App\Models\CalculationDebt;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CalculationDebtModal extends Component
{
    public $debt;
    public $calculation;

    public $show_modal;

    public function rules(){
        return [
            'debt.name' => 'required',
            'debt.description' => '',
            'debt.debt_type' => 'required',
            'debt.opening_balance' => 'required|between:1,1000000',
            'debt.interest_rate' => 'required',
            'debt.monthly_charge' => 'required',
    
            'debt.min_payment_fixed' => 'required',
            'debt.min_payment_percent' => 'required',

            'debt.bt_free_period' => ($this->debt->debt_type == DebtType::BALANCE_TRANSFER ? 'required' : ''),
            'debt.bt_interest_post' => ($this->debt->debt_type == DebtType::BALANCE_TRANSFER ? 'required' : ''),
    
            'debt.pc_free_period' => ($this->debt->debt_type == DebtType::PURCHASE ? 'required' : ''),
            'debt.pc_amount_spent' => ($this->debt->debt_type == DebtType::PURCHASE ? 'required' : ''),
    
            'debt.sl_can_overpay' => '',
    
            'debt.ll_can_overpay' => '',
        ];
    }

    protected $listeners = [
        'assignDebtToEdit' => 'assign',
        'assignDebtToCreate' => 'assign_create',
    ];
    
    public function assign(CalculationDebt $model)
    {
        $this->debt = $model;
        $this->show_modal = true;
    }

    public function assign_create()
    {
        $this->debt = new CalculationDebt;
        $this->debt->debt_type = 10;
        $this->show_modal = true;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function save()
    {
        $this->validate();

        $this->debt->calculation_id = $this->calculation->id;
        $this->debt->save();

        $this->show_modal = false;
        $this->emit('rerenderDebtRow');
        $this->emit('rerenderDebtsSection');
    }

    public function mount()
    {
        $this->show_modal = false;
        $this->debt = new CalculationDebt;
        $this->debt->debt_type = 10;
    }

    public function render()
    {
        return view('livewire.calculation-debt-modal');
    }
}

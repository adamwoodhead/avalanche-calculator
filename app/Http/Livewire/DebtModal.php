<?php

namespace App\Http\Livewire;

use App\Enums\DebtType;
use App\Models\Debt;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DebtModal extends Component
{
    public $debt;

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
    
    public function assign(Debt $model)
    {
        $this->debt = $model;
        $this->show_modal = true;
    }

    public function assign_create()
    {
        $this->debt = new Debt;
        $this->debt->debt_type = 10;
        $this->show_modal = true;
    }

    public function updated($property)
    {
        $this->emit('debugLog', 'Updating Modal...');
        $this->validateOnly($property);
    }

    public function save()
    {
        $this->validate();
        
        if(Auth::check()){
            // Auth
            if($this->debt->exists == false){
                $this->debt->user_id = Auth::user()->id;
                $this->debt->save();
            } else {
                $this->debt->save();
            }
        } else {
            // Guest
            
        }

        $this->show_modal = false;
        //$this->debt = null;
        //$this->emit('rerenderDebtRow');
        $this->emit('rerenderDebtsSection');
    }

    public function mount()
    {
        $this->show_modal = false;
        $this->debt = new Debt;
        $this->debt->debt_type = 10;
    }

    public function render()
    {
        return view('livewire.debt-modal');
    }
}

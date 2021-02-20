<?php

namespace App\Http\Livewire;

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
            'debt.opening_balance' => 'required|between:1,100000',
            'debt.interest_rate' => 'required',
            'debt.monthly_charge' => 'required',
    
            'debt.min_payment_fixed' => 'required',
            'debt.min_payment_percent' => 'required',

            'debt.bt_free_period' => ($this->debt->debt_type == 20 ? 'required' : ''),
            'debt.bt_interest_post' => ($this->debt->debt_type == 20 ? 'required' : ''),
    
            'debt.pc_free_period' => ($this->debt->debt_type == 30 ? 'required' : ''),
            'debt.pc_amount_spent' => ($this->debt->debt_type == 30 ? 'required' : ''),
    
            'debt.sl_can_overpay' => ($this->debt->debt_type == 40 ? 'required' : ''),
    
            'debt.ll_can_overpay' => ($this->debt->debt_type == 50 ? 'required' : ''),
        ];
    }

    protected $listeners = [
        'assignDebtToEdit' => 'assign',
        'assignDebtToCreate' => 'assign_create',
        'debtModalRefresh' => '$refresh'
    ];

    public function assign(Debt $debt = null){
        try {
            if($debt == null){
                $this->debt = new Debt;
            }
            else {
                $this->debt = $debt;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function assign_create(){
        $this->debt = new Debt;
        $this->show_modal = true;
    }

    public function updated($property){
        $this->validateOnly($property);
    }

    public function save(){
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
        $this->emit('rerenderDebtRow');
        $this->emit('rerenderDebtsSection');
    }

    public function mount(){
        $this->show_modal = false;
        $this->debt = new Debt;
    }

    public function render(){
        return view('livewire.debt-modal');
    }
}

<?php

namespace App\Http\Livewire;

use App\Enums\ToastType;
use App\Models\CalculationDebt;
use App\Models\Debt;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CalculationDebtsSection extends Component
{
    use ToastFunctionality;

    public $calculation;
    public $debts;
    public $import_debt_id;

    protected $listeners = [
        'rerenderDebtsSection' => '$refresh',
        'importDebt' => 'import'
    ];

    protected $rules = [
        'calculation.budget' => 'required',
    ];

    public function import()
    {
        if(Auth::check()){
            if($this->import_debt_id != null){
                $debt = Debt::find($this->import_debt_id);

                if($debt == null){
                    $this->sendToast(ToastType::ERROR, "Couldn't find debt to import!", 'View My Debts', route('debts.show'));
                }

                $debt_data = $debt->only([
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
                ]);

                $debt_data['calculation_id'] = $this->calculation->id;

                CalculationDebt::create($debt_data);

                $this->sendToast(ToastType::SUCCESS, 'Debt imported!');
                $this->emit('rerenderDebtsSection');
            }
        }
    }

    public function updated()
    {
        $this->validate();
        
        $this->calculation->save();
    }

    public function mount(){

        $this->debts = $this->calculation->calculationDebts;
    }

    public function render()
    {
        return view('livewire.calculation-debts-section');
    }
}

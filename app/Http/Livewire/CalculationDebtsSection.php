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

    public $min_budget;
    public $method;
    public $calculation;
    public $debts;
    public $import_debt_id;

    protected $listeners = [
        'rerenderDebtsSection' => '$refresh',
        'importDebt' => 'import',
        'recalculatBudget' => 'calculate_budget',
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

                $this->calculate_budget();

                $this->sendToast(ToastType::SUCCESS, 'Debt imported!');
                $this->emit('rerenderDebtsSection');
            }
        }
    }

    public function submit_for_calculation()
    {
        if($this->calculation->budget != null || $this->calculation->budget >= $this->min_budget) { 
            $this->redirect(route('calculator.results.' . $this->method . '.show'));
        } else {
            $this->sendToast(ToastType::ERROR, 'Please enter a budget for your calculation!');
        }
    }

    private function calculate_budget()
    {
        $this->min_budget = 0;

        foreach ($this->calculation->calculationDebts as $debt) {
            $debt_minimum = max($debt->min_payment_fixed, (($debt->min_payment_percent / 100) * $debt->opening_balance));
            $this->min_budget = $this->min_budget + $debt_minimum;
        }

        $this->calculation->budget = max($this->calculation->budget, $this->min_budget);
        $this->calculation->save();
    }

    public function updated()
    {
        $this->validate();
        
        $this->calculation->save();

        $this->calculate_budget();
    }

    public function mount()
    {
        $this->debts = $this->calculation->calculationDebts;

        if (Auth::check() && Auth::user()->debts()->count() > 0) {
            $this->import_debt_id = Auth::user()->debts()->orderBy('name')->first()->id;
        }

        $this->calculate_budget();
    }

    public function render()
    {
        return view('livewire.calculation-debts-section');
    }
}

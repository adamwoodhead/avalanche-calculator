<?php

namespace Database\Factories;

use App\Models\Debt;
use Illuminate\Database\Eloquent\Factories\Factory;

class DebtFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Debt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,

            'name' => $this->faker->company,
            'description' => null,
            
            'debt_type' => $this->faker->biasedNumberBetween(1, 5, function($x) { return 1 - sqrt($x); }) * 10,
            
            'opening_balance' => $this->faker->randomFloat(2, 250, 2500),
            'interest_rate' => $this->faker->randomFloat(2, 0, 40),
            'monthly_charge' => $this->faker->randomFloat(2, 0, 5),

            'min_payment_fixed' => $this->faker->numberBetween(5, 25),
            'min_payment_percent' => $this->faker->randomFloat(2, 1, 2.5),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Loan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'national_id' => $this->faker->isbn13() . "2",
            'loan_uniqe_id' => $this->faker->isbn13(),
            'type' =>  $this->faker->numberBetween(1, 6),
            'price' => $this->faker->numberBetween(100, 2000),
            'payment_period' => $this->faker->numberBetween(1, 2),
            'depit_value' => 20,
            'phone_number' => $this->faker->phoneNumber(),
            'land_line_number' => $this->faker->phoneNumber(),
            'number_of_insurance' => 0,
            'date_of_birth' => $this->faker->date('Y-m-d', strtotime('now +' . $this->faker->unique()->numberBetween(1, 15) . ' days')),
            'social_status' => $this->faker->numberBetween(0, 3),
            'number_of_children' => $this->faker->numberBetween(0, 6),
            'description' => $this->faker->text(50),
            'have_experince' => $this->faker->numberBetween(0,1),
            'number_of_experice_years' => $this->faker->numberBetween(1, 20),
            'is_owner_project'=>$this->faker->numberBetween(0, 1),
            'address_project'=> $this->faker->text(50),
            'guarantor_type' => $this->faker->numberBetween(0, 2),
            'is_draft' => 0,
            'bank_branch_id' => $this->faker->numberBetween(1, 5),
            'country_id' => 1,
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}

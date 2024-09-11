<?php

namespace Database\Factories;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'day_of_the_month' => $this->faker->numberBetween(1, 31),
            'recurring' => $this->faker->boolean,
            'has_message' => $this->faker->boolean,
            'message' => $this->faker->optional()->sentence,
            'has_payment' => $this->faker->boolean,
            'amount' => $this->faker->optional()->randomFloat(2, 10, 1000),
            'bank_id' => $this->faker->optional()->swiftBicNumber,
            'recipient_name' => $this->faker->optional()->name,
            'mobile_pay_number' => $this->faker->optional()->phoneNumber,
        ];
    }
}

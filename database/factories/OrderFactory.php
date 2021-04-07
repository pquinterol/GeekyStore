<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * THe name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state
     * 
     * @return array
     */
    public function definition()
    {
        return [
            'status' => "Paid",
            "user" => $this->faker->numberBetween($min = 1, $max=10),
            'price' => $this->faker->numberBetween($min = 20, $max = 9000),
        ];
    }
}
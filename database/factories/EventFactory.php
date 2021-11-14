<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition()
    {
        return [
            'owner' => User::factory()->create()->id,
            'name' => $this->faker->word,
            'date' => $this->faker->dateTimeBetween('+1 week', '+4 week'),
        ];
    }
}

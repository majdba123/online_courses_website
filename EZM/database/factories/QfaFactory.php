<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\QFA;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QFA>
 */
class QfaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = QFA::class;
    public function definition(): array
    {
        return [

            'quastion' => $this->faker->sentence,
            'answee' => $this->faker->sentence,
            'web_id' => 1
        ];
    }
}

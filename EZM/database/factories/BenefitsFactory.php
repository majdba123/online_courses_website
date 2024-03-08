<?php

namespace Database\Factories;
use App\Models\Benefits;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benefits>
 */
class BenefitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Benefits::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'benefits' => $this->faker->paragraph,
            'web_id' => 1
        ];
    }
}

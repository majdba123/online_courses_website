<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Goals;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goals>
 */
class GoalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Goals::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'golas' => $this->faker->paragraph,
            'web_id' => 1
        ];
    }
}

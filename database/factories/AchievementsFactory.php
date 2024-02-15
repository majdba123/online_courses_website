<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Achievements;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievements>
 */
class AchievementsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Achievements::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'achievement' => $this->faker->paragraph,
            'web_id' => 1
        ];
    }
}

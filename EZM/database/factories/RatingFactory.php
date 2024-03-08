<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rating;
use App\Models\Courses;
use App\Models\User;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Rating::class;
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'courses_id' => Courses::inRandomOrder()->first()->id,
            'comment' => $this->faker->paragraph
        ];
    }
}

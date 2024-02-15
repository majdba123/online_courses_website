<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\inquire>
 */
class InquireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $faker->uuid,
            'user_id' => $faker->numberBetween(1, 100), // You may need to adjust this range based on the number of users you have
            'subject' => $faker->sentence,
            'email' => $faker->unique()->safeEmail,
            'description' => $faker->paragraph,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ];
    }
}

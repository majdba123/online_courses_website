<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Courses;
use App\Models\video;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Courses::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'video_url' => 'majd11.mp4',
            'discription' => $this->faker->paragraph,
            'time_of_video' => $this->faker->numberBetween(1, 100),
            'courses_id' => Courses::inRandomOrder()->first()->id
        ];
    }
}

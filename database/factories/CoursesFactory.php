<?php

namespace Database\Factories;
use App\Models\Courses;
use App\Models\Doctor;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
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
            'id' => $this->faker->uuid,
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'discription' => $this->faker->text,
            'time_of_course' => $this->faker->numberBetween(1, 100),
            'doctor_id' => Doctor::inRandomOrder()->first()->id,
            'discount_id' => Discount::inRandomOrder()->first()->id
        ];
    }
}

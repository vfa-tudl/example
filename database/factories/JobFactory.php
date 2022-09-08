<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => fake()->name(), 
            'Company' => fake()->name(),
            'salary' => fake()->name(),
            'location' => fake()->name(),
            'work_hour' => fake()->name(),
            'description' => fake()->sentence(),
            'probation'=> fake()->sentence(),
            'display_status'=> fake()->sentence(),
            'Image'=>$this->faker->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker'),  
        ];
    }
}

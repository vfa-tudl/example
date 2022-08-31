<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
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
            'name'=> $this->faker->name,
            'avatar'=>$this->faker->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker'),
            'date'=> $this->faker->dateTime($max = 'now', $timezone = null),
            'profile'=> $this->faker->text($maxNbChars = 200),
        ];
    }
}

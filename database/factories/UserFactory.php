<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'display_name'=> fake()->name(),
            'address'=>faker()->address(),
            'phone_number'=>faker()->mobileNumber(),
            'status_date'=> faker()->dateTime($max = 'now', $timezone = null),
            'status'=>faker()->randomElements($array = array ('a','b','c'), $count = 1),
            'fb_url'=>faker()->url(),
            'languages'=>faker()->randomElements($array = array ('a','b','c'), $count = 1),
            'national'=>faker()->  randomElements($array = array ('a','b','c'), $count = 1),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

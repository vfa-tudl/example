<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)
        ->has(\App\Models\Post::factory()->count(10)
        ,'posts')
        ->create();

        \App\Models\User::factory()
        ->has(\App\Models\Post::factory()->count(5)
        ,'posts')
        ->create([
            'name' => 'Test User',
            'email' => 'tudl@vitalify.asia',
            'password'=> bcrypt('12345678'),
        ]);
        // $this->call(AuthorSeeder::class);
    }
}

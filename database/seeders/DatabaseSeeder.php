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
        ->has(\App\Models\Author::factory()->count(3)
                ->has(\App\Models\Post::factory()->count(3), 'posts')
        ,'authors')
        ->create();

        \App\Models\User::factory()
        ->has(\App\Models\Author::factory()->count(3)
                ->has(\App\Models\Post::factory()->count(3), 'posts')
        ,'authors')
        ->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // $this->call(AuthorSeeder::class);
    }
}

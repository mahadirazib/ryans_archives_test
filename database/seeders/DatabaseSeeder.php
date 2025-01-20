<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create();

        // Create 20 posts
        Post::factory(20)->create([
            'user_id' => fn() => User::inRandomOrder()->first()->id,
        ]);

        // Create 40 parent comments
        Comment::factory(40)->create([
            'user_id' => fn() => User::inRandomOrder()->first()->id,
            'post_id' => fn() => Post::inRandomOrder()->first()->id,
        ]);

        // Create 20 reply comments
        Comment::factory(20)->create([
            'user_id' => fn() => User::inRandomOrder()->first()->id,
            'post_id' => fn() => Post::inRandomOrder()->first()->id,
            'parent_id' => fn() => Comment::whereNull('parent_id')->inRandomOrder()->first()->id,
        ]);
    }
}

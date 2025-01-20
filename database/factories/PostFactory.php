<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(),
            'description' => fake()->paragraphs(3, true),
            'category' => fake()->randomElement(['Technology', 'Travel', 'Food', 'Lifestyle', 'Health']),
        ];
    }
} 
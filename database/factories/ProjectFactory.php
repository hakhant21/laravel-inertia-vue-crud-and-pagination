<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Illuminate\Database\Eloquent\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 30),
            'name' => fake()->name(),
            'slug' => Str::slug(fake()->name()),
            'description' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'image' => 'https://source.unsplash.com/random/300x300',
        ];
    }
}

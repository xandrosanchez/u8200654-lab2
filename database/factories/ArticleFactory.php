<?php

namespace Database\Factories;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(5),
            'symbol_code' => Str::random(10),
            'content' => fake()->text(300),
            'date_time_create' => now(),
            'author' => fake()->firstName()
                        .' '.fake()->lastName(),
        ];
    }
}
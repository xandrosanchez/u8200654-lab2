<?php

namespace Database\Factories;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{

    // protected $model = Flight::class;s
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(1),
            'symbol_code' => Str::random(10),
        ];
    }
}
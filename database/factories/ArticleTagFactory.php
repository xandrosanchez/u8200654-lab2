<?php

namespace Database\Factories;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ArticleTagFactory extends Factory
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function definition()
    {
        $articleIds = DB::table('articles')->pluck('id');
        $tagIds = DB::table('tags')->pluck('id');


        return [
            'article_id' => fake()->randomElement($articleIds),
            'tag_id' => fake()->randomElement($tagIds),
        ];
    }
}
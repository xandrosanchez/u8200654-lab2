<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()->count(100)->create();
        Tag::factory()->count(100)->create();
        ArticleTag::factory()->count(100)->create();
        // $this->call([
        //     $a = ArticleFactory::class,
        //     $t = TagFactory::class,
            
        // ]);
    }
}

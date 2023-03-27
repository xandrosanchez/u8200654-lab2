<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tag;


class CountPostsFromTag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выводим количество статей с заданным id тега';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $tagId = (int)$this->argument('id');
            // dd(Tag::withCount('articles')->findOrFail($tagId));

            $this->info('Count posts = ' . Tag::withCount('articles')->findOrFail($tagId)->articles_count);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $this->error("Tag with id <$tagId > not exist");
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class ArticleUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Перенос информации о лайках и просмотрах в бд';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articles = Article::all()->pluck('id')->toArray();
        foreach ($articles as $article) {
            $item = Article::find($article);
            if ($item->realtime_likes) {
                $item->likes = $item->realtime_likes;
            }
            if ($item->realtime_views) {
                $item->views = $item->realtime_views;
            }
            if ($item->realtime_likes || $item->realtime_views) {
                $item->save();
            }
        }
        return 0;
    }
}

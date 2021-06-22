<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class LikesAndViewsTransplantation extends Command
{

    protected $signature = 'likes-views:transplantation';

    protected $description = 'Перенос информации о лайках и просмотрах в бд';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //$a = Redis::get('article:likes:');
        return 0;
    }
}

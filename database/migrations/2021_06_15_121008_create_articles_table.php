<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок статьи');
            $table->string('slug');
            $table->text('content')->comment('Содержание');
            $table->string('preview')->comment('Изображение');
            $table->integer('views')->comment('Количество просмотров');
            $table->integer('likes')->comment('Количество лайков');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}

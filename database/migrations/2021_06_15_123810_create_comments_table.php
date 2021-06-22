<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id')->comment('ID статьи');
            $table->string('title')->comment('Тема сообщения');
            $table->text('content')->comment('Содержание');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

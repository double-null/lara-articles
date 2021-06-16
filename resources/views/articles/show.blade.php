@extends('layout')

@section('content')

    <h3>{{$article->title}}</h3>
    <div class="row">

        <div id="article-info" class="col-8">
            {{$article->views}} просмотров
            {{$article->likes}} лайков
            Создано: {{$article->created_at}}
        </div>
        <div id="article-like" class="col-md-4">
            <a class="like" href="#" data-article="{{$article->id}}">Лайк!</a>
        </div>
        <div id="tags">
            @foreach($article->tags as $tag)
                <a href="/articles/?tag={{$tag->id}}">{{$tag->name}}</a>
            @endforeach
        </div>
        <div class="col-12">
            {{$article->content}}
        </div>

        <div class="col-12 my-2">
            <h4>Оставить комментарий</h4>
            <form id="comment-form" name="comment-form" method="POST">
                <div class="form-group">
                    <label for="comment-title">Тема комментария</label>
                    <input type="text" class="form-control" id="comment-title">
                </div>
                <div class="form-group">
                    <label for="comment-content">Комментарий</label>
                    <textarea class="form-control" id="comment-content" rows="3"></textarea>
                </div>
                <input type="hidden" id="comment-article" name="article_id" value="{{$article->id}}">
                <button id="comment-send" class="btn btn-primary mt-2">Отправить</button>
            </form>
        </div>

        <div class="comments col-12 my-2">
            @foreach($article->comments as $comment)
                <b>{{$comment->title}}</b>
                <p>{{$comment->content}}</p>
                <div>Опубликовано: {{$comment->created_at}}</div>
            @endforeach
        </div>

    </div>

@endsection

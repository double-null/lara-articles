@extends('layout')

@section('content')
    <div id="article" data-view="1" class="card my-2">
        <div class="card-body">
            <h3>{{$article->title}}</h3>
            <div class="row">
                <div class="col-12">
                    <img class="w-100" style="height: 480px;" src="{{$article->preview}}" alt="{{$article->title}}">
                </div>
                <div id="article-{{$article->id}}-info" class="col-8">
                    <span class="views-counter">{{$article->views}}</span> просмотров
                    <span class="likes-counter">{{$article->likes}}</span> лайков
                    Создано: {{$article->created_at}}
                </div>
                <div id="article-like" class="col-md-4">
                    <a class="like" href="#" data-article="{{$article->id}}">Лайк!</a>
                </div>
                <div id="tags">
                    @foreach($article->tags as $tag)
                        <span class="badge bg-success">
                            <a class="text-white" href="/articles/?tag={{$tag->id}}">{{$tag->label}}</a>
                        </span>
                    @endforeach
                </div>
                <div class="col-12">
                    {{$article->content}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="comment-form-block" class="col-12 my-2">
            <h4>Оставить комментарий</h4>
            <form id="comment-form" name="comment-form" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment-title">Тема комментария</label>
                    <input type="text" class="form-control" id="comment-title">
                    <div id="comment-title-error" class="errors"></div>
                </div>
                <div class="form-group">
                    <label for="comment-content">Комментарий</label>
                    <textarea class="form-control" id="comment-content" rows="3"></textarea>
                    <div id="comment-content-error" class="errors"></div>
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

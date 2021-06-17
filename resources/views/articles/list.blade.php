@extends('layout')

@section('left-column')
    <h3>Теги</h3>
    @foreach($tags as $tag)
        <a href="/articles/?tag={{$tag->id}}">{{$tag->name}}</a>
    @endforeach
@endsection

@section('content')

    @foreach($articles as $article)
        <h3><a href="/articles/{{$article->slug}}/">{{$article->title}}</a></h3>
        <div class="row">
            <div class="col-12">
                {{$article->content}}
            </div>
            <div id="article-{{$article->id}}-info" class="col-8">
                <span class="views-counter">{{$article->views}}</span> просмотров
                <span class="likes-counter">{{$article->likes}}</span> лайков
                Создано: {{$article->created_at}}
            </div>
            <div class="col-md-4">
                <a class="like" href="#" data-article="{{$article->id}}">Лайк!</a>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12">{{$articles->links()}}</div>
        @csrf
    </div>

@endsection

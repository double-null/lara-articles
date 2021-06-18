@extends('layout')

@section('content')
    <div class="row">
        @foreach($articles as $article)
            <div class="card my-2 col-md-4">
                <div class="card-body">
                    <div class="col-12">
                        <img class="w-100" src="{{$article->preview}}" alt="{{$article->title}}">
                    </div>
                    <h3><a href="/articles/{{$article->slug}}/">{{$article->title}}</a></h3>
                    <div class="col-12">
                        {{ Illuminate\Support\Str::limit($article->content, 300)}}
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
            </div>
        @endforeach
    </div>
@endsection

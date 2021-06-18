@extends('layout')

@section('content')
    <div class="col-md-3">
        <h3>Теги</h3>
        @foreach($tags as $tag)
            <span class="badge bg-success">
            <a class="text-white" href="/articles/?tag={{$tag->id}}">{{$tag->label}}</a>
        </span>
        @endforeach
    </div>
    <div class="col-md-9">
        @foreach($articles as $article)
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <img class="w-100" style="height: 480px;" src="{{$article->preview}}" alt="{{$article->title}}">
                        </div>
                        <h3><a href="/articles/{{$article->slug}}/">{{$article->title}}</a></h3>
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
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-12">
                @if($tagId)
                    {!! $articles->appends(['tag' => $tagId])->links() !!}
                @else
                    {{$articles->links()}}
                @endif
            </div>
            @csrf
        </div>
    </div>
@endsection

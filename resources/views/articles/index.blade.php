@extends('layout')

@section('content')
    @if($message = session('message'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <h1 class="my-4">وبلاگ</h1>

    <!-- Blog Post -->
    @foreach( $articles as $article )
        <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/550x300" alt="Card image cap">
            <div class="card-body">
                <a href="{{ route('article.show', ['article'=>$article->slug]) }}"><h2 class="card-title">{{ $article->title }}</h2></a>
                @if(auth()->check())
                    <small><a href="{{ route('article.edit' , ['article' => $article->slug ]) }}">ویرایش مقاله</a></small>
                @endif
                <p class="card-text">{!! $article->body !!}</p>
                <a href="{{ route('article.show', ['article'=>$article->slug]) }}" class="btn btn-sm btn-info">بیشتر بخوانید </a>
            </div>
            <div class="card-footer text-muted">
                نوشته شده در {{ jdate($article->created_at)->format('%A, %d %B %y') }} توسط
                <a href="{{ route('article.show', ['article'=>$article->slug]) }}">{{ $article->user->name }}</a>
                <ul class="float-left list-inline">
                    @foreach( $article->categories()->pluck('name') as $cate)
                        <li class=""><a href="/category/{{ $cate }}">{{ $cate }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach

    <!-- Pagination -->
    <div class="text-center w-100">
        {!! $articles->render() !!}
    </div>

@endsection

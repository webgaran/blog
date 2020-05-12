@extends('layout')

@section('content')

    <h1 class="my-4">{{ $article->title }}</h1>


        <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{!! $article->body !!}</p>
                <a href="#" class="btn btn-primary">بیشتر بخوانید &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                نوشته شده در {{ jdate($article->created_at)->format('%A, %d %B %y') }} توسط
                <a href="#">{{ $article->user->name }}</a>
                <ul class="float-left list-inline">
                    @foreach( $article->categories()->pluck('name') as $cate)
                        <li><a href="/article/category/{{ $cate }}">{{ $cate }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header text-muted">
                ارسال نظر
            </div>
            @if(auth()->check())
            <div class="card-body">
                @include('layouts.errors')
                <form action="{{ route('comment.store', ['article'=>$article->slug]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="body">پیام شما</label>
                        <textarea type="text" class="form-control" name="body"></textarea>
                    </div>
                    <input class="btn btn-outline-info" type="submit" value="ارسال">
                </form>
            </div>
            @else
                <a href="/register">برای ارسال کامنت حتما باید عضو وبسایت باشید</a>
            @endif
        </div>

        <div class="card mb-4">
            <div class="card-header text-muted"><h4>نظرات</h4></div>
            <div class="card-body">
                @foreach( $comments as $comment )
                    <h5>{{ $comment->user->name }}</h5>
                    <p>{{ $comment->body }}</p>
                    <hr>
                @endforeach
            </div>
        </div>

@endsection
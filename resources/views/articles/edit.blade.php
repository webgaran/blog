@extends('layout')

@section('content')

    <h1 class="page-header">
        ارسال مقاله
    </h1>

    @include('layouts.errors')

    <form action="{{ route('article.update' , ['article' => $article->slug]) }}" method="post">
        {!! csrf_field() !!}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="title">عنوان مقاله : </label>
            <input type="text" name="title" class="form-control" id="title" placeholder="لطفا عنوان را وارد کنید ..." value="{{ $article->title }}">
        </div>
        <div class="form-group">
            <label for="category">دسته بندی ها : </label>
            <select name="category[]" class="form-control border" id="category" title=" دسته بندی مورد نظر خود را انتخاب کنید..." multiple>
                @foreach( $categories as $id => $name )
                    <option value="{{ $id }}" {{ in_array($id , $article->categories()->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="body">متن مقاله :</label>
            <textarea class="form-control" name="body" id="body" placeholder="متن را وارد کنید" rows="7">{{ $article->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-info">ویرایش مقاله</button>
    </form>

@endsection

@section('styles')
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="/js/bootstrap-select.js"></script>

    <script>
        $('#category').selectpicker();
    </script>
@endsection

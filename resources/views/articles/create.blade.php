@extends('layout')

@section('content')

    <div class="pb-2 mt-4 mb-2 border-bottom"><h1>ارسال مقاله</h1> </div>
    @include('layouts.errors')
    <form action="{{ route('article.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">نام مقاله</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="عنوان مقاله">
        </div>
        <div class="form-group">
            <label for="category">دسته بندی ها : </label>
            <select name="category[]" class="form-control border" id="category" title=" دسته بندی مورد نظر خود را انتخاب کنید..." multiple>
                @foreach( $categories as $id => $name )
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="body">متن مقاله</label>
            <textarea rows="15" type="text" class="form-control" id="body" name="body" placeholder="متن مقاله"></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-outline-info btn-sm" type="submit" value="ارسال مقاله">
        </div>
    </form>

@endsection

@section('scripts')
    <script src="/js/bootstrap-select.js"></script>

    <script>
        $('#category').selectpicker();
    </script>
@endsection

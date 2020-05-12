<!-- Search Widget -->
<div class="sticky-top">
    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">دسته بندی ها</h5>
        <div class="card-body">
            <div class="row">
                @foreach( $categories as $row )
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @foreach($row as $category)
                                <li><a href="{{ route('category.index' , ['category' => $category->name]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
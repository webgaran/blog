<div class="container">
    <!-- <a class="navbar-brand" href="/">وبلاگ</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/article/create">ارسال مقاله
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>

        @if(Auth::check())
            <div class="nav navbar-left" style="margin-top: 5px">
                <form action="{{ route('logout') }}" method="post">
                    {!! csrf_field() !!}

                    <button class="btn btn-sm btn-warning">خروج از حساب کاربری</button>
                </form>
            </div>

        @else
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a class="btn btn-sm btn-success" href="/login">ورود</a>
                </li>
                <li>
                    <a class="btn btn-sm btn-info" href="/register">عضویت</a>
                </li>
            </ul>
        @endif
    </div>
</div>

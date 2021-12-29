<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- script for dropdown menu -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="rounded navbar-brand bg-dark text-success p-2 m-0" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a class="rounded p-2 m-0 font-weight-bold page-link justify-content-center border text-danger bg-dark h6" href='{{$url = route("create")}}'>آگهی جدید ایجاد کنید</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    @auth @if((Auth::user()->is_admin)=='yes') <a class="rounded p-2 m-0 font-weight-bold page-link justify-content-center border text-danger bg-dark h6" href="{{$url = route('adminHome')}}">پنل مدیریت</a> @endif @endauth

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link rounded p-2 m-0 font-weight-bold page-link justify-content-center border text-danger bg-dark h6" href="{{ route('login') }}">{{ __('ورود') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link rounded p-2 m-0 font-weight-bold page-link justify-content-center border text-danger bg-dark h6" href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <!-- Default dropleft button -->
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Dropdown menu links -->
                                        <a class="dropdown-item" href="{{ route('list') }}">آگهی های من</a>
                                        <a class="dropdown-item p-2 m-0" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('خروج') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="d-flex p-2 flex-row-reverse">

            <div class="btn-group dropleft p-2 sticky-top h-25 d-flex flex-column ml-auto mx-auto justify-content-center">

                <div class="p-2">
                    @auth
                    <div class=" btn-group dropleft p-2 sticky-top h-25">
                        <button class="mt-5  btn">
                            <a href="{{$url = route('favourites')}}" class="rounded navbar-brand bg-dark text-white p-2 m-0">
                                مورد علاقه ها
                            </a>
                        </button>
                    </div>
                    @endauth
                </div>

                <div class="p-2 ">
                    <button type="button" class="mt-1  btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-flip="false">
                        دسته بندی
                    </button>
                    <div class="dropdown-menu ">
                        @foreach ($Categories as $Category)
                        <form action="/{{$Category->id}}/AdsByOneCategory" method="get">
                            @csrf
                            <input class="dropdown-item form-control" type="submit" value="{{$Category->name}}"></input>
                        </form>
                        @endforeach
                    </div>
                </div>

            </div>


            <div class="ml-auto mx-auto w-100 p-2">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>

        </div>
    </div>
</body>

</html>
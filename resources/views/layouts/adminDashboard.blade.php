<head>
  <title>مدیر مدیر مدیر</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div class="d-flex justify-content-center bg-dark text-white p-3">
    <a href="{{$url = route('adminHome')}}" class="text-white text-decoration-none">
      <h3>صفحه مدیریت عالی و زیبا</h3>
    </a>
  </div>
  <div class="container">
    <div class="row">
      <div class="col bg-dark">
        <a href="{{$url = route('adminHome')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4">پنل مدیریت عالی</span>
        </a>
        <hr>
        <ul class="nav nav-tabs flex-column mb-auto" role="tablist">
          <li class="nav-item">
            <a href='{{$url = route("listAds")}}' role="tab" data-toggle="tab" class="nav-link nav-link text-white" aria-current="page" aria-selected="true">
              لیست آگهی ها
            </a>
          </li>
          <li class="nav-item">
            <a href='{{$url = route("listCategories")}}' role="tab" data-toggle="tab" class="nav-link text-white" aria-selected="false">
              لیست دسته بندی ها
            </a>
          </li>
          <li class="nav-item"> 
            <a href='{{$url = route("listAdmins")}}' role="tab" data-toggle="tab" class="nav-link text-white" aria-selected="false">
              لیست مدیران زیر
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            @auth @if ((Auth::user()->id)==1 ) <img src="/images/Screenshot from 2021-12-22 16-13-00.png" alt="" width="32" height="32" class="rounded-circle me-2"> @endif @endauth
            <strong class="p-3">{{ Auth::user()->name }}</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{ route('list') }}">صفحه آگهی های شخصی خودتون</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('خروج') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-10">
        <main>
          @yield('content')
        </main>
      </div>
    </div>
  </div>



  
</body>
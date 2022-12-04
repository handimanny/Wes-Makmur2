<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Wes Makmur</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>
    .min {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        justify-content: space-between;
    }
    </style>
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body class="bg-dark" >
<div class="min">
  <div class="div">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-lg">
            <div class="container">
                <a class="navbar-brand {{ request()->is('/*')? 'active fw-semibold':'' }}" href="{{ url('/') }}">
                    Wes Makmur
                </a>
                <a class="nav-link text-light {{ request()->is('rekomen*')? 'active fw-semibold':'' }}" href="{{ url('rekomen') }}">
                    Rekomendasi
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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
                                    <a class="nav-link {{ request()->is('login*')? 'active fw-semibold':'' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('register*')? 'active fw-semibold':'' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->role == 'editor')
                            <li class="nav-item">
                            <a class="nav-link {{ request()->is('produk*')? 'active fw-semibold':'' }}" href="{{ url('produk') }}">
                                Produk
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ request()->is('postingan*')? 'active fw-semibold':'' }}" href="{{ url('postingan') }}">
                                Postingan
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ request()->is('kategori*')? 'active fw-semibold':'' }}" href="{{ url('kategori') }}">
                                Kategori
                            </a>
                            </li>
                            @endif
                            @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                            <a class="nav-link {{ request()->is('produk*')? 'active fw-semibold':'' }}" href="{{ url('produk') }}">
                                Produk
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ request()->is('postingan*')? 'active fw-semibold':'' }}" href="{{ url('postingan') }}">
                                Postingan
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ request()->is('kategori*')? 'active fw-semibold':'' }}" href="{{ url('kategori') }}">
                                Kategori
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ request()->is('pengguna*')? 'active fw-semibold':'' }}" href="{{ url('pengguna') }}">
                                Pengguna
                            </a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('status')
            @yield('content')
        </main>
    </div>

    </div>
<footer class="navbar shadow-lg p-3 mt-4 text-light">
<div class="container">
    <p></p>

    <p>
      WES MAKMUR
    </p>
</div>
</footer>
</div>

<script>
  function previewImage() {
      const image = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
      }
  }
</script>

</body>
</html>

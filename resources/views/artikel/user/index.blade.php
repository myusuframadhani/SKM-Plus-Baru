@extends('layouts.appUser')
<body>
    @php
        $user = auth()->user()
    @endphp
    <div class="container" style="font-family: 'Rubik', sans-serif; scroll-behavior: smooth;">
        <nav class="my-4">
            <div class="row justify-content-center align-items-center mx-4">
                <div class="col-3 text-center">
                    <a href="{{ route('home') }}"><img src="{{asset('img/logo.png')}}" alt="Logo Website" class="ms-5" style="transform: scale(0.75);"></a> 
                </div>
                <div class="col-6 text-center">
                    <ul style="font-family: 'Raleway', sans-serif; font-size: 12px;">
                        <a href="{{ route('order.index')}}"><li class="d-inline mx-3">PRODUK</li></a>
                        <a href="{{ route('artikel.user.index')}}"><li class="d-inline mx-3 text-decoration-underline">ARTIKEL</li></a> 
                        <a href="{{ route('aboutme') }}"><li class="d-inline mx-3">TENTANG KAMI</li></a>
                        <a href="{{ route('faq') }}"><li class="d-inline mx-3">FAQ</li></a>
                    </ul>
                </div>
                
                <div class="col-3 text-center">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-primary">{{ __('Login') }}</button></a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-primary">{{ __('Register') }}</button></a>
                        </li>
                    @endif
                @else
                    <ul class="nav-item dropdown text-dark">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person me-2 text-dark"></i>{{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.show', $user->id) }}">Profil</a>
                            <a class="dropdown-item" href="{{ route('transaksi.user.index')}}">Transaksi</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </ul>
                @endguest
                </div>
            </div>
        </nav>

        <main class="container">
            <div class="mx-5 mt-5">
                <p class="fw-bold fs-2 ms-5">Artikel Susu Kedelai</p>
            </div>
            
            <p class="my-4 ms-5 ps-5"><i class="fa-solid fa-house me-3"></i><a href="{{ route('home') }}">Dashboard</a> > <span class="fw-bolder"><a href="{{ route('artikel.user.index') }}">Artikel</a></span></p>
            <div class="row">
                @forelse($artikel as $data)
                <div class="col-3 rounded">
                        <div class="card text-black border-0">
                            <div class="rounded">
                                <img src="img/artikel.jpg" class="rounded card-img-top" alt="Header artikel">
                            </div>
                            <div class="card-body text-center">
                                <p class="card-title fw-bold fs-5">{{ $data->judul }}</p>
                                <p class="text-secondary">{!! Str::limit($data->deskripsi, 30) !!}</p>
                                <a href="{{ route ('artikel.user.show', $data->id)}}"><button type="button" class="btn text-white my-3" style="background-color: #457B9D">Selengkapnya...</button></a>
                            </div>
                        </div>
                </div>
                @empty
                @endforelse
            </div>
        </main>
    </div>
</body>
<footer class="text-center text-white mt-5" style="background-color: #FFF;">

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: #A8DADC;">
    © 2022 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">SKMPlus.com</a>
  </div>
  <!-- Copyright -->
</footer>
</html>

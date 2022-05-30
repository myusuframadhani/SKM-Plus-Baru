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
                        <a href="{{ route('artikel.user.index')}}"><li class="d-inline mx-3">ARTIKEL</li></a>
                        <a href="{{ route('aboutme') }}"><li class="d-inline mx-3 text-decoration-underline">TENTANG KAMI</li></a>
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
                    <ul class="nav-item dropdown text-white">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person me-2 text-white"></i>{{ Auth::user()->name }}
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
            <p class="fs-2 fw-bold ms-5 my-3">Tentang Kami</p>
            <div class="row">
                <div class="col-6">
                    <img src="{{asset('img/aboutme.png')}}" alt="Tentang Kami">
                </div>
                <div class="col-6" style="background-color: #F3F3F3;">
                    <p class="fs-3">Pabrik SKM (Susu Kedelai Madu) plus merupakan pabrik susu kedelai yang terletak di daerah Tlogo Wetan, Antirogo, Jember, Jawa Timur. Pabrik kami telah berdiri lebih dari 15 tahun dengan berbagai cabang yang dapat menjangkau pelanggan.</p>
                    <p class="fs-3 mt-5">Pabrik kami menghasilkan 4 varian produk susu kedelai dengan rasa-rasa yang disukai masyarakat.</p>
                </div>
            </div>
            <div class="mx-auto mt-5">
                <p class="fs-6 text-secondary fst-italic text-center">SKM Plus Madu</p>
                <p class="fs-6 text-secondary fst-italic text-center">Tlogo Wetan, Antirogo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68125,</p>
                <p class="fs-6 text-secondary fst-italic text-center">0331-312345, 081-222-999-231</p>
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

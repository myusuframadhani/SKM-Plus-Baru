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
                        <a href="{{ route('aboutme') }}"><li class="d-inline mx-3">TENTANG KAMI</li></a>
                        <a href="{{ route('faq') }}"><li class="d-inline mx-3 text-decoration-underline">FAQ</li></a>
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
            <p class="fs-2 fw-bold ms-5 my-3">Frequently Asked Question</p>
            <div class="row justify-content-evenly">
                <div class="col-5 my-2">
                    <div class="card" style="background-color: #EEE;">
                        <div class="card-body">
                            <p class="fs-5">
                                Apakah pengiriman dapat dilakukan ke luar kota?
                            </p>
                            <hr>
                            <p class="fs-6">
                                Jawaban : Tentu saja, pengiriman dapat dilakukan ke luar kota. Sertakan alamat tujuan dengan jelas
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-5 my-2">
                    <div class="card" style="background-color: #EEE;">
                        <div class="card-body">
                            <p class="fs-5">
                                Apakah pengiriman dapat dilakukan setiap hari?
                            </p>
                            <hr>
                            <p class="fs-6">
                                Jawaban : Pemesanan melalui website SKM Plus dapat dilakukan setiap hari dan website dapat diakses 24 jam 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-5 my-2">
                    <div class="card" style="background-color: #EEE;">
                        <div class="card-body">
                            <p class="fs-5">
                                Estimasi pengiriman berapa hari ?
                            </p>
                            <hr>
                            <p class="fs-6">
                                Jawaban : Untuk pengiriman dalam kota dan wilayah sekitar dapat dikirim pada hari yang sama saat pemesanan produk
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-5 my-2">
                    <div class="card" style="background-color: #EEE;">
                        <div class="card-body">
                            <p class="fs-5">
                                Kedelai yang digunakan jenis apa ? 
                            </p>
                            <hr>
                            <p class="fs-6">
                                Jawaban : Kedelai yang digunakan dalam produk SKM Plus ini merupakan kedelai import yaitu kedelai premium dari USA
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-5 my-2">
                    <div class="card" style="background-color: #EEE;">
                        <div class="card-body">
                            <p class="fs-5">
                                Apakah dapat memilih susu dengan rasa berbeda? 
                            </p>
                            <hr>
                            <p class="fs-6">
                                Jawaban : Untuk pemesanan rasa yang berbeda dapat memilih untuk produk bundling dengan harga lebih terjangkau
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-5 my-2">
                    <div class="card" style="background-color: #EEE;">
                        <div class="card-body">
                            <p class="fs-5">
                                Dapatkah melakukan penukaran produk?
                            </p>
                            <hr>
                            <p class="fs-6">
                                Jawaban : Tidak dapat dilakukan penukaran produk, jadi pastikan sebelum membeli untuk memeriksa pesanan yaa
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
    </div>
</body>
<div style="height: 74px;"></div>
<footer class="text-center text-white mt-5" style="background-color: #FFF;">

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: #A8DADC;">
    © 2022 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">SKMPlus.com</a>
  </div>
  <!-- Copyright -->
</footer>
</html>

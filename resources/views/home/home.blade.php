@extends('layouts.appUser')
<body>
    @php
        $user = auth()->user()
    @endphp
    <div class="container" style="font-family: 'Nunito'; scroll-behavior: smooth;">
        <nav class="my-4">
            <div class="row justify-content-center">
                <div class="col-3 text-center">
                    <p>Logo</p>
                </div>
                <div class="col-6 text-center">
                    <ul class="">
                        <li class="d-inline mx-3">Produk</li>
                        <li class="d-inline mx-3">Produk</li>
                        <li class="d-inline mx-3">Produk</li>
                        <li class="d-inline mx-3">Produk</li>
                    </ul>
                </div>
                <div class="col-3 text-center">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.show', $user->id) }}">Profil</a>
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
                </div>
            </div>
        </nav>
        <main class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-1"></div>
                <div class="col-5 ps-5">
                    <p class="fs-6 fw-bolder ps-5">SUSU SEHAT UNTUKMU</p>
                    <p class="fs-1 fw-bold py-3 ps-5" style="color: #00c6b6">MINUM SEMAUMU</p>
                    <p class="fs-6 text-secondary lh-sm ps-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum voluptates assumenda, ab dignissimos, voluptatum ad itaque voluptate repudiandae totam non odio fuga tenetur mollitia exercitationem commodi, reprehenderit sequi porro quaerat.</p>
                    <a href="#belanja"><button type="button" class="btn text-white ms-5 my-4" style="background-color: #00c6b6;">Belanja</button></a>
                    <a href=""><button type="button" class="btn btn-outline-info ms-2 my-4" data-mdb-ripple-color="dark">Lainnya</button></a>
                </div>
                <div class="col-6 text-end">
                    <img src="{{asset('img/landing-page.png')}}" alt="" style="background-size : cover;">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-5 text-center">
                    <img src="{{asset('img/gizi.png')}}" alt="gizi susu" style="transform: scale(0.75);" class="me-5">
                </div>

                <div class="col-5">
                    <p class="fs-2 fw-bold my-3">Minum Susu Untuk Kesehatanmu</p>
                    <p class="fs-6 text-secondary lh-sm my-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum voluptates assumenda, ab dignissimos, voluptatum ad itaque voluptate repudiandae totam non odio fuga tenetur mollitia exercitationem commodi, reprehenderit sequi porro quaerat.</p>
                    <div class="row my-3">
                        <div class="col-6">
                            <p class="text-info fw-bolder fs-5 ">1. Vitamin A, B, D, E</p>
                            <p class="text-info fw-bolder fs-5 ">2. Kalsium</p>
                        </div>
                        <div class="col-6">
                            <p class="text-info fw-bolder fs-5 ">3. Kalium</p>
                            <p class="text-info fw-bolder fs-5 ">4. Zat Besi & Fosfor</p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="fs-1 fw-bold text-center text-decoration-underline">Yuk Belanja</p>
            <div class="row mt-5 px-5">

                <!-- Original -->
                <div class="col-3" id="belanja">
                    <div class="card text-black border-0">
                        <div class="rounded-0">
                            <img src="{{asset('img/original.png')}}" class="card-img-top px-5 pt-5" alt="Susu rasa original">
                        </div>
                        <div class="card-body text-center">
                            <p class="card-title fw-bold fs-4">Rasa Original</p>
                            <div class="my-1"><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></div>
                            <p class="fs-3 fw-bold text-success">Rp 3.000,00</p>
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <a href="#"><button type="button" class="btn text-white my-4" style="background-color: #00c6b6">Beli</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                <div class="card text-black border-0">
                        <div class="rounded-0">
                            <img src="{{asset('img/Coklat.png')}}" class="card-img-top px-5 pt-5" alt="Susu rasa coklat">
                        </div>
                        <div class="card-body text-center">
                            <p class="card-title fw-bold fs-4">Rasa Coklat</p>
                            <div class="my-1"><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></div>
                            <p class="fs-3 fw-bold text-success">Rp 3.000,00</p>
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <a href="#"><button type="button" class="btn text-white my-4" style="background-color: #00c6b6">Beli</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-black border-0">
                        <div class="rounded-0">
                            <img src="{{asset('img/strawberry.png')}}" class="card-img-top px-5 pt-5" alt="Susu rasa strawberry">
                        </div>
                        <div class="card-body text-center">
                            <p class="card-title fw-bold fs-4">Rasa Strawberry</p>
                            <div class="my-1"><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></div>
                            <p class="fs-3 fw-bold text-success">Rp 3.000,00</p>
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <a href="#"><button type="button" class="btn text-white my-4" style="background-color: #00c6b6">Beli</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card text-black border-0">
                        <div class="rounded-0">
                            <img src="{{asset('img/melon.png')}}" class="card-img-top px-5 pt-5" alt="Susu rasa melon">
                        </div>
                        <div class="card-body text-center">
                            <p class="card-title fw-bold fs-4">Rasa Melon</p>
                            <div class="my-1"><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i></div>
                            <p class="fs-3 fw-bold text-success">Rp 3.000,00</p>
                            <p class="text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <a href="#"><button type="button" class="btn text-white my-4" style="background-color: #00c6b6">Beli</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

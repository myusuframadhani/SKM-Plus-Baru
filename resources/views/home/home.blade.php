@extends('layouts.appUser')
<body>
    @php
        $user = auth()->user()
    @endphp
    <div class="container" style="font-family: 'Rubik', sans-serif; scroll-behavior: smooth;">
        <nav class="my-4">
            <div class="row justify-content-center align-items-center mx-4">
                <div class="col-3 text-center">
                    <img src="{{asset('img/logo.png')}}" alt="Logo Website" class="ms-5" style="transform: scale(0.75);">
                </div>
                <div class="col-6 text-center">
                    <ul style="font-family: 'Raleway', sans-serif; font-size: 12px;">
                        <a href="{{ route('order.index')}}"><li class="d-inline mx-3">PRODUK</li></a>
                        <li class="d-inline mx-3">ARTIKEL</li>
                        <li class="d-inline mx-3">TENTANG KAMI</li>
                        <li class="d-inline mx-3">FAQ</li>
                    </ul>
                </div>
                <div class="rectangle" 
                    style= "position: absolute;
                            width: 412px;
                            height: 750px;
                            left: 1105px;
                            top: 0px;
                            z-index: -1;
                            background: #457B9D;
                            border-radius: 30px 0px 0px 30px;"
                >

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
            <div class="row align-items-center mx-3">
                <div class="col-6 ps-5">
                    <p class="fs-1 fw-bold py-3 ps-5" style="font-family: 'Rubik', sans-serif; font-size: 44px; font-weight: 600">SUSU KEDELAI, CIPTAKAN GENERASI <span style="color: #A8DADC">SEHAT!</span></p>
                    <p class="fs-6 text-secondary lh-sm ps-5 my-4" font-family="font-family: 'Rubik', sans-serif;">All in one destination for COVID-19 health queries.  Consult 10,000+ health workers about your concerns.</p>
                    <a href="#belanja"><button type="button" class="btn text-white ms-5 my-4" style="background-color: #457B9D;">Belanja</button></a>
                    <a href=""><button type="button" class="btn btn-outline-primary ms-2 my-4" data-mdb-ripple-color="dark">Lainnya</button></a>
                </div>
                <div class="col-6 text-end">
                    <img src="{{asset('img/landing-page.png')}}" alt="" style="background-size : cover;">
                </div>
            </div>
            <div class="row mx-5 mb-5">
                <div class="col-3 mx-5 mb-5">
                    <a href=""><img src="{{asset('img/video.png')}}" alt=""></a>
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
                            <p class="fw-bolder fs-5" style="color: #457B9D">1. Vitamin A, B, D, E</p>
                            <p class="fw-bolder fs-5" style="color: #457B9D">2. Kalsium</p>
                        </div>
                        <div class="col-6">
                            <p class="fw-bolder fs-5" style="color: #457B9D">3. Kalium</p>
                            <p class="fw-bolder fs-5" style="color: #457B9D">4. Zat Besi & Fosfor</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 px-5 align-items-center justify-content-center">

                <div class="col-6 ps-5 mb-5">
                    <p class="fs-1 fw-bold ps-5">Katalog produk  berisi variasi rasa susu kedelai yang menyegarkan</p>
                    <p class="fs-6 text-secondary ps-5">Susu kedelai biasanya hanya disajikan rasa original. Variasi rasa  membuat anda dapat merasakan sensasi rasa berbeda yang tentunya tetap menyehatkan. </p>
                        <a href="{{ route('order.index')}}"><button type="button" class="btn text-white my-4 ms-5" style="background-color: #457B9D;">Yuk Belanja</button></a>
                </div>
                <div class="col-6 text-center">
                    <img src="{{asset('img/belanja.png')}}" alt="belanja" style="transform: scale(0.75);" class="">
                </div>
                
                
            </div>
        </main>
    </div>
</body>
<footer class="text-center text-white mt-5" style="background-color: #FFF;">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-linkedin"></i
      ></a>
      <!-- Github -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: #A8DADC;">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">SKMPlus.com</a>
  </div>
  <!-- Copyright -->
</footer>
</html>

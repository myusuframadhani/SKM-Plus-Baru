@extends('layouts.appUser')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img class="mx-auto my-4" src="{{ asset('img/header_login.png') }}" height="175px" width="175px">
            <div class="card" style="background-color: #457B9D">
                <div class="card-header fw-bold fs-4 text-center">{{ __('Login') }}</div>

                <div class="card-body" style="background-color: #A8DADC">
                    <div class="row mx-auto offset-4 mb-3" style="width: 50%;">
                        @if($message = Session::get('success'))
                            <div class="mt-4 mb-0 mx-4 alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ $message }}
                            </div>
                        @elseif($message = Session::get('error'))
                            <div class="mt-4 mb-0 mx-4 alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ $message }}
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row my-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-primary text-white">
                                    {{ __('Masuk') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p >Belum punya akun?</p>
                            <a class="btn btn-link" href="{{ route('register')}}">Daftar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

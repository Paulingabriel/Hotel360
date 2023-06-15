<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    @include('layouts.head')
</head>

<body style="height: 100vh; width: 100vw;">


<style>

    .image{
        background-image: url({{ asset('../app-assets/img/sidebar-bg/15.webp') }});
        /* background-color:  rgb(0, 0, 0, 0.7); */
        background-color:  rgb(11, 69, 37, 0.7);
        background-blend-mode: darken;
        background-size: cover;
        background-repeat: no-repeat;
        justify-content: center;
        align-items: center
    }
    .image h1{
        font-size: 50px;
        color: #fff;
    }
    .login h1{
        font-size: 50px;
        color: #1b721b;
        text-align: center;
        text-shadow: 0 3px 4px rgb(27, 114, 27, 0.7);
    }
    .login{
        padding: 50px 150px;
        background-color: #ffffff;
    }
    .login .logo{
        /* display: flex;
        justify-content: center; */
    }
    .login .header h6{
        text-align: center;
        font-size: 14px;
        letter-spacing: 1px;
        font-family: 'poppins';
        font-weight: 600;
        color: #1b721b;
    }
    .login .header p{
        text-align: center;
        font-size: 14px;
        text-shadow: 0 3px 4px rgb(27, 114, 27, 0.3);
        letter-spacing: 1px;
        font-family: 'poppins';
        font-weight: 500;
        color: #1b721b;
        margin-top: 20px;
        padding: 0 50px 10px 50px;
    }
    input::placeholder{
        color: #319b31!important;
        font-family: 'poppins';
    }
    .form-control{
    height: 50px;
    box-sizing: border-box;
    border-radius: 25px!important;
    padding: 0 15px 0 55px!important;
    border: none!important;
    box-shadow: 0 3px 8px rgb(0, 0, 0, 0.1);
    }

    .form-control:focus{
        border: 1px solid  rgba(50, 162, 50, 0.8)!important;
        box-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;
        background-color: #fff!important;
    }
    .submit{
        height: 60px!important;
        border-radius: 30px!important;
        border: none;
        box-shadow: 0 3px 4px rgba(50, 162, 50, 0.8);
        background-color: #0B4525;
        color: #fff!important;
        font-family: 'poppins';
        font-size: 18px;
        letter-spacing: 1px;
        padding: 0!important;
    }
    .input-group{
        position: relative;
    }
    .input-group i{
        position: absolute;
        top: 15px;
        left: 30px;
    }
    @media all and (min-width: 1250px){
        .login{
        padding: 50px 125px;
        background-color: #ffffff;
        }
    }
    @media all and (min-width: 1150px) and (max-width: 1250px){
        .login{
        padding: 50px 100px;
        background-color: #ffffff;
        }
    }
    @media all and (min-width: 768px) and (max-width: 1150px){
        .login{
        padding: 50px;
        background-color: #ffffff;
        }
    }
    @media all and (min-width: 500px) and (max-width: 768px){
        .login{
        padding: 50px 100px;
        background-color: #ffffff;
        }
    }
    @media all and (max-width: 500px){
            .login{
        padding: 50px;
        background-color: #ffffff;
        }
    }
    @media all and (max-width: 300px){
            .login{
        padding: 20px;
        background-color: #ffffff;
        }
        .login .header p{
        text-align: center;
        font-size: 10px;
        letter-spacing: 1px;
        font-family: 'poppins';
        font-weight: 500;
        color: #1b721b;
        margin-top: 30px;
        padding: 0 20px 15px 20px;
    }
    }
</style>
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-md-6 d-none d-md-flex h-100 image p-0">
            <div class="">
                <img src="{{ asset('../app-assets/img/logo 360 blanc.png') }}" alt="" style="width: 150px;"/>
            </div>
        </div>
        <div class="col-md-6 col-12 h-100 login">
            <div class="header">
                <h6>
                    BIENVENUE SUR
                </h6>
                <div class="logo">
                    <div class="text-center">
                        <img src="{{ asset('../app-assets/img/logo 360.png') }}" style="width: 100px;" alt=""/>
                    </div>
                </div>
                <p>
                    Reinitialisation du Mot de Passe
                </p>
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control border border-2 @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <i class="fa-solid fa-user"></i>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control border border-2 @error('password') is-invalid @enderror" placeholder="Mot de passe" required autocomplete="new-password">
                    <i class="fa-solid fa-lock"></i>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="input-group mb-4">
                    <input type="password" name="password_confirmation" class="form-control border border-2 @error('password') is-invalid @enderror" placeholder="Confirmer le Mot de passe" required autocomplete="new-password">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="input-group">
                    <button type="submit" class="form-control submit">Reinitialiser</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../app-assets/vendors/js/core/popper.min.js"></script>
<script src="../app-assets/vendors/js/core/bootstrap.min.js"></script>
</body>
</html>








{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

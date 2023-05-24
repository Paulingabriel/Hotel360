<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    @include('layouts.head')
</head>

<body style="height: 100vh; width: 100vw;">


<style>
    
    .image{
        background-image: url('../app-assets/img/sidebar-bg/15.webp');
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
    }
    .login{
        padding: 50px 150px;
        background-color: #ffffff;
    }
    .login .logo{
        display: flex;
        justify-content: center;
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
        letter-spacing: 1px;
        font-family: 'poppins';
        font-weight: 500;
        color: #1b721b;
        margin-top: 30px;
        padding: 0 50px 30px 50px;
    }
    input::placeholder{
        color: #319b31!important;
        font-family: 'poppins'; 
    }
    .form-control{
    height: 45px;
    box-sizing: border-box;
    border-radius: 25px!important;
    padding: 0 15px 0 55px!important;
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
</style>
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-md-6 d-none d-md-flex h-100 image p-0">
            <img src="" alt="">
            <h1>Hotel 360</h1>
        </div>
        <div class="col-md-6 col-12 h-100 login">
            <div class="header">
                <h6>
                    BIENVENU SUR
                </h6>
                <div class="logo">
                    <img src="" alt="">
                    <h1>
                        Hotel 360
                    </h1>
                </div>
                <p>
                    Entrez vos informations pour vous connecter à l'application
                </p>
            </div> 
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control border border-2" placeholder="Username">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-group mb-4">
                    <input type="password" class="form-control border border-2" placeholder="Password">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="input-group pt-4">
                    <button type="submit" class="form-control submit">connexion</button>
                </div>
                <div class="row pt-4">
                    <div class="col-sm-6 col-md-12 col-lg-6 col- d-flex">
                        <input type="checkbox" class="form-check" style="transform: translateY(-3px);">
                        <label for="" class="ms-2">se rappeler de moi</label>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6 col-">
                        <label for="" class="float-lg-end mb-0" style="transform: translateY(3px);">Mot de passe oublié?</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
<script src="../app-assets/vendors/js/core/popper.min.js"></script>
<script src="../app-assets/vendors/js/core/bootstrap.min.js"></script>
</body>
</html>
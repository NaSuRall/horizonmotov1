@extends('layouts.app')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<div class="logo">
    <img src="{{ asset('img/logo.png') }}" alt="">
</div>


<div class="container">
    <div class="video">
        <h1>Vidéo</h1>
    </div>
    <div class="menu">
        <div class="onglets">
            <a href="{{ route("site.accueil")}}" class="nav-btn">Accès au site</a>
            <a href="" class="nav-btn">Présentation</a>
            <a href="" class="nav-btn">Nos Equipements</a>
            <a href="" class="nav-btn">Nous Contacter</a>          
        </div>
    </div>
</div>

    <div class="footer">
       
        <div class="social">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <img src="{{ asset('img/logo.png') }}" alt="" class="logo-footer">
        </div>
         <div class="credits">
            <p>© 2025 Horizon Moto. All rights reserved.</p>
            
        </div>
    

@endsection

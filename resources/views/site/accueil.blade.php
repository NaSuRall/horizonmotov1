@extends('layouts.app')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
@endsection

@section('content')
    <div class="container">

        <!-- Navigation -->
        <nav>
            <div class="nav">
                <img src="{{ asset('img/logo.png')}}">
                <div class="onglets">
                    <a href="">Accueil</a>
                    <a href="">Présentation</a>
                    <a href="">Nos Equipements</a>
                    <a href="">Contact</a>
                </div>
                 <div class="phone">
                    <p>06 40 53 58 27</p>
                </div>
            </div>
            
        </nav>

        <!-- FIN Navigation -->

        <header>
            <div class="title-header">
                <h1>Horizon Moto</h1>
            </div>
        </header>


    </div>
@endsection

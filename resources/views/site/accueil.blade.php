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

        <!-- Header -->
        <header>
            <div class="title-header">
                <h1>Horizon Moto</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                <a href="#section">Voir les Equipements</a>
            </div>
        </header>

        <!-- FIN Header -->

        <!-- Section -->

        <section id="section">
        
            <div class="title-section">
                 <h2>Nos Equipement moto / Maxxess</h2>
            </div>
            <div class="fondu"></div>
            <div class="card-section">
                

                
                





                <div class="card">
                    <!-- Foreach card / Equipement bdd  juste les 5 premiers et un button voir plus pour voir tout les equipements en entier trier -->
                </div>

                <div class="card">
                    <!-- Foreach card / Equipement bdd  juste les 5 premiers et un button voir plus pour voir tout les equipements en entier trier -->
                </div>

                <div class="card">
                    <!-- Foreach card / Equipement bdd  juste les 5 premiers et un button voir plus pour voir tout les equipements en entier trier -->
                </div>
                <div class="card">
                    <!-- Foreach card / Equipement bdd  juste les 5 premiers et un button voir plus pour voir tout les equipements en entier trier -->
                </div>

                <a href="" class="seemore">Voir plus <i class="fa-solid fa-chevron-right"></i></a>

            </div>


        </section>



    </div>
@endsection

@extends('layouts.dashboard_layout')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="dashboard-header">
            <h1>Tableau de bord</h1>
        </div>

        <div class="dashboard-body">
            <div class="dashboard-cards-container">
                <div class="dashboard-row">
                    <div class="dashboard-card">
                        <h3>Nombre Utilisateurs</h3>
                        <p>{{ $count }} <i class="fa-solid fa-server"></i></p>
                    </div>
                    <div class="dashboard-card">
                        <h3>Statistique 2</h3>
                        
                    </div>
                    <div class="dashboard-card">
                        <h3>Statistique 3</h3>
                        
                    </div>
                </div>
                <div class="dashboard-row">
                    <div class="dashboard-card">
                        <h3>Nombre de marques </h3>
                        <p>{{ $marquesCount }} <i class="fa-solid fa-server"></i></p>
                        @foreach($marques as $marque)
                        <div class="marque-item">
                            <a href="{{ route('dashboard.marque', $marque->id) }}"> - {{ $marque->nom }}</a>
                        </div>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        

        <div class="dashboard-footer">
            
        </div>



    </div>    
@endsection

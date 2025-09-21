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
                        <h3>Statistique 1</h3>
                        <p>Valeur ou graphique</p>
                    </div>
                    <div class="dashboard-card">
                        <h3>Statistique 2</h3>
                        <p>Valeur ou graphique</p>
                    </div>
                    <div class="dashboard-card">
                        <h3>Statistique 3</h3>
                        <p>Valeur ou graphique</p>
                    </div>
                </div>
                <div class="dashboard-row">
                    <div class="dashboard-card">
                        <h3>Section Complète</h3>
                        <p>Contenu détaillé ou tableau</p>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="dashboard-footer">
            
        </div>



    </div>    
@endsection

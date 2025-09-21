@extends('layouts.dashboard_layout')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="users-table-container">
            <h2>Gestion des utilisateurs</h2>
            <table class="users-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Options</th>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>connecté</td>
                            <td class="options">
                                <button class="btn">Voir</button>
                                <button class="btn">Éditer</button>
                                <button class="btn">Supprimer</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection

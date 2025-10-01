@extends('layouts.dashboard_layout')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="users-table-container">
            <h2>Gestion des Marques</h2>
            <table class="users-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Options</th>
                    <tbody>
                        @foreach($marques as $marque)
                        <tr>
                            <td>{{ $marque->id }}</td>
                            <td>{{ $marque->nom }}</td>
                            <td>{{ $marque->description }}</td>
                            <td class="options">
                                <button class="btn">Voir</button>
                                <button class="btn">Éditer</button>
                                <form action="{{ route('marque.destroy', $marque->id) }}" method="POST" onsubmit="return confirm('Supprimer cette marque ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" type="submit">Supprimer</button>
                                </form>
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

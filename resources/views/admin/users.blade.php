@extends('layouts.dashboard_layout')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="users-table-container">
            <div class="header-section">
                <h2>Gestion des utilisateurs</h2>
                <button class="btn btn-add" onclick="openModal()">Add user <i class="fa-solid fa-plus"></i></button>
            </div>
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
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>connecté</td>
                            <td class="options">
                                <button class="btn">Voir</button>
                                <button class="btn">Éditer</button>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Supprimer cet utilisateur ?')">
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

        <!-- Modal pour ajouter un utilisateur -->
        <div id="userModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Ajouter un nouvel utilisateur</h3>
                    <span class="close" onclick="closeModal()">&times;</span>
                </div>
                <form id="userForm" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-cancel" onclick="closeModal()">Annuler</button>
                        <button type="submit" class="btn btn-submit">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


        <script>
        function openModal() {
            document.getElementById('userModal').style.display = 'block';
        }
        
        function closeModal() {
            document.getElementById('userModal').style.display = 'none';
            document.getElementById('userForm').reset();
        }
        
        // Fermer la modale en cliquant à l'extérieur
        window.onclick = function(event) {
            var modal = document.getElementById('userModal');
            if (event.target == modal) {
                closeModal();
            }
        }
        </script>

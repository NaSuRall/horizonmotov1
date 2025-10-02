@extends('layouts.dashboard_layout')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="users-table-container">
            <div class="header-section">
                <h2>Gestion des utilisateurs</h2>
                <button class="btn btn-add" onclick="openModal()">Ajouter un utilisateur <i class="fa-solid fa-plus"></i></button>
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
                                
                                <button class="btn" onclick="openEditModal({{ $user->id }}, '{{ $user->first_name }}', '{{ $user->last_name }}', '{{ $user->email }}')">Éditer</button>
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
                <form id="userForm" method="POST">
                    @csrf
                    <input type="hidden" id="methodField" name="_method" value="">
                    <input type="hidden" id="userId" name="user_id" value="">
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
                        <input type="password" id="password" name="password">
                        <small id="passwordHint" style="color: #aaa; display: none;">Laisser vide pour conserver le mot de passe actuel</small>
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
                        <button type="submit" class="btn btn-submit" id="submitBtn">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openModal() {
        // Mode création
        document.getElementById('userModal').style.display = 'block';
        document.querySelector('.modal-header h3').textContent = 'Ajouter un nouvel utilisateur';
        document.getElementById('submitBtn').textContent = 'Créer';
        document.getElementById('userForm').action = '{{ route("user.store") }}';
        document.getElementById('methodField').value = '';
        document.getElementById('userId').value = '';
        document.getElementById('password').required = true;
        document.getElementById('passwordHint').style.display = 'none';
        resetForm();
    }
    
    function openEditModal(id, firstName, lastName, email) {
        // Mode édition
        document.getElementById('userModal').style.display = 'block';
        document.querySelector('.modal-header h3').textContent = 'Modifier l\'utilisateur';
        document.getElementById('submitBtn').textContent = 'Modifier';
        document.getElementById('userForm').action = '{{ route("user.update", ":id") }}'.replace(':id', id);
        document.getElementById('methodField').value = 'PUT';
        document.getElementById('userId').value = id;
        document.getElementById('password').required = false;
        document.getElementById('passwordHint').style.display = 'block';
        
        // Pré-remplir les champs
        document.getElementById('nom').value = firstName;
        document.getElementById('prenom').value = lastName;
        document.getElementById('email').value = email;
        document.getElementById('status').value = 'actif';
        document.getElementById('password').value = '';
    }
    
    function closeModal() {
        document.getElementById('userModal').style.display = 'none';
        resetForm();
    }
    
    function resetForm() {
        document.getElementById('userForm').reset();
        document.getElementById('methodField').value = '';
        document.getElementById('userId').value = '';
    }
    
    // Fermer la modale en cliquant à l'extérieur
    window.onclick = function(event) {
        var modal = document.getElementById('userModal');
        if (event.target == modal) {
            closeModal();
        }
    }
    </script>

@endsection




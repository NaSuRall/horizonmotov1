@extends('layouts.dashboard_layout')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="users-table-container">
            <div class="header-section">
                <h2>Gestion des catégories</h2>
                <button class="btn btn-add" onclick="openModal()">Ajouter une catégorie <i class="fa-solid fa-plus"></i></button>
            </div>
            <table class="users-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Options</th>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="options">

                                <button class="btn" onclick="openEditModal({{ $category->id }}, '{{ $category->name }}')">Éditer</button>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')">
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
                    <h3>Ajouter une nouvelle catégorie</h3>
                    <span class="close" onclick="closeModal()">&times;</span>
                </div>
                <form id="userForm" action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="methodField" name="_method" value="">
                    <input type="hidden" id="userId" name="user_id" value="">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" id="name" name="name" required>
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
        document.querySelector('.modal-header h3').textContent = 'Ajouter une nouvelle catégorie';
        document.getElementById('submitBtn').textContent = 'Créer';
        document.getElementById('userForm').action = '{{ route("categories.store") }}';
        document.getElementById('methodField').value = '';
        document.getElementById('userId').value = '';
        resetForm();
    }

    function openEditModal(id, name) {
        // Mode édition
        document.getElementById('userModal').style.display = 'block';
        document.querySelector('.modal-header h3').textContent = 'Modifier la catégorie';
        document.getElementById('submitBtn').textContent = 'Modifier';
        document.getElementById('userForm').action = '{{ route("categories.update", ":id") }}'.replace(':id', id);
        document.getElementById('methodField').value = 'PUT';
        document.getElementById('userId').value = id;
        
        // Pré-remplir les champs
        document.getElementById('name').value = name;
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




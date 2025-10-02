@extends('layouts.dashboard_layout')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/users.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="users-table-container">
            <div class="header-section">
                <h2>Gestion des Produits</h2>
                <button class="btn btn-add" onclick="openModal()">Ajouter un Produit <i class="fa-solid fa-plus"></i></button>
            </div>
            <table class="users-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Reference</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Catégorie</th>
                        <th>Marque</th>
                        <th>Description</th>
                        <th>Options</th>
                    <tbody>
                        @foreach($produits as $produit)
                        <tr>
                            <td>{{ $produit->id }}</td>
                            <td>{{ $produit->name }}</td>
                            <td>{{ $produit->reference }}</td>
                            <td>{{ $produit->price }} €</td>
                            <td>
                                @if($produit->image)
                                    <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                @else
                                    <span style="color: #aaa;">Aucune image</span>
                                @endif
                            </td>
                            <td>{{ $produit->category->name }}</td>
                            <td>{{ $produit->marque->nom }}</td>
                            <td>{{ $produit->description }}</td>
                            <td class="options">

                                <button class="btn" onclick="openEditModal({{ $produit->id }}, '{{ $produit->name }}', '{{ $produit->description }}', '{{ $produit->reference }}', '{{ $produit->price }}', {{ $produit->category_id }}, {{ $produit->marque_id }})">Éditer</button>
                                <form action="{{ route('produit.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')">
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

                <div id="userModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Ajouter un Produit</h3>
                    <span class="close" onclick="closeModal()">&times;</span>
                </div>
                <form id="userForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="methodField" name="_method" value="">
                    <input type="hidden" id="produitId" name="produit_id" value="">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="reference">Reference:</label>
                        <input type="text" id="reference" name="reference" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" accept="image/*">
                        <small style="color: #aaa;">Formats acceptés: JPG, PNG, GIF</small>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Catégorie:</label>
                        <select id="category_id" name="category_id" required>
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="marque_id">Marque:</label>
                        <select id="marque_id" name="marque_id" required>
                            <option value="">Sélectionnez une marque</option>
                            @foreach($marques as $marque)
                                <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                            @endforeach
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
        document.querySelector('.modal-header h3').textContent = 'Ajouter un Produit';
        document.getElementById('submitBtn').textContent = 'Créer';
        document.getElementById('userForm').action = '{{ route("produit.store") }}';
        document.getElementById('methodField').value = '';
        document.getElementById('produitId').value = '';
        resetForm();
    }

    function openEditModal(id, name, description, reference, price, categoryId, marqueId) {
        // Mode édition
        document.getElementById('userModal').style.display = 'block';
        document.querySelector('.modal-header h3').textContent = 'Modifier le Produit';
        document.getElementById('submitBtn').textContent = 'Modifier';
        document.getElementById('userForm').action = '{{ route("produit.update", ":id") }}'.replace(':id', id);
        document.getElementById('methodField').value = 'PUT';
        document.getElementById('produitId').value = id;

        // Pré-remplir les champs
        document.getElementById('name').value = name;
        document.getElementById('description').value = description;
        document.getElementById('reference').value = reference;
        document.getElementById('price').value = price;
        document.getElementById('category_id').value = categoryId;
        document.getElementById('marque_id').value = marqueId;
    }
    
    function closeModal() {
        document.getElementById('userModal').style.display = 'none';
        resetForm();
    }
    
    function resetForm() {
        document.getElementById('userForm').reset();
        document.getElementById('methodField').value = '';
        document.getElementById('produitId').value = '';
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

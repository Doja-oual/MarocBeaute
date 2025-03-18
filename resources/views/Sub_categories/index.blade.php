@extends('layouts.dashboard')

@section('title', 'Gestion des Sous-Catégories')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <!-- Formulaire d'ajout -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter une sous-catégorie</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Sub_categories.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="category_id">Catégorie</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control" required>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Liste des sous-catégories -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Liste des sous-catégories</h3>
                        <div class="input-group mt-2">
                            <input type="text" id="search-filter" class="form-control" placeholder="Rechercher une sous-catégorie...">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Catégorie</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sub_categories as $sub_category)
                                        <tr class="sub-category-row">
                                            <td>
                                                <img src="{{ asset('images/' . $sub_category->image) }}" alt="{{ $sub_category->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                                            </td>
                                            <td>{{ $sub_category->name }}</td>
                                            <td>{{ $sub_category->category->name }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewModal{{ $sub_category->id }}">
                                                        <i class="fas fa-eye"></i> Voir
                                                    </button>
                                                    <a href="{{ route('Sub_categories.edit', $sub_category->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit"></i> Éditer
                                                    </a>
                                                    <form action="{{ route('Sub_categories.destroy', $sub_category->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette sous-catégorie?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Aucune sous-catégorie disponible</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals pour visualiser les détails -->
    @foreach($sub_categories as $sub_category)
        <div class="modal fade" id="viewModal{{ $sub_category->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $sub_category->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel{{ $sub_category->id }}">{{ $sub_category->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <img src="{{ asset('images/' . $sub_category->image) }}" alt="{{ $sub_category->name }}" style="max-width: 100%; max-height: 300px;">
                        </div>
                        <p><strong>Catégorie:</strong> {{ $sub_category->category->name }}</p>
            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <a href="{{ route('Sub_categories.edit', $sub_category->id) }}" class="btn btn-primary">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Filtrage par recherche
            const searchFilter = document.getElementById('search-filter');
            const rows = document.querySelectorAll('.sub-category-row');
            
            searchFilter.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                rows.forEach(row => {
                    const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const category = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    
                    if (name.includes(searchTerm) || category.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
@extends('layouts.dashboard')

@section('title', 'Gestion des Catégories')

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

    <div class="action-buttons">
        <button class="btn btn-primary" id="add-item-btn">
            <i>➕</i> Ajouter une catégorie
        </button>
    </div>

    <div class="filter-bar">
        <div class="filter-group" style="flex-grow: 1;">
            <label for="search-filter">Recherche:</label>
            <input type="text" id="search-filter" class="filter-input" placeholder="Nom de la catégorie...">
        </div>
    </div>

    <div class="products-grid">
        @foreach ($categories as $category)
            <div class="product-card">
                <div class="product-content">
                    <h3 class="product-name">{{ $category->name }}</h3>
                    <p class="product-description">
                        {{ $category->description ?? 'Aucune description disponible.' }}
                    </p>
                    <div class="product-actions">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Ajout de Catégorie -->
    <div class="modal-backdrop" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <h3 id="modal-title">Ajouter une catégorie</h3>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="category-form" method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="category-name">Nom</label>
                        <input type="text" id="category-name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category-description">Description</label>
                        <textarea id="category-description" name="description" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-close">Annuler</button>
                <button class="btn btn-primary" onclick="submitForm()">Enregistrer</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addItemBtn = document.getElementById('add-item-btn');
            const modalBackdrop = document.querySelector('.modal-backdrop');
            const modalCloseButtons = document.querySelectorAll('.modal-close');
            const form = document.getElementById('category-form');
            const modalTitle = document.getElementById('modal-title');

            function openModal() {
                modalBackdrop.style.display = 'flex';
            }

            function closeModal() {
                modalBackdrop.style.display = 'none';
                form.reset();
            }

            addItemBtn.addEventListener('click', openModal);
            modalCloseButtons.forEach(button => button.addEventListener('click', closeModal));

            window.submitForm = function () {
                form.submit();
            }
            
            // Filtrage par recherche
            const searchFilter = document.getElementById('search-filter');
            const productCards = document.querySelectorAll('.product-card');
            
            searchFilter.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                productCards.forEach(card => {
                    const productName = card.querySelector('.product-name').textContent.toLowerCase();
                    if (productName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
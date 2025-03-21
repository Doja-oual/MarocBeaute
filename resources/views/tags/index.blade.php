@extends('layouts.dashboard')

@section('title', 'Gestion des Tags')

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
            <i>➕</i> Ajouter un tag
        </button>
    </div>

    <div class="filter-bar">
        <div class="filter-group" style="flex-grow: 1;">
            <label for="search-filter">Recherche:</label>
            <input type="text" id="search-filter" class="filter-input" placeholder="Nom du tag...">
        </div>
    </div>

    <div class="products-grid">
        @foreach ($tags as $tag)
            <div class="product-card">
                <div class="product-content">
                    <h3 class="product-name">{{ $tag->nom }}</h3>
                    <div class="product-actions">
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce tag ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Ajout de Tag -->
    <div class="modal-backdrop" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <h3 id="modal-title">Ajouter un tag</h3>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="tag-form" method="POST" action="{{ route('tags.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="tag-name">Nom</label>
                        <input type="text" id="tag-name" name="nom" class="form-control" required>
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
            const form = document.getElementById('tag-form');
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

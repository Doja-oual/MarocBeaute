@extends('layouts.dashboard')

@section('title', 'Gestion des Produits')

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

    @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

    <div class="action-buttons">
        <a href="{{ route('produits.create') }}" class="btn btn-primary" id="add-item-btn">
            <i>➕</i> Ajouter un produit
        </a>
    </div>

    <div class="filter-bar">
        <div class="filter-group" style="flex-grow: 1;">
            <label for="search-filter">Recherche:</label>
            <input type="text" id="search-filter" class="filter-input" placeholder="Titre du produit...">
        </div>
        <div class="filter-group">
            <label for="category-filter">Catégorie:</label>
           
        </div>
        <div class="filter-group">
            <label for="stock-filter">Stock:</label>
            <select id="stock-filter" class="filter-input">
                <option value="">Tous</option>
                <option value="1">En stock</option>
                <option value="0">Rupture de stock</option>
            </select>
        </div>
    </div>

    <div class="products-grid">
        @forelse($products as $product)
            <div class="product-card" data-category="{{ $product->id_sub_catg }}" data-stock="{{ $product->in_stock ? '1' : '0' }}">
                <div class="product-image">
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->title }}">
                </div>
                <div class="product-content">
                    <h3 class="product-name">{{ $product->title }}</h3>
                    <p class="product-reference">REF: {{ $product->reference }}</p>
                    <div class="product-pricing">
                        @if($product->discounted_price)
                            <span class="product-original-price">{{ number_format($product->price, 2) }} €</span>
                            <span class="product-discounted-price">{{ number_format($product->discounted_price, 2) }} €</span>
                        @else
                            <span class="product-price">{{ number_format($product->price, 2) }} €</span>
                        @endif
                    </div>
                    <p class="product-description">
                        {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                    </p>
                    <p class="product-stock {{ $product->in_stock ? 'in-stock' : 'out-of-stock' }}">
                        {{ $product->in_stock ? 'En stock' : 'Rupture de stock' }} ({{ $product->qte }} unités)
                    </p>
                    <div class="product-actions">
                        <a href="{{ route('produits.edit', $product->id) }}" class="btn btn-primary">
                            Modifier
                        </a>
                        <form action="{{ route('produits.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <p>Aucun produit disponible.</p>
            </div>
        @endforelse
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Filtrage par recherche
            const searchFilter = document.getElementById('search-filter');
            const categoryFilter = document.getElementById('category-filter');
            const stockFilter = document.getElementById('stock-filter');
            const productCards = document.querySelectorAll('.product-card');
            
            function filterProducts() {
                const searchTerm = searchFilter.value.toLowerCase();
                const categoryValue = categoryFilter.value;
                const stockValue = stockFilter.value;
                
                productCards.forEach(card => {
                    const productName = card.querySelector('.product-name').textContent.toLowerCase();
                    const productDesc = card.querySelector('.product-description').textContent.toLowerCase();
                    const productRef = card.querySelector('.product-reference').textContent.toLowerCase();
                    
                    const matchesSearch = productName.includes(searchTerm) || 
                                         productDesc.includes(searchTerm) ||
                                         productRef.includes(searchTerm);
                                         
                    const matchesCategory = categoryValue === '' || card.dataset.category === categoryValue;
                    const matchesStock = stockValue === '' || card.dataset.stock === stockValue;
                    
                    if (matchesSearch && matchesCategory && matchesStock) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
            
            searchFilter.addEventListener('input', filterProducts);
            categoryFilter.addEventListener('change', filterProducts);
            stockFilter.addEventListener('change', filterProducts);
        });
    </script>
@endsection
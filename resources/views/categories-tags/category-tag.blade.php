@extends('layouts.dashboard')

@section('title', 'Gestion des Catégories et Tags')

@section('content')
    

    <div class="action-buttons">
        <button class="btn btn-primary" id="add-item-btn">
            <i>➕</i> Ajouter une catégorie/tag
        </button>
        <button class="btn btn-secondary">
            <i>⬇️</i> Exporter
        </button>
        <button class="btn btn-secondary">
            <i>⬆️</i> Importer
        </button>
    </div>

    <div class="filter-bar">
        <div class="filter-group">
            <label for="type-filter">Type:</label>
            <select id="type-filter" class="filter-input">
                <option value="">Tous</option>
                <option value="category">Catégorie</option>
                <option value="tag">Tag</option>
            </select>
        </div>

        <div class="filter-group" style="flex-grow: 1;">
            <label for="search-filter">Recherche:</label>
            <input type="text" id="search-filter" class="filter-input" style="width: 100%;" placeholder="Nom de la catégorie ou du tag...">
        </div>
    </div>

    <div class="products-grid">
        <!-- Catégorie 1 -->
        <div class="product-card">
            <div class="product-content">
                <h3 class="product-name">Traditionnel</h3>
                <div class="product-details">
                    <div class="product-price">Catégorie</div>
                </div>
                <p class="product-description">
                    Catégorie regroupant les produits traditionnels marocains, fabriqués selon des méthodes ancestrales.
                </p>
                <div class="product-actions">
                    <div class="action-btn edit-btn">Modifier</div>
                    <div class="action-btn delete-btn">Supprimer</div>
                </div>
            </div>
        </div>

        <!-- Tag 1 -->
        <div class="product-card">
            <div class="product-content">
                <h3 class="product-name">Bio</h3>
                <div class="product-details">
                    <div class="product-price">Tag</div>
                </div>
                <p class="product-description">
                    Tag pour les produits certifiés biologiques, sans additifs chimiques.
                </p>
                <div class="product-actions">
                    <div class="action-btn edit-btn">Modifier</div>
                    <div class="action-btn delete-btn">Supprimer</div>
                </div>
            </div>
        </div>

        <!-- Catégorie 2 -->
        <div class="product-card">
            <div class="product-content">
                <h3 class="product-name">Moderne</h3>
                <div class="product-details">
                    <div class="product-price">Catégorie</div>
                </div>
                <p class="product-description">
                    Catégorie pour les produits cosmétiques modernes, utilisant des technologies avancées.
                </p>
                <div class="product-actions">
                    <div class="action-btn edit-btn">Modifier</div>
                    <div class="action-btn delete-btn">Supprimer</div>
                </div>
            </div>
        </div>

        <!-- Tag 2 -->
        <div class="product-card">
            <div class="product-content">
                <h3 class="product-name">Anti-âge</h3>
                <div class="product-details">
                    <div class="product-price">Tag</div>
                </div>
                <p class="product-description">
                    Tag pour les produits conçus pour réduire les signes du vieillissement.
                </p>
                <div class="product-actions">
                    <div class="action-btn edit-btn">Modifier</div>
                    <div class="action-btn delete-btn">Supprimer</div>
                </div>
            </div>
        </div>

        <!-- Catégorie 3 -->
        <div class="product-card">
            <div class="product-content">
                <h3 class="product-name">Kit</h3>
                <div class="product-details">
                    <div class="product-price">Catégorie</div>
                </div>
                <p class="product-description">
                    Catégorie pour les kits regroupant plusieurs produits pour des soins complets.
                </p>
                <div class="product-actions">
                    <div class="action-btn edit-btn">Modifier</div>
                    <div class="action-btn delete-btn">Supprimer</div>
                </div>
            </div>
        </div>

        <!-- Tag 3 -->
        <div class="product-card">
            <div class="product-content">
                <h3 class="product-name">Hydratant</h3>
                <div class="product-details">
                    <div class="product-price">Tag</div>
                </div>
                <p class="product-description">
                    Tag pour les produits ayant des propriétés hydratantes pour la peau.
                </p>
                <div class="product-actions">
                    <div class="action-btn edit-btn">Modifier</div>
                    <div class="action-btn delete-btn">Supprimer</div>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination">
        <div class="page-item active">1</div>
        <div class="page-item">2</div>
        <div class="page-item">3</div>
        <div class="page-item">4</div>
        <div class="page-item">...</div>
        <div class="page-item">10</div>
    </div>

    <!-- Modal Ajout/Modification Catégorie ou Tag -->
    <div class="modal-backdrop" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <h3>Ajouter une catégorie/tag</h3>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="category-tag-form">
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="item-name">Nom</label>
                                <input type="text" id="item-name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="item-type">Type</label>
                                <select id="item-type" class="form-control" required>
                                    <option value="">Sélectionner</option>
                                    <option value="category">Catégorie</option>
                                    <option value="tag">Tag</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="item-description">Description</label>
                        <textarea id="item-description" class="form-control" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-close">Annuler</button>
                <button class="btn btn-primary" type="submit" form="category-tag-form">Enregistrer</button>
            </div>
        </div>
    </div>

    <script>
        // Script to show/hide modal (same as the Products page)
        document.addEventListener('DOMContentLoaded', function() {
            const addItemBtn = document.getElementById('add-item-btn');
            const modalBackdrop = document.querySelector('.modal-backdrop');
            const modalCloseButtons = document.querySelectorAll('.modal-close');

            addItemBtn.addEventListener('click', function() {
                modalBackdrop.style.display = 'flex';
            });

            modalCloseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    modalBackdrop.style.display = 'none';
                });
            });

            // Close modal when clicking outside
            modalBackdrop.addEventListener('click', function(e) {
                if (e.target === modalBackdrop) {
                    modalBackdrop.style.display = 'none';
                }
            });

            // Stop propagation for clicks inside the modal
            const modal = document.querySelector('.modal');
            modal.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
@endsection
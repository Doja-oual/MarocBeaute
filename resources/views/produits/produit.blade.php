@extends('layouts.dashboard')

@section('title', 'Gestion des Produits')

@section('content')
            
            <div class="action-buttons">
                <button class="btn btn-primary" id="add-product-btn">
                    <i>➕</i> Ajouter un produit
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
                    <label for="category-filter">Catégorie:</label>
                    <select id="category-filter" class="filter-input">
                        <option value="">Toutes</option>
                        <option value="traditional">Traditionnels</option>
                        <option value="modern">Modernes</option>
                        <option value="kit">Kits</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="artisan-filter">Artisan:</label>
                    <select id="artisan-filter" class="filter-input">
                        <option value="">Tous</option>
                        <option value="1">Coopérative Atlas</option>
                        <option value="2">Artisans du Sud</option>
                        <option value="3">Maison de l'Argan</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="stock-filter">Stock:</label>
                    <select id="stock-filter" class="filter-input">
                        <option value="">Tous</option>
                        <option value="in-stock">En stock</option>
                        <option value="low-stock">Stock faible</option>
                        <option value="out-of-stock">Rupture</option>
                    </select>
                </div>
                
                <div class="filter-group" style="flex-grow: 1;">
                    <label for="search-filter">Recherche:</label>
                    <input type="text" id="search-filter" class="filter-input" style="width: 100%;" placeholder="Nom du produit, référence...">
                </div>
            </div>
            
            <div class="products-grid">
                <!-- Produit 1 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/300/200" alt="Savon Argan">
                        <div class="product-badges">
                            <span class="badge badge-traditional">Traditionnel</span>
                        </div>
                        <div class="product-stock">En stock (45)</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-name">Savon à l'Argan Traditionnel</h3>
                        <div class="product-details">
                            <div class="product-price">120 DH</div>
                            <div class="product-artisan">Coopérative Atlas</div>
                        </div>
                        <p class="product-description">
                            Savon traditionnel à base d'huile d'argan, fabriqué selon les méthodes ancestrales marocaines. Nourrit et hydrate la peau.
                        </p>
                        <div class="product-actions">
                            <div class="action-btn edit-btn">Modifier</div>
                            <div class="action-btn delete-btn">Supprimer</div>
                        </div>
                    </div>
                </div>
                
                <!-- Produit 2 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/300/200" alt="Huile Essentielle Rose">
                        <div class="product-badges">
                            <span class="badge badge-modern">Moderne</span>
                        </div>
                        <div class="product-stock">Stock faible (5)</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-name">Huile Essentielle de Rose de Damas</h3>
                        <div class="product-details">
                            <div class="product-price">280 DH</div>
                            <div class="product-artisan">Valley Rose</div>
                        </div>
                        <p class="product-description">
                            Huile essentielle de rose de Damas pure, extraite par distillation à la vapeur. Parfaite pour les soins anti-âge et l'aromathérapie.
                        </p>
                        <div class="product-actions">
                            <div class="action-btn edit-btn">Modifier</div>
                            <div class="action-btn delete-btn">Supprimer</div>
                        </div>
                    </div>
                </div>
                
                <!-- Produit 3 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/300/200" alt="Kit Hammam">
                        <div class="product-badges">
                            <span class="badge badge-kit">Kit</span>
                        </div>
                        <div class="product-stock">En stock (32)</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-name">Kit Hammam Complet</h3>
                        <div class="product-details">
                            <div class="product-price">450 DH</div>
                            <div class="product-artisan">Maison de l'Argan</div>
                        </div>
                        <p class="product-description">
                            Kit hammam complet comprenant savon noir, gant kessa, rhassoul, huile d'argan et pierre d'alun pour une expérience hammam authentique.
                        </p>
                        <div class="product-actions">
                            <div class="action-btn edit-btn">Modifier</div>
                            <div class="action-btn delete-btn">Supprimer</div>
                        </div>
                    </div>
                </div>
                
                <!-- Produit 4 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/300/200" alt="Eau Florale">
                        <div class="product-badges">
                            <span class="badge badge-traditional">Traditionnel</span>
                            <span class="badge badge-modern">Moderne</span>
                        </div>
                        <div class="product-stock">Rupture de stock</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-name">Eau Florale d'Oranger</h3>
                        <div class="product-details">
                            <div class="product-price">95 DH</div>
                            <div class="product-artisan">Artisans du Sud</div>
                        </div>
                        <p class="product-description">
                            Eau florale pure d'oranger, tonifiante et apaisante pour tous types de peau. Obtenue par distillation à la vapeur des fleurs fraîches.
                        </p>
                        <div class="product-actions">
                            <div class="action-btn edit-btn">Modifier</div>
                            <div class="action-btn delete-btn">Supprimer</div>
                        </div>
                    </div>
                </div>
                
                <!-- Produit 5 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/300/200" alt="Beurre de Karité">
                        <div class="product-badges">
                            <span class="badge badge-traditional">Traditionnel</span>
                        </div>
                        <div class="product-stock">En stock (27)</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-name">Beurre de Karité Pur</h3>
                        <div class="product-details">
                            <div class="product-price">150 DH</div>
                            <div class="product-artisan">Coopérative Atlas</div>
                        </div>
                        <p class="product-description">
                            Beurre de karité 100% naturel, non raffiné et sans additifs. Riche en vitamines A, E et F pour nourrir intensément la peau et les cheveux.
                        </p>
                        <div class="product-actions">
                            <div class="action-btn edit-btn">Modifier</div>
                            <div class="action-btn delete-btn">Supprimer</div>
                        </div>
                    </div>
                </div>
                
                <!-- Produit 6 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="/api/placeholder/300/200" alt="Sérum Visage">
                        <div class="product-badges">
                            <span class="badge badge-modern">Moderne</span>
                        </div>
                        <div class="product-stock">En stock (18)</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-name">Sérum Anti-âge à l'Huile de Figue de Barbarie</h3>
                        <div class="product-details">
                            <div class="product-price">380 DH</div>
                            <div class="product-artisan">Modern Maroc</div>
                        </div>
                        <p class="product-description">
                            Sérum visage concentré à l'huile de figue de barbarie, riche en antioxydants et acides gras essentiels pour lutter contre les signes du vieillissement.
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
            
            <!-- Modal Ajout/Modification Produit -->
            <div class="modal-backdrop" style="display: none;">
                <div class="modal">
                    <div class="modal-header">
                        <h3>Ajouter un produit</h3>
                        <button class="modal-close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="product-form">
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="product-name">Nom du produit</label>
                                        <input type="text" id="product-name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="product-ref">Référence</label>
                                        <input type="text" id="product-ref" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="product-category">Catégorie</label>
                                        <select id="product-category" class="form-control" required>
                                            <option value="">Sélectionner</option>
                                            <option value="traditional">Traditionnel</option>
                                            <option value="modern">Moderne</option>
                                            <option value="kit">Kit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="product-artisan">Artisan/Fabricant</label>
                                        <select id="product-artisan" class="form-control" required>
                                            <option value="">Sélectionner</option>
                                            <option value="1">Coopérative Atlas</option>
                                            <option value="2">Artisans du Sud</option>
                                            <option value="3">Maison de l'Argan</option>
                                            <option value="4">Valley Rose</option>
                                            <option value="5">Modern Maroc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="product-price">Prix (DH)</label>
                                        <input type="number" id="product-price" class="form-control" min="0" step="0.01" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="product-stock">Stock</label>
                                        <input type="number" id="product-stock" class="form-control" min="0" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="product-description">Description</label>
                                <textarea id="product-description" class="form-control" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="product-ingredients">Ingrédients</label>
                                <textarea id="product-ingredients" class="form-control"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="product-usage">Mode d'utilisation</label>
                                <textarea id="product-usage" class="form-control"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="product-image">Images</label>
                                <input type="file" id="product-image" class="form-control" multiple>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary modal-close">Annuler</button>
                        <button class="btn btn-primary" type="submit" form="product-form">Enregistrer</button>
                    </div>
                </div>
            </div>

            <script>
        // Simple script to show/hide modal
        document.addEventListener('DOMContentLoaded', function() {
            const addProductBtn = document.getElementById('add-product-btn');
            const modalBackdrop = document.querySelector('.modal-backdrop');
            const modalCloseButtons = document.querySelectorAll('.modal-close');
            
            addProductBtn.addEventListener('click', function() {
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
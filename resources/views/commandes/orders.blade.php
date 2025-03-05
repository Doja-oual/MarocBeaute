@extends('layouts.dashboard')

@section('title', 'Tableau de bord')

@section('content')
            <div class="header">
                <h2>Gestion des Commandes</h2>
                <div class="user-info">
                    <img src="/api/placeholder/40/40" alt="Admin"/>
                    <span>Admin</span>
                </div>
            </div>
            
            <div class="order-summary">
                <div class="summary-card">
                    <div class="summary-icon">📊</div>
                    <div class="summary-value">124</div>
                    <div class="summary-title">Commandes ce mois</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">⏱️</div>
                    <div class="summary-value">18</div>
                    <div class="summary-title">En attente</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">🚚</div>
                    <div class="summary-value">32</div>
                    <div class="summary-title">En cours d'expédition</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">💰</div>
                    <div class="summary-value">68,450 DH</div>
                    <div class="summary-title">Chiffre d'affaires</div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="btn btn-primary" id="add-order-btn">
                    <i>➕</i> Nouvelle commande
                </button>
                <button class="btn btn-secondary">
                    <i>⬇️</i> Exporter
                </button>
                <button class="btn btn-secondary">
                    <i>🖨️</i> Imprimer factures
                </button>
            </div>
            
            <div class="filter-bar">
                <div class="filter-group">
                    <label for="status-filter">Statut:</label>
                    <select id="status-filter" class="filter-input">
                        <option value="">Tous</option>
                        <option value="pending">En attente</option>
                        <option value="processing">En traitement</option>
                        <option value="shipped">Expédiée</option>
                        <option value="delivered">Livrée</option>
                        <option value="cancelled">Annulée</option>
                        <option value="refunded">Remboursée</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="date-filter">Période:</label>
                    <select id="date-filter" class="filter-input">
                        <option value="today">Aujourd'hui</option>
                        <option value="this-week">Cette semaine</option>
                        <option value="this-month" selected>Ce mois</option>
                        <option value="last-month">Mois dernier</option>
                        <option value="custom">Personnalisé</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="payment-filter">Paiement:</label>
                    <select id="payment-filter" class="filter-input">
                        <option value="">Tous</option>
                        <option value="card">Carte bancaire</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank-transfer">Virement</option>
                        <option value="cash">Espèces</option>
                    </select>
                </div>
                
                <div class="filter-group" style="flex-grow: 1;">
                    <label for="search-filter">Recherche:</label>
                    <input type="text" id="search-filter" class="filter-input" style="width: 100%;" placeholder="N° commande, client, téléphone...">
                </div>
            </div>
            
            <div class="orders-table">
                <table>
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Paiement</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Commande 1 -->
                        <tr>
                            <td class="order-id">CMD-7842</td>
                            <td class="order-date">01/03/2025 - 14:35</td>
                            <td>Amina Benali</td>
                            <td>650 DH</td>
                            <td><span class="status-badge status-pending">En attente</span></td>
                            <td>Carte bancaire</td>
                            <td>
                                <span class="action-icon view-order" data-id="7842">👁️</span>
                                <span class="action-icon edit-order" data-id="7842">✏️</span>
                                <span class="action-icon delete-order" data-id="7842">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 2 -->
                        <tr>
                            <td class="order-id">CMD-7841</td>
                            <td class="order-date">01/03/2025 - 11:22</td>
                            <td>Karim Ouazzani</td>
                            <td>1,750 DH</td>
                            <td><span class="status-badge status-processing">En traitement</span></td>
                            <td>PayPal</td>
                            <td>
                                <span class="action-icon view-order" data-id="7841">👁️</span>
                                <span class="action-icon edit-order" data-id="7841">✏️</span>
                                <span class="action-icon delete-order" data-id="7841">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 3 -->
                        <tr>
                            <td class="order-id">CMD-7840</td>
                            <td class="order-date">28/02/2025 - 18:45</td>
                            <td>Sarah Kadiri</td>
                            <td>450 DH</td>
                            <td><span class="status-badge status-shipped">Expédiée</span></td>
                            <td>Carte bancaire</td>
                            <td>
                                <span class="action-icon view-order" data-id="7840">👁️</span>
                                <span class="action-icon edit-order" data-id="7840">✏️</span>
                                <span class="action-icon delete-order" data-id="7840">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 4 -->
                        <tr>
                            <td class="order-id">CMD-7839</td>
                            <td class="order-date">28/02/2025 - 16:10</td>
                            <td>Youssef Alami</td>
                            <td>890 DH</td>
                            <td><span class="status-badge status-delivered">Livrée</span></td>
                            <td>Espèces</td>
                            <td>
                                <span class="action-icon view-order" data-id="7839">👁️</span>
                                <span class="action-icon edit-order" data-id="7839">✏️</span>
                                <span class="action-icon delete-order" data-id="7839">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 5 -->
                        <tr>
                            <td class="order-id">CMD-7838</td>
                            <td class="order-date">28/02/2025 - 10:35</td>
                            <td>Fatima Zahra Mansouri</td>
                            <td>1,250 DH</td>
                            <td><span class="status-badge status-delivered">Livrée</span></td>
                            <td>Carte bancaire</td>
                            <td>
                                <span class="action-icon view-order" data-id="7838">👁️</span>
                                <span class="action-icon edit-order" data-id="7838">✏️</span>
                                <span class="action-icon delete-order" data-id="7838">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 6 -->
                        <tr>
                            <td class="order-id">CMD-7837</td>
                            <td class="order-date">27/02/2025 - 22:15</td>
                            <td>Mohamed El Fassi</td>
                            <td>780 DH</td>
                            <td><span class="status-badge status-cancelled">Annulée</span></td>
                            <td>-</td>
                            <td>
                                <span class="action-icon view-order" data-id="7837">👁️</span>
                                <span class="action-icon edit-order" data-id="7837">✏️</span>
                                <span class="action-icon delete-order" data-id="7837">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 7 -->
                        <tr>
                            <td class="order-id">CMD-7836</td>
                            <td class="order-date">27/02/2025 - 15:40</td>
                            <td>Nadia Benjelloun</td>
                            <td>480 DH</td>
                            <td><span class="status-badge status-refunded">Remboursée</span></td>
                            <td>PayPal</td>
                            <td>
                                <span class="action-icon view-order" data-id="7836">👁️</span>
                                <span class="action-icon edit-order" data-id="7836">✏️</span>
                                <span class="action-icon delete-order" data-id="7836">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 8 -->
                        <tr>
                            <td class="order-id">CMD-7835</td>
                            <td class="order-date">27/02/2025 - 11:20</td>
                            <td>Hassan Berrada</td>
                            <td>920 DH</td>
                            <td><span class="status-badge status-shipped">Expédiée</span></td>
                            <td>Virement</td>
                            <td>
                                <span class="action-icon view-order" data-id="7835">👁️</span>
                                <span class="action-icon edit-order" data-id="7835">✏️</span>
                                <span class="action-icon delete-order" data-id="7835">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 9 -->
                        <tr>
                            <td class="order-id">CMD-7834</td>
                            <td class="order-date">26/02/2025 - 19:05</td>
                            <td>Leila Tazi</td>
                            <td>1,450 DH</td>
                            <td><span class="status-badge status-delivered">Livrée</span></td>
                            <td>Carte bancaire</td>
                            <td>
                                <span class="action-icon view-order" data-id="7834">👁️</span>
                                <span class="action-icon edit-order" data-id="7834">✏️</span>
                                <span class="action-icon delete-order" data-id="7834">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Commande 10 -->
                        <tr>
                            <td class="order-id">CMD-7833</td>
                            <td class="order-date">26/02/2025 - 14:30</td>
                            <td>Omar Bouazza</td>
                            <td>560 DH</td>
                            <td><span class="status-badge status-delivered">Livrée</span></td>
                            <td>Espèces</td>
                            <td>
                                <span class="action-icon view-order" data-id="7833">👁️</span>
                                <span class="action-icon edit-order" data-id="7833">✏️</span>
                                <span class="action-icon delete-order" data-id="7833">🗑️</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="pagination">
                <div class="page-item active">1</div>
                <div class="page-item">2</div>
                <div class="page-item">3</div>
                <div class="page-item">4</div>
                <div class="page-item">...</div>
                <div class="page-item">12</div>
            </div>
            
            <!-- Modal Détail Commande -->
            <div class="modal-backdrop" style="display: none;">
                <div class="modal">
                    <div class="modal-header">
                        <h3>Détails de la commande #CMD-7842</h3>
                        <button class="modal-close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="order-details">
                            <div class="order-col">
                                <div class="detail-group">
                                    <div class="detail-label">Client</div>
                                    <div class="detail-value">Amina Benali</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Email</div>
                                    <div class="detail-value">amina.benali@email.com</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Téléphone</div>
                                    <div class="detail-value">+212 6 12 34 56 78</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Date de commande</div>
                                    <div class="detail-value">01/03/2025 - 14:35</div>
                                </div>
                            </div>
                            <div class="order-col">
                                <div class="detail-group">
                                    <div class="detail-label">Adresse de livraison</div>
                                    <div class="detail-value">
                                        Résidence Al Firdaous, Apt 5, Étage 2<br>
                                        Avenue Hassan II<br>
                                        Casablanca, 20250<br>
                                        Maroc
                                    </div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Mode de livraison</div>
                                    <div class="detail-value">Standard (3-5 jours)</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Mode de paiement</div>
                                    <div class="detail-value">Carte bancaire</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="order-products">
                            <h4>Produits commandés</h4>
                            <div class="product-list">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img src="/api/placeholder/80/80" alt="Savon Argan">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-name">Savon à l'Argan Traditionnel</div>
                                        <div class="product-meta">
                                            <div>Quantité: <strong>2</strong></div>
                                            <div class="product-price">240 DH</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="product-item">
                                    <div class="product-img">
                                        <img src="/api/placeholder/80/80" alt="Beurre de Karité">
                                    </div>
                                    <div class="product-info">
                                    @endsection
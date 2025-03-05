 
 @extends('layouts.dashboard')

@section('title', 'Tableau de bord')

@section('content')
            <div class="header">
                <h2>Gestion des Clients</h2>
                <div class="user-info">
                    <img src="/api/placeholder/40/40" alt="Admin"/>
                    <span>Admin</span>
                </div>
            </div>
            
            <div class="clients-summary">
                <div class="summary-card">
                    <div class="summary-icon">👥</div>
                    <div class="summary-value">3,425</div>
                    <div class="summary-title">Clients total</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">🌟</div>
                    <div class="summary-value">246</div>
                    <div class="summary-title">Clients VIP</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">🆕</div>
                    <div class="summary-value">78</div>
                    <div class="summary-title">Nouveaux ce mois</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">💸</div>
                    <div class="summary-value">580 DH</div>
                    <div class="summary-title">Panier moyen</div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="btn btn-primary" id="add-client-btn">
                    <i>➕</i> Nouveau client
                </button>
                <button class="btn btn-secondary">
                    <i>⬇️</i> Exporter
                </button>
                <button class="btn btn-secondary">
                    <i>📧</i> Envoyer newsletter
                </button>
            </div>
            
            <div class="filter-bar">
                <div class="filter-group">
                    <label for="status-filter">Statut:</label>
                    <select id="status-filter" class="filter-input">
                        <option value="">Tous</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                        <option value="vip">VIP</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="date-filter">Inscription:</label>
                    <select id="date-filter" class="filter-input">
                        <option value="this-month">Ce mois</option>
                        <option value="last-month">Mois dernier</option>
                        <option value="this-year" selected>Cette année</option>
                        <option value="all-time">Tout</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="city-filter">Ville:</label>
                    <select id="city-filter" class="filter-input">
                        <option value="">Toutes</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="agadir">Agadir</option>
                        <option value="fes">Fès</option>
                        <option value="tanger">Tanger</option>
                    </select>
                </div>
                
                <div class="filter-group" style="flex-grow: 1;">
                    <label for="search-filter">Recherche:</label>
                    <input type="text" id="search-filter" class="filter-input" style="width: 100%;" placeholder="Nom, email, téléphone...">
                </div>
            </div>
            
            <div class="clients-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID Client</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Ville</th>
                            <th>Date d'inscription</th>
                            <th>Commandes</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Client 1 -->
                        <tr>
                            <td class="client-id">CLI-2486</td>
                            <td>Amina Benali</td>
                            <td>amina.benali@email.com</td>
                            <td>+212 6 12 34 56 78</td>
                            <td>Casablanca</td>
                            <td class="client-date">15/11/2023</td>
                            <td>8</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2486">👁️</span>
                                <span class="action-icon edit-client" data-id="2486">✏️</span>
                                <span class="action-icon delete-client" data-id="2486">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 2 -->
                        <tr>
                            <td class="client-id">CLI-2485</td>
                            <td>Karim Ouazzani</td>
                            <td>karim.ouazzani@email.com</td>
                            <td>+212 6 23 45 67 89</td>
                            <td>Rabat</td>
                            <td class="client-date">22/12/2023</td>
                            <td>12</td>
                            <td><span class="status-badge status-vip">VIP</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2485">👁️</span>
                                <span class="action-icon edit-client" data-id="2485">✏️</span>
                                <span class="action-icon delete-client" data-id="2485">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 3 -->
                        <tr>
                            <td class="client-id">CLI-2484</td>
                            <td>Sarah Kadiri</td>
                            <td>sarah.kadiri@email.com</td>
                            <td>+212 6 34 56 78 90</td>
                            <td>Marrakech</td>
                            <td class="client-date">10/01/2024</td>
                            <td>5</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2484">👁️</span>
                                <span class="action-icon edit-client" data-id="2484">✏️</span>
                                <span class="action-icon delete-client" data-id="2484">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 4 -->
                        <tr>
                            <td class="client-id">CLI-2483</td>
                            <td>Youssef Alami</td>
                            <td>youssef.alami@email.com</td>
                            <td>+212 6 45 67 89 01</td>
                            <td>Casablanca</td>
                            <td class="client-date">05/02/2024</td>
                            <td>3</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2483">👁️</span>
                                <span class="action-icon edit-client" data-id="2483">✏️</span>
                                <span class="action-icon delete-client" data-id="2483">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 5 -->
                        <tr>
                            <td class="client-id">CLI-2482</td>
                            <td>Fatima Zahra Mansouri</td>
                            <td>fatimazahra.m@email.com</td>
                            <td>+212 6 56 78 90 12</td>
                            <td>Agadir</td>
                            <td class="client-date">18/02/2024</td>
                            <td>9</td>
                            <td><span class="status-badge status-vip">VIP</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2482">👁️</span>
                                <span class="action-icon edit-client" data-id="2482">✏️</span>
                                <span class="action-icon delete-client" data-id="2482">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 6 -->
                        <tr>
                            <td class="client-id">CLI-2481</td>
                            <td>Mohamed El Fassi</td>
                            <td>mohamed.elfassi@email.com</td>
                            <td>+212 6 67 89 01 23</td>
                            <td>Fès</td>
                            <td class="client-date">22/02/2024</td>
                            <td>2</td>
                            <td><span class="status-badge status-inactive">Inactif</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2481">👁️</span>
                                <span class="action-icon edit-client" data-id="2481">✏️</span>
                                <span class="action-icon delete-client" data-id="2481">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 7 -->
                        <tr>
                            <td class="client-id">CLI-2480</td>
                            <td>Nadia Benjelloun</td>
                            <td>nadia.benjelloun@email.com</td>
                            <td>+212 6 78 90 12 34</td>
                            <td>Tanger</td>
                            <td class="client-date">01/03/2024</td>
                            <td>6</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2480">👁️</span>
                                <span class="action-icon edit-client" data-id="2480">✏️</span>
                                <span class="action-icon delete-client" data-id="2480">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 8 -->
                        <tr>
                            <td class="client-id">CLI-2479</td>
                            <td>Hassan Berrada</td>
                            <td>hassan.berrada@email.com</td>
                            <td>+212 6 89 01 23 45</td>
                            <td>Casablanca</td>
                            <td class="client-date">10/03/2024</td>
                            <td>4</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2479">👁️</span>
                                <span class="action-icon edit-client" data-id="2479">✏️</span>
                                <span class="action-icon delete-client" data-id="2479">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 9 -->
                        <tr>
                            <td class="client-id">CLI-2478</td>
                            <td>Leila Tazi</td>
                            <td>leila.tazi@email.com</td>
                            <td>+212 6 90 12 34 56</td>
                            <td>Marrakech</td>
                            <td class="client-date">15/03/2024</td>
                            <td>7</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2478">👁️</span>
                                <span class="action-icon edit-client" data-id="2478">✏️</span>
                                <span class="action-icon delete-client" data-id="2478">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Client 10 -->
                        <tr>
                            <td class="client-id">CLI-2477</td>
                            <td>Omar Bouazza</td>
                            <td>omar.bouazza@email.com</td>
                            <td>+212 6 01 23 45 67</td>
                            <td>Rabat</td>
                            <td class="client-date">22/03/2024</td>
                            <td>1</td>
                            <td><span class="status-badge status-inactive">Inactif</span></td>
                            <td>
                                <span class="action-icon view-client" data-id="2477">👁️</span>
                                <span class="action-icon edit-client" data-id="2477">✏️</span>
                                <span class="action-icon delete-client" data-id="2477">🗑️</span>
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
                <div class="page-item">35</div>
            </div>
            
            <!-- Modal Détail Client -->
            <div class="modal-backdrop" style="display: none;">
                <div class="modal">
                    <div class="modal-header">
                        <h3>Détails du client #CLI-2486</h3>
                        <button class="modal-close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="client-details">
                            <div class="client-col">
                                <div class="detail-group">
                                    <div class="detail-label">Nom complet</div>
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
                                    <div class="detail-label">Date d'inscription</div>
                                    <div class="detail-value">15/11/2023</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Statut</div>
                                    <div class="detail-value">
                                        <span class="status-badge status-active">Actif</span>
                                    </div>
                                </div>
                            </div>
                            <div class="client-col">
                                <div class="detail-group">
                                    <div class="detail-label">Adresse</div>
                                    <div class="detail-value">
                                        Résidence Al Firdaous, Apt 5, Étage 2<br>
                                        Avenue Hassan II<br>
                                        Casablanca, 20250<br>
                                        Maroc
                                    </div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Total des commandes</div>
                                    <div class="detail-value">8 commandes (5,200 DH)</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Dernière commande</div>
                                    <div class="detail-value">01/03/2025 (CMD-7842)</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Mode de paiement préféré</div>
                                    <div class="detail-value">Carte bancaire</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="client-order-history">
                            <h4>Historique des commandes</h4>
                            <table class="orders-table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>N° Commande</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CMD-7842</td>
                                        <td>01/03/2025</td>
                                        <td>650 DH</td>
                                        <td><span class="status-badge status-pending">En attente</span></td>
                                        <td><span class="action-icon">👁️</span></td>
                                    </tr>
                                    <tr>
                                        <td>CMD-7650</td>
                                        <td>15/02/2025</td>
                                        <td>820 DH</td>
                                        <td><span class="status-badge status-delivered">Livrée</span></td>
                                        <td><span class="action-icon">👁️</span></td>
                                    </tr>
                                    <tr>
                                        <td>CMD-7503</td>
                                        <td>29/01/2025</td>
                                        <td>450 DH</td>
                                        <td><span class="status-badge status-delivered">Livrée</span></td>
                                        
                                        @endsection
                                        
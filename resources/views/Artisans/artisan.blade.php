@extends('layouts.dashboard')

@section('title', 'Artisan')

@section('content')
            <div class="artisans-summary">
                <div class="summary-card">
                    <div class="summary-icon">👨‍🎨</div>
                    <div class="summary-value">148</div>
                    <div class="summary-title">Artisans total</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">🏆</div>
                    <div class="summary-value">32</div>
                    <div class="summary-title">Maîtres artisans</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">🆕</div>
                    <div class="summary-value">12</div>
                    <div class="summary-title">Nouveaux ce mois</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">⭐</div>
                    <div class="summary-value">4.6/5</div>
                    <div class="summary-title">Note moyenne</div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="btn btn-primary" id="add-artisan-btn">
                    <i>➕</i> Nouvel artisan
                </button>
                <button class="btn btn-secondary">
                    <i>⬇️</i> Exporter
                </button>
                <button class="btn btn-secondary">
                    <i>🎓</i> Programme formations
                </button>
            </div>
            
            <div class="filter-bar">
                <div class="filter-group">
                    <label for="status-filter">Statut:</label>
                    <select id="status-filter" class="filter-input">
                        <option value="">Tous</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                        <option value="master">Maître artisan</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="specialty-filter">Spécialité:</label>
                    <select id="specialty-filter" class="filter-input">
                        <option value="">Toutes</option>
                        <option value="argan">Huile d'argan</option>
                        <option value="soap">Savons traditionnels</option>
                        <option value="scent">Parfums naturels</option>
                        <option value="clay">Soins à l'argile</option>
                        <option value="herbs">Mélanges d'herbes</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="region-filter">Région:</label>
                    <select id="region-filter" class="filter-input">
                        <option value="">Toutes</option>
                        <option value="souss">Souss-Massa</option>
                        <option value="marrakech">Marrakech-Safi</option>
                        <option value="fes">Fès-Meknès</option>
                        <option value="tangier">Tanger-Tétouan</option>
                        <option value="oriental">L'Oriental</option>
                    </select>
                </div>
                
                <div class="filter-group" style="flex-grow: 1;">
                    <label for="search-filter">Recherche:</label>
                    <input type="text" id="search-filter" class="filter-input" style="width: 100%;" placeholder="Nom, coopérative, produit...">
                </div>
            </div>
            
            <div class="artisans-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID Artisan</th>
                            <th>Nom</th>
                            <th>Coopérative</th>
                            <th>Spécialité</th>
                            <th>Région</th>
                            <th>Date d'adhésion</th>
                            <th>Produits</th>
                            <th>Qualité</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Artisan 1 -->
                        <tr>
                            <td class="artisan-id">ART-0042</td>
                            <td>Fatima Amhaouch</td>
                            <td>Coopérative Amal</td>
                            <td>Huile d'argan</td>
                            <td>Souss-Massa</td>
                            <td class="artisan-date">10/05/2022</td>
                            <td>12</td>
                            <td class="quality-rating">★★★★★</td>
                            <td><span class="status-badge status-master">Maître artisan</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0042">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0042">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0042">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 2 -->
                        <tr>
                            <td class="artisan-id">ART-0043</td>
                            <td>Hassan Ouakrim</td>
                            <td>Coopérative Assafou</td>
                            <td>Savons traditionnels</td>
                            <td>Marrakech-Safi</td>
                            <td class="artisan-date">15/06/2022</td>
                            <td>8</td>
                            <td class="quality-rating">★★★★☆</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0043">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0043">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0043">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 3 -->
                        <tr>
                            <td class="artisan-id">ART-0044</td>
                            <td>Zahra Bennani</td>
                            <td>Coopérative Tiziri</td>
                            <td>Parfums naturels</td>
                            <td>Souss-Massa</td>
                            <td class="artisan-date">20/07/2022</td>
                            <td>10</td>
                            <td class="quality-rating">★★★★★</td>
                            <td><span class="status-badge status-master">Maître artisan</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0044">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0044">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0044">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 4 -->
                        <tr>
                            <td class="artisan-id">ART-0045</td>
                            <td>Ahmed Tazi</td>
                            <td>Coopérative Argania</td>
                            <td>Huile d'argan</td>
                            <td>Souss-Massa</td>
                            <td class="artisan-date">05/08/2022</td>
                            <td>6</td>
                            <td class="quality-rating">★★★★☆</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0045">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0045">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0045">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 5 -->
                        <tr>
                            <td class="artisan-id">ART-0046</td>
                            <td>Karim El Fassi</td>
                            <td>Coopérative Amalu</td>
                            <td>Soins à l'argile</td>
                            <td>Fès-Meknès</td>
                            <td class="artisan-date">12/09/2022</td>
                            <td>9</td>
                            <td class="quality-rating">★★★★★</td>
                            <td><span class="status-badge status-master">Maître artisan</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0046">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0046">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0046">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 6 -->
                        <tr>
                            <td class="artisan-id">ART-0047</td>
                            <td>Samira Ouadii</td>
                            <td>Coopérative Adrar</td>
                            <td>Mélanges d'herbes</td>
                            <td>Marrakech-Safi</td>
                            <td class="artisan-date">20/10/2022</td>
                            <td>4</td>
                            <td class="quality-rating">★★★☆☆</td>
                            <td><span class="status-badge status-inactive">Inactif</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0047">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0047">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0047">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 7 -->
                        <tr>
                            <td class="artisan-id">ART-0048</td>
                            <td>Mohammed Idrissi</td>
                            <td>Coopérative Tafoukt</td>
                            <td>Huile d'argan</td>
                            <td>Souss-Massa</td>
                            <td class="artisan-date">05/11/2022</td>
                            <td>7</td>
                            <td class="quality-rating">★★★★☆</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0048">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0048">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0048">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 8 -->
                        <tr>
                            <td class="artisan-id">ART-0049</td>
                            <td>Naima Ziani</td>
                            <td>Coopérative Ifoulki</td>
                            <td>Savons traditionnels</td>
                            <td>Tanger-Tétouan</td>
                            <td class="artisan-date">15/12/2022</td>
                            <td>11</td>
                            <td class="quality-rating">★★★★★</td>
                            <td><span class="status-badge status-master">Maître artisan</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0049">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0049">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0049">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 9 -->
                        <tr>
                            <td class="artisan-id">ART-0050</td>
                            <td>Youssef Benjelloun</td>
                            <td>Coopérative Atlas</td>
                            <td>Parfums naturels</td>
                            <td>Marrakech-Safi</td>
                            <td class="artisan-date">10/01/2023</td>
                            <td>5</td>
                            <td class="quality-rating">★★★★☆</td>
                            <td><span class="status-badge status-active">Actif</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0050">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0050">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0050">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Artisan 10 -->
                        <tr>
                            <td class="artisan-id">ART-0051</td>
                            <td>Amina Lahrichi</td>
                            <td>Coopérative Tamounte</td>
                            <td>Mélanges d'herbes</td>
                            <td>L'Oriental</td>
                            <td class="artisan-date">22/02/2023</td>
                            <td>3</td>
                            <td class="quality-rating">★★★☆☆</td>
                            <td><span class="status-badge status-inactive">Inactif</span></td>
                            <td>
                                <span class="action-icon view-artisan" data-id="0051">👁️</span>
                                <span class="action-icon edit-artisan" data-id="0051">✏️</span>
                                <span class="action-icon delete-artisan" data-id="0051">🗑️</span>
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
                <div class="page-item">15</div>
            </div>
            
            <!-- Modal Détail Artisan -->
            <div class="modal-backdrop" style="display: none;">
                <div class="modal">
                    <div class="modal-header">
                        <h3>Détails de l'artisan #ART-0042</h3>
                        <button class="modal-close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="artisan-details">
                            <div class="artisan-col">
                                <div class="detail-group">
                                    <div class="detail-label">Nom complet</div>
                                    <div class="detail-value">Fatima Amhaouch</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Coopérative</div>
                                    <div class="detail-value">Coopérative Amal</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Contact</div>
                                    <div class="detail-value">+212 6 55 78 90 23</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Email</div>
                                    <div class="detail-value">fatima.amal@cooperative.ma</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Date d'adhésion</div>
                                    <div class="detail-value">10/05/2022</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Statut</div>
                                    <div class="detail-value">
                                        <span class="status-badge status-master">Maître artisan</span>
                                    </div>
                                </div>
                            </div>
                            <div class="artisan-col">
                                <div class="detail-group">
                                    <div class="detail-label">Spécialités</div>
                                    <div class="detail-value">
                                        <span class="skill-tag">Huile d'argan</span>
                                        <span class="skill-tag">Savons naturels</span>
                                        <span class="skill-tag">Crèmes hydratantes</span>
                                    </div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Région</div>
                                    <div class="detail-value">Souss-Massa (Agadir)</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Qualité de production</div>
                                    <div class="detail-value quality-rating">★★★★★ (4.92/5)</div>
                                </div>
                                <div class="detail-group">
                                    <div class="detail-label">Certifications</div>
                                    


                                    @endsection
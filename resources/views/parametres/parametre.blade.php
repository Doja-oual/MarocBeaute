@extends('layouts.dashboard')

@section('title', 'Paramètres du compte')

@section('content')
           
            
            <div class="dashboard-stats">
                <div class="stat-card">
                    <div class="stat-change stat-increase">+12%</div>
                    <div class="stat-icon">📦</div>
                    <div class="stat-value">1,245</div>
                    <div class="stat-label">Produits en stock</div>
                </div>
                <div class="stat-card">
                    <div class="stat-change stat-increase">+8%</div>
                    <div class="stat-icon">🛒</div>
                    <div class="stat-value">867</div>
                    <div class="stat-label">Commandes ce mois</div>
                </div>
                <div class="stat-card">
                    <div class="stat-change stat-decrease">-3%</div>
                    <div class="stat-icon">💰</div>
                    <div class="stat-value">₹54,320</div>
                    <div class="stat-label">Recettes mensuelles</div>
                </div>
                <div class="stat-card">
                    <div class="stat-change stat-increase">+15%</div>
                    <div class="stat-icon">👥</div>
                    <div class="stat-value">2,841</div>
                    <div class="stat-label">Nouveaux clients</div>
                </div>
            </div>
            
            <div class="settings-grid">
                <!-- Paramètres du profil -->
                <div class="settings-card">
                    <div class="card-header">
                        <span>Profil utilisateur</span>
                        <i>👤</i>
                    </div>
                    <div class="card-body">
                        <div style="text-align: center; margin-bottom: 20px;">
                            <img src="/api/placeholder/100/100" alt="Avatar" class="user-avatar">
                            <div>
                                <button class="btn btn-secondary">Changer l'avatar</button>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="settings-input" value="admin">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="settings-input" value="admin@moroccan-cosmetics.com">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Téléphone</label>
                            <input type="tel" class="settings-input" value="+212 661 234567">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" class="settings-input" value="••••••••">
                        </div>
                    </div>
                </div>
                
                <!-- Paramètres de notification -->
                <div class="settings-card">
                    <div class="card-header">
                        <span>Notifications</span>
                        <i>🔔</i>
                    </div>
                    <div class="card-body">
                        <ul class="settings-list">
                            <li class="settings-item">
                                <span class="settings-label">Nouvelles commandes</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Commentaires blog</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Produits en rupture</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Nouveaux clients</span>
                                <label class="settings-toggle">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Rapports hebdomadaires</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Notifications par email</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Notifications SMS</span>
                                <label class="settings-toggle">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Paramètres du site -->
                <div class="settings-card">
                    <div class="card-header">
                        <span>Paramètres du site</span>
                        <i>🌐</i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nom du site</label>
                            <input type="text" class="settings-input" value="Moroccan Cosmetics">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Slogan</label>
                            <input type="text" class="settings-input" value="La beauté authentique du Maroc">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Langue par défaut</label>
                            <select class="settings-select">
                                <option value="fr">Français</option>
                                <option value="en">Anglais</option>
                                <option value="ar">Arabe</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Devise</label>
                            <select class="settings-select">
                                <option value="MAD">MAD (Dirham)</option>
                                <option value="EUR">EUR (Euro)</option>
                                <option value="USD">USD (Dollar US)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Produits par page</label>
                            <select class="settings-select">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                                <option value="48">48</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Paramètres de paiement -->
                <div class="settings-card">
                    <div class="card-header">
                        <span>Paiements</span>
                        <i>💳</i>
                    </div>
                    <div class="card-body">
                        <ul class="settings-list">
                            <li class="settings-item">
                                <span class="settings-label">PayPal</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Carte de crédit</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Paiement à la livraison</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Virement bancaire</span>
                                <label class="settings-toggle">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                        </ul>
                        
                        <div class="form-group" style="margin-top: 15px;">
                            <label class="form-label">Clé API PayPal</label>
                            <input type="password" class="settings-input" value="••••••••••••••••">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Clé secrète PayPal</label>
                            <input type="password" class="settings-input" value="••••••••••••••••">
                        </div>
                    </div>
                </div>
                
                <!-- Paramètres d'expédition -->
                <div class="settings-card">
                    <div class="card-header">
                        <span>Expédition</span>
                        <i>🚚</i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Mode d'expédition par défaut</label>
                            <select class="settings-select">
                                <option value="standard">Standard</option>
                                <option value="express">Express</option>
                                <option value="pickup">Retrait en magasin</option>
                            </select>
                        </div>
                        
                        <ul class="settings-list">
                            <li class="settings-item">
                                <span class="settings-label">Livraison locale</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Livraison internationale</span>
                                <label class="settings-toggle">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </li>
                            <li class="settings-item">
                                <span class="settings-label">Livraison gratuite</span>
                                <div>
                                    <span class="settings-value">Commandes > 500 MAD</span>
                                </div>
                            </li>
                        </ul>
                        
                        <div class="form-group" style="margin-top: 15px;">
                            <label class="form-label">Taux de livraison nationale</label>
                            <input type="text" class="settings-input" value="40 MAD">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Taux de livraison internationale</label>
                            <input type="text" class="settings-input" value="150 MAD">
                        </div>
                    </div>
                </div>
                
                <!-- Personnalisation du thème -->
                <div class="settings-card">
                    <div class="card-header">
                        <span>Personnalisation</span>
                        <i>🎨</i>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Couleur principale</label>
                            <input type="color" class="color-picker" value="#d2aa6d">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Couleur secondaire</label>
                            <input type="color" class="color-picker" value="#808565">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Couleur d'arrière-plan</label>
                            <input type="color" class="color-picker" value="#e8dfce">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Police de caractères</label>
                            <select class="settings-select">
                                <option value="segoe">Segoe UI</option>
                                <option value="roboto">Roboto</option>
                                <option value="open-sans">Open Sans</option>
                                <option value="poppins">Poppins</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Style de bouton</label>
                            <select class="settings-select">
                                <option value="rounded">Arrondi</option>
                                <option value="square">Carré</option>
                                <option value="pill">Pilule</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="btn btn-secondary">Annuler les modifications</button>
                <button class="btn btn-primary">Enregistrer les paramètres</button>
            </div>
        
    </div>
    @endsection
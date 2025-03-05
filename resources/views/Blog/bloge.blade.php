@extends('layouts.dashboard')

@section('title', 'Tableau de bord')

@section('content')
<main class="main-content">
            <div class="header">
                <h2>Gestion du Blog</h2>
                <div class="user-info">
                    <img src="/api/placeholder/40/40" alt="Admin"/>
                    <span>Admin</span>
                </div>
            </div>
            
            <div class="blog-summary">
                <div class="summary-card">
                    <div class="summary-icon">📄</div>
                    <div class="summary-value">45</div>
                    <div class="summary-title">Articles publiés</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">👁️</div>
                    <div class="summary-value">12.5K</div>
                    <div class="summary-title">Vues ce mois</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">✍️</div>
                    <div class="summary-value">8</div>
                    <div class="summary-title">Brouillons</div>
                </div>
                <div class="summary-card">
                    <div class="summary-icon">💬</div>
                    <div class="summary-value">124</div>
                    <div class="summary-title">Commentaires</div>
                </div>
            </div>
            
            <div class="blog-editor-tools">
                <h3 class="tools-header">Outils d'édition</h3>
                <div class="tools-grid">
                    <div class="tool-card">
                        <div class="tool-icon">✏️</div>
                        <div class="tool-name">Nouvel article</div>
                    </div>
                    <div class="tool-card">
                        <div class="tool-icon">📂</div>
                        <div class="tool-name">Médiathèque</div>
                    </div>
                    <div class="tool-card">
                        <div class="tool-icon">🏷️</div>
                        <div class="tool-name">Gérer les tags</div>
                    </div>
                    <div class="tool-card">
                        <div class="tool-icon">📊</div>
                        <div class="tool-name">Statistiques</div>
                    </div>
                    <div class="tool-card">
                        <div class="tool-icon">📅</div>
                        <div class="tool-name">Planificateur</div>
                    </div>
                    <div class="tool-card">
                        <div class="tool-icon">🔍</div>
                        <div class="tool-name">SEO</div>
                    </div>
                    <div class="tool-card">
                        <div class="tool-icon">💬</div>
                        <div class="tool-name">Commentaires</div>
                    </div>
                    <div class="tool-card">
                        <div class="tool-icon">📱</div>
                        <div class="tool-name">Prévisualisation</div>
                    </div>
                </div>
            </div>
            
            <div class="featured-articles">
                <div class="article-card">
                    <div class="article-image">Image de l'article</div>
                    <div class="article-content">
                        <div class="article-title">Bienfaits de l'huile d'argan pour la peau sèche en hiver</div>
                        <div class="article-meta">
                            <span>15 Feb 2023</span>
                            <span>12.4K vues</span>
                        </div>
                        <div class="article-excerpt">L'huile d'argan est reconnue pour ses propriétés nourrissantes exceptionnelles, particulièrement efficaces pendant les mois d'hiver...</div>
                        <div class="article-stats">
                            <div class="stat-item"><i>👍</i> 234</div>
                            <div class="stat-item"><i>💬</i> 45</div>
                            <div class="stat-item"><i>🔄</i> 78</div>
                        </div>
                    </div>
                </div>
                <div class="article-card">
                    <div class="article-image">Image de l'article</div>
                    <div class="article-content">
                        <div class="article-title">Les secrets ancestraux des soins à l'argile ghassoul</div>
                        <div class="article-meta">
                            <span>3 Mar 2023</span>
                            <span>8.7K vues</span>
                        </div>
                        <div class="article-excerpt">Utilisée depuis des siècles par les femmes berbères, l'argile ghassoul est un trésor naturel aux multiples vertus cosmétiques...</div>
                        <div class="article-stats">
                            <div class="stat-item"><i>👍</i> 187</div>
                            <div class="stat-item"><i>💬</i> 32</div>
                            <div class="stat-item"><i>🔄</i> 54</div>
                        </div>
                    </div>
                </div>
                <div class="article-card">
                    <div class="article-image">Image de l'article</div>
                    <div class="article-content">
                        <div class="article-title">5 rituels beauté inspirés des femmes du désert</div>
                        <div class="article-meta">
                            <span>22 Mar 2023</span>
                            <span>9.1K vues</span>
                        </div>
                        <div class="article-excerpt">Découvrez les rituels beauté séculaires des femmes nomades du Sahara, adaptés aux conditions extrêmes et perfectionnés au fil des générations...</div>
                        <div class="article-stats">
                            <div class="stat-item"><i>👍</i> 203</div>
                            <div class="stat-item"><i>💬</i> 38</div>
                            <div class="stat-item"><i>🔄</i> 67</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="btn btn-primary" id="new-article-btn">
                    <i>✏️</i> Rédiger un article
                </button>
                <button class="btn btn-secondary">
                    <i>📊</i> Analyser la performance
                </button>
                <button class="btn btn-secondary">
                    <i>🔍</i> Rechercher
                </button>
            </div>
            
            <div class="filter-bar">
                <div class="filter-group">
                    <label for="status-filter">Statut:</label>
                    <select id="status-filter" class="filter-input">
                        <option value="">Tous</option>
                        <option value="published">Publié</option>
                        <option value="draft">Brouillon</option>
                        <option value="scheduled">Planifié</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="category-filter">Catégorie:</label>
                    <select id="category-filter" class="filter-input">
                        <option value="">Toutes</option>
                        <option value="argan">Huile d'argan</option>
                        <option value="clay">Soins à l'argile</option>
                        <option value="herbs">Herbes médicinales</option>
                        <option value="rituals">Rituels beauté</option>
                        <option value="tips">Conseils beauté</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="date-filter">Date:</label>
                    <select id="date-filter" class="filter-input">
                        <option value="">Toutes dates</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                        <option value="quarter">Ce trimestre</option>
                        <option value="year">Cette année</option>
                    </select>
                </div>
                
                <div class="filter-group" style="flex-grow: 1;">
                    <label for="search-filter">Recherche:</label>
                    <input type="text" id="search-filter" class="filter-input" style="width: 100%;" placeholder="Titre, auteur, contenu...">
                </div>
            </div>
            
            <div class="blog-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Catégorie</th>
                            <th>Date</th>
                            <th>Vues</th>
                            <th>Commentaires</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Article 1 -->
                        <tr>
                            <td class="article-id">BLOG-0034</td>
                            <td>Bienfaits de l'huile d'argan pour la peau sèche en hiver</td>
                            <td>Amina Khalid</td>
                            <td>
                                <span class="category-tag">Huile d'argan</span>
                            </td>
                            <td class="article-date">15/02/2023</td>
                            <td>12,436</td>
                            <td>45</td>
                            <td><span class="status-badge status-published">Publié</span></td>
                            <td>
                                <span class="action-icon view-article" data-id="0034">👁️</span>
                                <span class="action-icon edit-article" data-id="0034">✏️</span>
                                <span class="action-icon delete-article" data-id="0034">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Article 2 -->
                        <tr>
                            <td class="article-id">BLOG-0035</td>
                            <td>Les secrets ancestraux des soins à l'argile ghassoul</td>
                            <td>Mehdi Ouazzani</td>
                            <td>
                                <span class="category-tag">Soins à l'argile</span>
                            </td>
                            <td class="article-date">03/03/2023</td>
                            <td>8,756</td>
                            <td>32</td>
                            <td><span class="status-badge status-published">Publié</span></td>
                            <td>
                                <span class="action-icon view-article" data-id="0035">👁️</span>
                                <span class="action-icon edit-article" data-id="0035">✏️</span>
                                <span class="action-icon delete-article" data-id="0035">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Article 3 -->
                        <tr>
                            <td class="article-id">BLOG-0036</td>
                            <td>5 rituels beauté inspirés des femmes du désert</td>
                            <td>Laila Bennani</td>
                            <td>
                                <span class="category-tag">Rituels beauté</span>
                            </td>
                            <td class="article-date">22/03/2023</td>
                            <td>9,124</td>
                            <td>38</td>
                            <td><span class="status-badge status-published">Publié</span></td>
                            <td>
                                <span class="action-icon view-article" data-id="0036">👁️</span>
                                <span class="action-icon edit-article" data-id="0036">✏️</span>
                                <span class="action-icon delete-article" data-id="0036">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Article 4 -->
                        <tr>
                            <td class="article-id">BLOG-0037</td>
                            <td>Comment intégrer l'eau de rose dans votre routine beauté</td>
                            <td>Yasmine Fathi</td>
                            <td>
                                <span class="category-tag">Conseils beauté</span>
                            </td>
                            <td class="article-date">05/04/2023</td>
                            <td>7,562</td>
                            <td>29</td>
                            <td><span class="status-badge status-published">Publié</span></td>
                            <td>
                                <span class="action-icon view-article" data-id="0037">👁️</span>
                                <span class="action-icon edit-article" data-id="0037">✏️</span>
                                <span class="action-icon delete-article" data-id="0037">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Article 5 -->
                        <tr>
                            <td class="article-id">BLOG-0038</td>
                            <td>Les plantes médicinales du Moyen Atlas et leurs vertus cosmétiques</td>
                            <td>Karim Alaoui</td>
                            <td>
                                <span class="category-tag">Herbes médicinales</span>
                            </td>
                            <td class="article-date">18/04/2023</td>
                            <td>5,241</td>
                            <td>17</td>
                            <td><span class="status-badge status-published">Publié</span></td>
                            <td>
                                <span class="action-icon view-article" data-id="0038">👁️</span>
                                <span class="action-icon edit-article" data-id="0038">✏️</span>
                                <span class="action-icon delete-article" data-id="0038">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Article 6 -->
                        <tr>
                            <td class="article-id">BLOG-0039</td>
                            <td>L'histoire fascinante du savon noir marocain</td>
                            <td>Ahmed Brahim</td>
                            <td>
                                <span class="category-tag">Savons naturels</span>
                            </td>
                            <td class="article-date">02/05/2023</td>
                            <td>4,897</td>
                            <td>21</td>
                            <td><span class="status-badge status-published">Publié</span></td>
                            <td>
                                <span class="action-icon view-article" data-id="0039">👁️</span>
                                <span class="action-icon edit-article" data-id="0039">✏️</span>
                                <span class="action-icon delete-article" data-id="0039">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Article 7 -->
                        <tr>
                            <td class="article-id">BLOG-0040</td>
                            <td>Secrets des femmes berbères pour des cheveux brillants</td>
                            <td>Amina Khalid</td>
                            <td>
                                <span class="category-tag">Conseils beauté</span>
                            </td>
                            <td class="article-date">--/--/----</td>
                            <td>--</td>
                            <td>--</td>
                            <td><span class="status-badge status-draft">Brouillon</span></td>
                            <td>
                                <span class="action-icon view-article" data-id="0040">👁️</span>
                                <span class="action-icon edit-article" data-id="0040">✏️</span>
                                <span class="action-icon delete-article" data-id="0040">🗑️</span>
                            </td>
                        </tr>
                        
                        <!-- Article 8 -->
                        <tr>
                            <td class="article-id">BLOG-0041</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endsection
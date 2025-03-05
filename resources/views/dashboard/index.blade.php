@extends('layouts.dashboard')

@section('title', 'Tableau de bord')

@section('content')
<div class="cards-container">
                <div class="card">
                    <div class="card-header">
                        <h3>Ventes</h3>
                        <div class="card-icon">💰</div>
                    </div>
                    <div class="card-value">24 890 DH</div>
                    <div class="card-label">+18% ce mois-ci</div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Commandes</h3>
                        <div class="card-icon">📦</div>
                    </div>
                    <div class="card-value">186</div>
                    <div class="card-label">+12% ce mois-ci</div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Clients</h3>
                        <div class="card-icon">👥</div>
                    </div>
                    <div class="card-value">954</div>
                    <div class="card-label">+25% ce mois-ci</div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Produits</h3>
                        <div class="card-icon">🧴</div>
                    </div>
                    <div class="card-value">124</div>
                    <div class="card-label">8 nouveaux ce mois-ci</div>
                </div>
            </div>
            
            <div class="chart-container">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Ventes mensuelles</h3>
                        <div class="chart-actions">
                            <button>Cette année</button>
                            <button>Exportation</button>
                        </div>
                    </div>
                    <div class="chart">
                        <div class="bar-container">
                            <div class="bar" style="height: 60%;">
                                <div class="bar-label">Jan</div>
                            </div>
                            <div class="bar" style="height: 75%;">
                                <div class="bar-label">Fév</div>
                            </div>
                            <div class="bar" style="height: 65%;">
                                <div class="bar-label">Mar</div>
                            </div>
                            <div class="bar" style="height: 80%;">
                                <div class="bar-label">Avr</div>
                            </div>
                            <div class="bar" style="height: 95%;">
                                <div class="bar-label">Mai</div>
                            </div>
                            <div class="bar" style="height: 85%;">
                                <div class="bar-label">Juin</div>
                            </div>
                            <div class="bar" style="height: 90%;">
                                <div class="bar-label">Juil</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="chart-card">
                    <div class="chart-header">
                        <h3>Répartition des ventes</h3>
                    </div>
                    <div class="donut-chart">
                        <div class="donut-hole"></div>
                    </div>
                    <div class="chart-legend">
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: var(--bronze);"></div>
                            <span>Traditionnels (30%)</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: var(--olive);"></div>
                            <span>Modernes (25%)</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: var(--gold);"></div>
                            <span>Kits (20%)</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: var(--light-olive);"></div>
                            <span>Autres (25%)</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-container">
                <div class="table-header">
                    <h3>Commandes récentes</h3>
                    <button class="action-btn">Voir tout</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#ORD-2548</td>
                            <td>Samir Amrani</td>
                            <td>01/03/2025</td>
                            <td>485 DH</td>
                            <td><span class="status completed">Complété</span></td>
                            <td><button class="action-btn">Détails</button></td>
                        </tr>
                        <tr>
                            <td>#ORD-2547</td>
                            <td>Nadia Benali</td>
                            <td>28/02/2025</td>
                            <td>760 DH</td>
                            <td><span class="status processing">En traitement</span></td>
                            <td><button class="action-btn">Détails</button></td>
                        </tr>
                        <tr>
                            <td>#ORD-2546</td>
                            <td>Karim El Fassi</td>
                            <td>27/02/2025</td>
                            <td>950 DH</td>
                            <td><span class="status processing">En traitement</span></td>
                            <td><button class="action-btn">Détails</button></td>
                        </tr>
                        <tr>
                            <td>#ORD-2545</td>
                            <td>Leila Mouhib</td>
                            <td>26/02/2025</td>
                            <td>340 DH</td>
                            <td><span class="status completed">Complété</span></td>
                            <td><button class="action-btn">Détails</button></td>
                        </tr>
                        <tr>
                            <td>#ORD-2544</td>
                            <td>Rachid Tazi</td>
                            <td>25/02/2025</td>
                            <td>280 DH</td>
                            <td><span class="status cancelled">Annulé</span></td>
                            <td><button class="action-btn">Détails</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
@endsection

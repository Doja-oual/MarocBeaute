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
@endsection

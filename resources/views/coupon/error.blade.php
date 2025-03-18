@extends('layouts.dashboard')

@section('title', 'Erreur')

@section('content')
    <div class="alert alert-danger">
        <h4>Une erreur est survenue</h4>
        <p>{{ $error }}</p>
    </div>
    
    <div class="action-buttons">
        <a href="{{ route('coupon.index') }}" class="btn btn-primary">
            Retour à la liste des coupons
        </a>
    </div>
@endsection
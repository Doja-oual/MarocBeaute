@extends('layouts.dashboard')

@section('title', 'Gestion des Coupons')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="action-buttons">
        <button class="btn btn-primary" id="add-item-btn">
            <i>➕</i> Ajouter un coupon
        </button>
    </div>

    <div class="filter-bar">
        <div class="filter-group" style="flex-grow: 1;">
            <label for="search-filter">Recherche:</label>
            <input type="text" id="search-filter" class="filter-input" placeholder="Code du coupon...">
        </div>
    </div>

    <div class="products-grid">
        @foreach ($coupons as $coupon)
            <div class="product-card">
                <div class="product-content">
                    <h3 class="product-name">{{ $coupon->code }}</h3>
                    <p class="product-description">
                        Réduction: {{ $coupon->percentage }}%
                    </p>
                    <p class="product-description">
                        Expire le: {{ date('d/m/Y', strtotime($coupon->expire)) }}
                    </p>
                    <p class="product-description">
                        Utilisations restantes: {{ $coupon->count_use }}
                    </p>
                    <div class="product-actions">
                        <button class="btn btn-primary edit-coupon" data-id="{{ $coupon->id }}" 
                                data-code="{{ $coupon->code }}"
                                data-percentage="{{ $coupon->percentage }}"
                                data-expire="{{ $coupon->expire }}"
                                data-count="{{ $coupon->count_use }}">
                            Modifier
                        </button>
                        <form action="{{ route('coupon.destroy', $coupon->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce coupon?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Ajout/Modification de Coupon -->
    <div class="modal-backdrop" style="display: none;">
        <div class="modal">
            <div class="modal-header">
                <h3 id="modal-title">Ajouter un coupon</h3>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="coupon-form" method="POST" action="{{ route('coupon.store') }}">
                    @csrf
                    <input type="hidden" id="coupon-id" name="coupon_id">
                    <input type="hidden" id="form-method" name="_method" value="POST">
                    
                    <div class="form-group">
                        <label for="coupon-code">Code</label>
                        <input type="text" id="coupon-code" name="code" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="coupon-percentage">Pourcentage de réduction</label>
                        <input type="number" id="coupon-percentage" name="percentage" class="form-control" min="1" max="100" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="coupon-expire">Date d'expiration</label>
                        <input type="date" id="coupon-expire" name="expire" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="coupon-count">Nombre d'utilisations</label>
                        <input type="number" id="coupon-count" name="count_use" class="form-control" min="1" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-close">Annuler</button>
                <button class="btn btn-primary" onclick="submitForm()">Enregistrer</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addItemBtn = document.getElementById('add-item-btn');
            const modalBackdrop = document.querySelector('.modal-backdrop');
            const modalCloseButtons = document.querySelectorAll('.modal-close');
            const form = document.getElementById('coupon-form');
            const modalTitle = document.getElementById('modal-title');
            const editButtons = document.querySelectorAll('.edit-coupon');
            const formMethod = document.getElementById('form-method');
            const couponId = document.getElementById('coupon-id');

            function openModal() {
                modalTitle.textContent = 'Ajouter un coupon';
                form.action = "{{ route('coupon.store') }}";
                formMethod.value = 'POST';
                couponId.value = '';
                form.reset();
                
                // Set default expiration date to tomorrow
                const tomorrow = new Date();
                tomorrow.setDate(tomorrow.getDate() + 1);
                document.getElementById('coupon-expire').value = tomorrow.toISOString().split('T')[0];
                
                modalBackdrop.style.display = 'flex';
            }

            function openEditModal(event) {
                const button = event.currentTarget;
                const id = button.dataset.id;
                
                modalTitle.textContent = 'Modifier un coupon';
                form.action = "{{ url('coupons') }}/" + id;
                formMethod.value = 'PUT';
                couponId.value = id;
                
                document.getElementById('coupon-code').value = button.dataset.code;
                document.getElementById('coupon-percentage').value = button.dataset.percentage;
                document.getElementById('coupon-expire').value = button.dataset.expire.split(' ')[0];
                document.getElementById('coupon-count').value = button.dataset.count;
                
                modalBackdrop.style.display = 'flex';
            }

            function closeModal() {
                modalBackdrop.style.display = 'none';
                form.reset();
            }

            addItemBtn.addEventListener('click', openModal);
            editButtons.forEach(button => button.addEventListener('click', openEditModal));
            modalCloseButtons.forEach(button => button.addEventListener('click', closeModal));

            window.submitForm = function () {
                form.submit();
            }
            
            // Filtrage par recherche
            const searchFilter = document.getElementById('search-filter');
            const productCards = document.querySelectorAll('.product-card');
            
            searchFilter.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                productCards.forEach(card => {
                    const productName = card.querySelector('.product-name').textContent.toLowerCase();
                    if (productName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
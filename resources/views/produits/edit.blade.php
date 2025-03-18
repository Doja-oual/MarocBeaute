@extends('layouts.dashboard')

@section('title', 'Modifier un produit')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Modifier un produit</h2>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('produits.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="title">Titre <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $product->title) }}" required>
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price">Prix <span class="text-danger">*</span></label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" step="0.01" min="0" required>
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="discounted_price">Prix remisé</label>
                            <input type="number" name="discounted_price" id="discounted_price" class="form-control @error('discounted_price') is-invalid @enderror" value="{{ old('discounted_price', $product->discounted_price) }}" step="0.01" min="0">
                            @error('discounted_price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="reference">Référence <span class="text-danger">*</span></label>
                        <input type="text" name="reference" id="reference" class="form-control @error('reference') is-invalid @enderror" value="{{ old('reference', $product->reference) }}" required>
                        @error('reference')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*">
                            <label class="custom-file-label" for="image">Choisir une image</label>
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="hidden" name="image" value="{{ $product->image }}">
                        <div class="mt-2">
                            <img id="image-preview" src="{{ asset('images/products/' . $product->image) }}" alt="Image du produit" style="max-height: 200px; display: block;">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="qte">Quantité <span class="text-danger">*</span></label>
                            <input type="number" name="qte" id="qte" class="form-control @error('qte') is-invalid @enderror" value="{{ old('qte', $product->qte) }}" min="0" required>
                            @error('qte')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="id_sub_catg">Sous-catégorie <span class="text-danger">*</span></label>
                            <select name="id_sub_catg" id="id_sub_catg" class="form-control @error('id_sub_catg') is-invalid @enderror" required>
                                <option value="">Sélectionner une sous-catégorie</option>
                                @foreach(\App\Models\Sub_Category::all() as $sub_category)
                                    <option value="{{ $sub_category->id }}" {{ old('id_sub_catg', $product->id_sub_catg) == $sub_category->id ? 'selected' : '' }}>
                                        {{ $sub_category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_sub_catg')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="in_stock" id="in_stock" class="custom-control-input" value="true" {{ old('in_stock', $product->in_stock) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="in_stock">En stock</label>
                        </div>
                        <small class="form-text text-muted">Si la quantité est 0, le produit sera automatiquement considéré comme hors stock.</small>
                    </div>
                    
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Aperçu de l'image
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');
            const fileLabel = document.querySelector('.custom-file-label');
            
            imageInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                    fileLabel.textContent = this.files[0].name;
                } else {
                    // Si pas de nouvelle image, afficher l'image existante
                    imagePreview.src = "{{ asset('images/products/' . $product->image) }}";
                    fileLabel.textContent = 'Choisir une image';
                }
            });
            
            // Mettre à jour l'état du stock en fonction de la quantité
            const qteInput = document.getElementById('qte');
            const inStockInput = document.getElementById('in_stock');
            
            qteInput.addEventListener('change', function() {
                if (parseInt(this.value) <= 0) {
                    inStockInput.checked = false;
                    inStockInput.disabled = true;
                } else {
                    inStockInput.disabled = false;
                }
            });
            
            // Vérifier l'état initial
            if (parseInt(qteInput.value) <= 0) {
                inStockInput.checked = false;
                inStockInput.disabled = true;
            }
        });
    </script>
@endsection
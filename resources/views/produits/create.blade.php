@extends('layouts.dashboard')

@section('title', 'Ajouter un produit')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Ajouter un produit</h2>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="title">Titre <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price">Prix <span class="text-danger">*</span></label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" step="0.01" min="0" required>
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="discounted_price">Prix remisé</label>
                            <input type="number" name="discounted_price" id="discounted_price" class="form-control @error('discounted_price') is-invalid @enderror" value="{{ old('discounted_price') }}" step="0.01" min="0">
                            @error('discounted_price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="reference">Référence <span class="text-danger">*</span></label>
                        <input type="text" name="reference" id="reference" class="form-control @error('reference') is-invalid @enderror" value="{{ old('reference') }}" required>
                        @error('reference')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*" required>
                            <label class="custom-file-label" for="image">Choisir une image</label>
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <img id="image-preview" src="#" alt="Aperçu de l'image" style="max-height: 200px; display: none;">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="qte">Quantité <span class="text-danger">*</span></label>
                            <input type="number" name="qte" id="qte" class="form-control @error('qte') is-invalid @enderror" value="{{ old('qte', 0) }}" min="0" required>
                            @error('qte')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="qte">Quantité order <span class="text-danger">*</span></label>
                            <input type="number" name="qte_order" id="qte_order" class="form-control @error('qte_order') is-invalid @enderror" value="{{ old('qte_order', 0) }}" min="0" required>
                            @error('qte_order')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    <div class="form-group col-md-6">
                            <label for="id_sub_catg">Sous-catégorie <span class="text-danger">*</span></label>
                            <select name="id_sub_catg" id="id_sub_catg" class="form-control @error('id_sub_catg') is-invalid @enderror" required>
                                <option value="">Sélectionner une sous-catégorie</option>
                                @foreach($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}" {{ old('id_sub_catg') == $sub_category->id ? 'selected' : '' }}>
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
    <label for="tags">Tags</label>
    <select name="tags[]" id="tags" class="form-control select2" multiple>   
    @foreach($tags as $tag)
            <option value="{{ $tag->id }}"
                @if(in_array($tag->id, old('tags', []))) selected @endif>
                {{ $tag->nom }}
            </option>
        @endforeach
    </select>
    <small class="form-text text-muted">Vous pouvez sélectionner plusieurs tags en maintenant la touche Ctrl enfoncée.</small>
</div>

        
<div class="form-group">
    <label for="status">Statut</label>
    <select name="status" id="status" class="form-control">
        <option value="draft" @if(old('status', $product->status ?? 'draft') == 'draft') selected @endif>Ébauche</option>
        <option value="published" @if(old('status', $product->status ?? 'draft') == 'published') selected @endif>Publié</option>
        <option value="archived" @if(old('status', $product->status ?? 'draft') == 'archived') selected @endif>Archivé</option>
    </select>
</div>

                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="in_stock" id="in_stock" class="custom-control-input" value="true" {{ old('in_stock') == 'true' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="in_stock">En stock</label>
                        </div>
                        <small class="form-text text-muted">Si la quantité est 0, le produit sera automatiquement considéré comme hors stock.</small>
                    </div>
                    
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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
                    imagePreview.style.display = 'none';
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
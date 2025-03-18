@extends('layouts.dashboard')

@section('title', 'Modifier la Sous-Catégorie')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier la Sous-Catégorie</div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('Sub_categories.update', $sub_category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $sub_category->name) }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Catégorie</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $sub_category->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" class="form-control">
                                <small class="form-text text-muted">Laissez vide pour conserver l'image actuelle</small>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if($sub_category->image)
                                <div class="form-group">
                                    <label>Image actuelle:</label>
                                    <div>
                                        <img src="{{ asset('images/' . $sub_category->image) }}" alt="{{ $sub_category->name }}" class="img-thumbnail" style="max-height: 150px;">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="{{ route('Sub_categories.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
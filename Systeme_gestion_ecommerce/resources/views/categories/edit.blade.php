@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Modifier la Catégorie</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom de la catégorie:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection

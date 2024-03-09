@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Afficher la Catégorie</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <a href="{{ route('categories.index') }}" class="btn btn-info">Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection

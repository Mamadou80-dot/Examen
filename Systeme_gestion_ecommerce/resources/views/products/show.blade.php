@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Voir le Produit</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text"><strong>Prix:</strong> {{ $product->price }}</p>
                <p class="card-text"><strong>Quantité en Stock:</strong> {{ $product->quantity }}</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection

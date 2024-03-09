@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Voir la Commande</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Commande #{{ $order->id }}</h5>
                <p class="card-text"><strong>Client:</strong> {{ $order->client->name }}</p>
                <p class="card-text"><strong>Date:</strong> {{ $order->order_date }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
                <p class="card-text"><strong>Total:</strong> {{ $order->total }}</p>
                <!-- Afficher les produits ici -->
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection

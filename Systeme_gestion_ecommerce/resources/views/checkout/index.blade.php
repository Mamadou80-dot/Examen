@extends('layouts.app')

@section('content')
    <h1>Passage à la caisse</h1>
    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="address" class="form-label">Adresse de livraison</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <h2>Votre commande</h2>
        <ul>
            @foreach ($cartItems as $item)
                <li>{{ $item->product->name }} x {{ $item->quantity }} : ${{ $item->product->price }}</li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary">Confirmer la commande</button>
    </form>
@endsection

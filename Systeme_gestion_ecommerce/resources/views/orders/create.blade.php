@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ajouter une nouvelle commande</h2>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="client_id">Client:</label>
                <select class="form-control" id="client_id" name="client_id" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="order_date">Date de la commande:</label>
                <input type="date" class="form-control" id="order_date" name="order_date" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="en attente">En attente</option>
                    <option value="expédiée">Expédiée</option>
                    <option value="livrée">Livrée</option>
                </select>
            </div>
            <!-- Vous pouvez ajouter ici d'autres champs si nécessaire -->
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection

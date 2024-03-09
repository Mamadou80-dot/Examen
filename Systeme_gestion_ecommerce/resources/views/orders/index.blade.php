@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Commandes</h2>
                <a href="{{ route('orders.create') }}" class="btn btn-primary">Ajouter une commande</a>
                <table class="table mt-3">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->client->name }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->total }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Afficher</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

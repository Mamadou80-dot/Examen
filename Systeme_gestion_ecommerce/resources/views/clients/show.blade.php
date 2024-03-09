@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Voir le Client</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $client->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
                <p class="card-text"><strong>Adresse:</strong> {{ $client->adresse }}</p>
                <p class="card-text"><strong>Téléphone:</strong> {{ $client->numerotelephone }}</p>
                <a href="{{ route('clients.index') }}" class="btn btn-primary">Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection

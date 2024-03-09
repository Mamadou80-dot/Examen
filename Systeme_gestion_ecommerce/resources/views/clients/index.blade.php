@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Clients</h2>
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Ajouter un client</a>
                <table class="table mt-3">
                    <thead>
                    <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->prenom }}</td>
                            <td>{{ $client->nom }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->adresse }}</td>
                            <td>{{ $client->numerotelephone }}</td>
                            <td>
                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">Afficher</a>
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline">
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

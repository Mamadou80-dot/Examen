@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Détails de l'Utilisateur</div>

                    <div class="card-body">
                        <p><strong>Nom:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Rôle:</strong> {{ $user->role }}</p>
                        <p><strong>Créé le:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Mis à jour le:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>

                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

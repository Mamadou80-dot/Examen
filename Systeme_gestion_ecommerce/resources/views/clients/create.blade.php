@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ajouter un nouveau client</h2>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom du client:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prenom du client:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="phone">Téléphone:</label>
                <input type="tel" class="form-control" id="numerotelephone" name="numerotelephone" required>
            </div>
            <div class="form-group">
                <label>Sexe:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="male" value="M" required>
                    <label class="form-check-label" for="male">Masculin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="female" value="F">
                    <label class="form-check-label" for="female">Féminin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="other" value="Autre">
                    <label class="form-check-label" for="other">Autre</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection

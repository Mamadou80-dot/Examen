@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Confirmation de Suppression</div>

                    <div class="card-body">
                        <p>Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.</p>
                        <form action="{{ $route }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Confirmer la Suppression</button>
                            <a href="{{ $backRoute }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

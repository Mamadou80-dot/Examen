<?php

namespace App\Http\Controllers;

use App\Models\Client; // Assurez-vous d'importer votre modèle Client
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all(); // Récupère tous les clients de la base de données
        return view('clients.index', ['clients' => $clients]); // Retourne la vue avec les clients
    }

    public function create()
    {
        return view('clients.create'); // Retourne la vue pour créer un nouveau client
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'adresse' => 'required|max:255',
            'numerotelephone' => 'required|max:255',
            'sexe' => 'required|in:M,F',
        ]); // Valide les données entrées par l'utilisateur

         Client::create($validatedData); // Crée un nouveau client avec les données validées

        return redirect('/clients')->with('success', 'Client créé avec succès.'); // Redirige vers la liste des clients avec un message de succès
    }

    public function show($id)
    {
        $client = Client::findOrFail($id); // Trouve le client par son ID ou retourne une erreur 404
        return view('clients.show', ['client' => $client]); // Retourne la vue avec le client spécifié
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id); // Trouve le client par son ID ou retourne une erreur 404
        return view('clients.edit', ['client' => $client]); // Retourne la vue pour éditer le client
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'adresse' => 'required|max:255',
            'numerotelephone' => 'required|max:255',
            'sexe' => 'required|in:M,F',
        ]); // Valide les données entrées par l'utilisateur avec des règles spécifiques

        $client = Client::findOrFail($id); // Trouve le client par son ID ou retourne une erreur 404
        $client->update($validatedData); // Supprime le // Met à jour le client avec les données validées

        return redirect('/clients')->with('success', 'Client mis à jour avec succès.'); // Redirige vers la liste des clients avec un message de succès
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id); // Trouve le client par son ID ou retourne une erreur 404
        $client->delete(); // Supprime le client

        return redirect('/clients')->with('success', 'Client supprimé avec succès.'); // Redirige vers la liste des clients avec un message de succès
    }
}

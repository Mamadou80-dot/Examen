<?php

namespace App\Http\Controllers;

use App\Models\User; // Assurez-vous d'importer votre modèle User
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     * Affiche une liste des utilisateurs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs de la base de données
        return view('users.index', ['users' => $users]); // Retourne la vue avec les utilisateurs
    }

    /**
     * Show the form for creating a new user.
     * Montre le formulaire pour créer un nouvel utilisateur.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create'); // Retourne la vue pour créer un nouvel utilisateur
    }

    /**
     * Store a newly created user in storage.
     * Enregistre un nouvel utilisateur dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]); // Valide les données entrées par l'utilisateur

        $user = User::create($validatedData); // Crée un nouvel utilisateur avec les données validées

        return redirect('/users')->with('success', 'User created successfully.'); // Redirige vers la liste des utilisateurs avec un message de succès
    }

    /**
     * Display the specified user.
     * Affiche un utilisateur spécifié.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id); // Trouve l'utilisateur par son ID ou retourne une erreur 404
        return view('users.show', ['user' => $user]); // Retourne la vue avec l'utilisateur spécifié
    }

    /**
     * Show the form for editing the specified user.
     * Montre le formulaire pour éditer un utilisateur spécifié.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Trouve l'utilisateur par son ID ou retourne une erreur 404
        return view('users.edit', ['user' => $user]); // Retourne la vue pour éditer l'utilisateur
    }

    /**
     * Update the specified user in storage.
     * Met à jour un utilisateur spécifié dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|min:6'
        ]); // Valide les données entrées par l'utilisateur avec des règles spécifiques

        User::whereId($id)->update($validatedData); // Met à jour l'utilisateur avec les données validées

        return redirect('/users')->with('success', 'User updated successfully.'); // Redirige vers la liste des utilisateurs avec un message de succès
    }

    /**
     * Remove the specified user from storage.
     * Supprime un utilisateur spécifié de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Trouve l'utilisateur par son ID ou retourne une erreur 404
        $user->delete(); // Supprime l'utilisateur

        return redirect('/users')->with('success', 'User deleted successfully.'); // Redirige vers la liste des utilisateurs avec un message de succès
    }



}

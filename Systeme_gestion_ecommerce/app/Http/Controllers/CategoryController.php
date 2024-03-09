<?php

namespace App\Http\Controllers;

use App\Models\Category; // Assurez-vous d'importer votre modèle Category
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // autres champs selon besoin
        ]);

        Category::create($validatedData);

        return redirect('/categories')->with('success', 'Catégorie créée avec succès.');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // autres champs selon besoin
        ]);

        Category::whereId($id)->update($validatedData);

        return redirect('/categories')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Catégorie supprimée avec succès.');
    }
}

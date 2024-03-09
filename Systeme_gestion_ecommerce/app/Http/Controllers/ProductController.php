<?php

namespace App\Http\Controllers;

use App\Models\Product; // Assurez-vous d'importer votre modèle Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Récupère tous les produits
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create'); // Retourne la vue pour créer un nouveau produit
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required|max:1000',
            'prix' => 'required|numeric',
            'quantite_en_stock' => 'required|numeric',
        ]);

        $product = Product::create($validatedData); // Crée un nouveau produit avec les données validées

        return redirect('/products')->with('success', 'Produit créé avec succès.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); // Trouve le produit par son ID
        return view('products.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required|max:1000',
            'prix' => 'required|numeric',
            'quantite_en_stock' => 'required|numeric',
        ]);

        Product::whereId($id)->update($validatedData);

        return redirect('/products')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produit supprimé avec succès.');
    }
}

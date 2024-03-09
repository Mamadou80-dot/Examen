<?php

namespace App\Http\Controllers;

use App\Models\Order; // Assurez-vous d'importer votre modèle Order
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all(); // Récupère toutes les commandes
        return view('orders.index', ['orders' => $orders]);
    }

    public function create()
    {
        return view('orders.create'); // Retourne la vue pour créer une nouvelle commande
    }

    public function store(Request $request)
    {
        // Ici, vous validerez et stockerez votre commande
        // La validation dépendra de la structure de vos données
        // Par exemple:
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            // Plus de champs selon votre structure
        ]);

        $order = Order::create($validatedData);

        return redirect('/orders')->with('success', 'Commande créée avec succès.');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', ['order' => $order]);
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        // La validation et la mise à jour seront similaires à `store`
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            // Plus de champs selon votre structure
        ]);

        Order::whereId($id)->update($validatedData);

        return redirect('/orders')->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('/orders')->with('success', 'Commande supprimée avec succès.');
    }
    public function validateOrder(Request $request, $orderId)
    {
        $order = Order::find($orderId);
        if (!$order) {
            return redirect()->back()->with('error', 'Commande introuvable.');
        }

        foreach ($order->products as $product) {
            if ($product->quantity < $product->pivot->quantity_ordered) {
                return redirect()->back()->with('error', "Quantité insuffisante pour le produit {$product->name}.");
            }
        }

        // Si tout est en stock, valider la commande et mettre à jour les quantités
        foreach ($order->products as $product) {
            $product->quantity -= $product->pivot->quantity_ordered;
            $product->save();
        }

        $order->status = 'validated';  // Assume 'status' est un champ de ta table des commandes
        $order->save();

        return redirect()->back()->with('success', 'La commande a été validée avec succès.');
    }

}

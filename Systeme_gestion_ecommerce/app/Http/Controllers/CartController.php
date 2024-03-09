<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Dans app/Http/Controllers/CartController.php

    public function add(Request $request, Product $product)
    {
        $user = $request->user();
        $cart = $user->cart()->where('product_id', $product->id)->first();

        if ($cart) {
            $cart->quantity += 1;
        } else {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->quantity = 1;
        }

        $cart->save();

        return redirect()->back()->with('success', 'Produit ajouté au panier.');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('success', 'Produit retiré du panier.');
    }

    public function index(Request $request)
    {
        $cartItems = $request->user()->cart;
        return view('cart.index', compact('cartItems'));
    }

}

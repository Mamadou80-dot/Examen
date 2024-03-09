<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cartItems = $request->user()->cart;
        // Assure-toi de passer toutes les informations nécessaires à la vue
        return view('checkout.index', compact('cartItems'));
    }

    //
}

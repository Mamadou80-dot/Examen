<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $clientCount = Client::count();
        $productCount = Product::count();
        $maleClientsCount = Client::where('sexe', 'M')->count();
        $femaleClientsCount = Client::where('sexe', 'F')->count();
        $orderCount=Order::count();

        return view('auth.dashboard.index', compact('clientCount', 'productCount', 'maleClientsCount','femaleClientsCount','orderCount'));
    }
}

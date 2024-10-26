<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Order;

use PHPunit\Framework\Constraint\Count;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduit = Produit::all()->count();
        $totalCategorie = Categorie::all()->count();
        $totalOrder = Order::all()->count();
        $pendingOrders = Order::where('status', 'En attente')->count();
        $completedOrders = Order::where('status', 'Terminé')->count();
        $cancelledOrders = Order::where('status', 'Annulé')->count();


        return view('dashboard', compact('totalProduit','totalCategorie','totalOrder','pendingOrders',
                                            'completedOrders','cancelledOrders'));
    }

    public function indexClient()
    {

        return view('dashboard_client');
    }
}

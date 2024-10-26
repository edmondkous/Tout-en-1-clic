<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Produit;
use App\Models\User;


class OrderController extends Controller
{

    public function store(Request $request)
    {
        // Vérifiez si l'utilisateur est connecté
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour passer une commande.');
        }

        // Récupérer les articles du panier
        $cartItems = Cart::instance('cart')->content();

        // Vérifiez si le panier est vide
        if ($cartItems->isEmpty()) {
            return redirect()->route('shops.boutique')->with('error', 'Votre panier est vide.');
        }

        // Créer la commande
        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => 'En attente',
            'total' => 0, // Calculer le total plus tard
        ]);

        // Calculer le total et attacher les produits à la commande
        $total = 0;

        foreach ($cartItems as $item) {
            $produit = Produit::find($item->id);
            $order->produits()->attach($produit->id, ['qty' => $item->qty]);
            $total += $produit->prix * $item->qty;
        }

        // Mettre à jour le total de la commande
        $order->update(['total' => $total]);

        // Vider le panier après la commande
        Cart::instance('cart')->destroy();

        // Rediriger avec un message de succès
        return redirect()->route('shops.boutique')->with('success_message', 'Votre commande a été enregistrée avec succès. Merci !');
    }
    // afficher la commande
    public function index()
    {
    // Récupérer les commandes avec les utilisateurs et les produits
    $orders = Order::with(['user', 'produits'])
        ->orderBy('created_at', 'desc')  // Trier par date de création
        ->paginate(10); // Chargement des produits avec la relation 'produits'

    return view('orders.index', compact('orders'));

    }

    public function pending()
    {
        $pendingOrders = Order::where('status', 'En attente')
            ->orderBy('created_at', 'desc')  // Trier par date de création
            ->paginate(10);
        return view('orders.attente', compact('pendingOrders'));
    }

    public function success()
    {
        $completedOrders = Order::where('status', 'Terminé')
        ->orderBy('created_at', 'desc')  // Trier par date de création
            ->paginate(10);
        return view('orders.termine', compact('completedOrders'));
    }

    public function cancel()
    {
        $cancelledOrders = Order::where('status', 'Annulé')
        ->orderBy('created_at', 'desc')  // Trier par date de création
            ->paginate(10);
        return view('orders.annule', compact('cancelledOrders'));
    }

    // changer le status de la commande
    public function updateStatus(Request $request, Order $order)
    {
        // $request->validate(['status' => 'required|string|in:En attente,Terminé,Annuler']);
        // $order->update(['status' => $request->status]);


            // Validation de la requête
        $request->validate([
            'status' => 'required|string|in:En attente,Terminé,Annulé'
        ]);

        // Mise à jour du statut
        $order->status = $request->status;
        $order->save();

        // Retour d'une réponse
        return redirect()->back()->with('message', 'Statut mis à jour avec succès.');
    }

    // public function show($userId)
    // {
    //     // Récupérer l'utilisateur et ses commandes
    //     $user = User::with('orders')->findOrFail($userId);

    //     return view('orders.show', compact('user'));
    // }


}

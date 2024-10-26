<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Order;

use Illuminate\Http\Request;
use Cart;
use App\Http\Controllers\ProduitController;
use App\Http\Requests\StoreProduitRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('carts.index', ['cartItems'=>$cartItems]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $produit = Produit::find($request->id);
        Cart::instance('cart')->add($produit->id, $produit->nom_prod, $request->quantity, $produit->prix)
                ->associate('\App\Models\Produit');
                return redirect()->route('shops.pageShop')->with('success','Le produit a été ajouté au panier.');
    }

    public function increment($rowId)
    {

        $produit = Cart::instance('cart')->get($rowId); // Récupère l'élément du panier avec le rowId
        if ($produit->qty < 25) {
            Cart::instance('cart')->update($rowId, ['qty' => $produit->qty +1]); // Décrémente la quantité du produit par 1
        }
        return redirect()->route('cart.index');
    }

    public function decrement($rowId)
    {

        $produit = Cart::instance('cart')->get($rowId); // Récupère l'élément du panier avec le rowId
        if ($produit->qty > 1) {
            Cart::instance('cart')->update($rowId, ['qty' => $produit->qty - 1]); // Décrémente la quantité du produit par 1
        }
        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Cart::instance('cart')->update($request->rowId, $request->quantity);
        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return back()->with('success','Vous avez retirer ce produit');

    }

}

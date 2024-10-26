<?php

namespace App\Http\Controllers;
use App\Models\Marque;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\StoreProduitRequest;


class ProduitController extends Controller
{

    public function index(){
        // dd(Cart::content());
        $produits = Produit::paginate(5);

        return view('produits.index', compact('produits'));
    }

    public function create(){

        $categories = Categorie::All();
        $marques = Marque::All();

        return view('produits.create', compact('categories','marques'));
    }

    public function store(Request $request)
    {
    // Valider les données du formulaire
    $produits = $request->validate([
        'nom_prod' => 'required',
        'slug' => 'required',
        'prix' => 'required',
        'qty' => 'required',
        'description' => 'required',
        'categorie_id' => 'required',
        'marque_id' => 'required',
        'image' => 'required|image', // Assurez-vous que l'image est un fichier d'image valide
    ]);

    // Gérer le téléchargement de l'image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('public/produits', $imageName);
        $produits['image'] = $imageName;
    }

    // Créer une instance de Produit avec les données validées
    $product= Produit::create($produits);
    if($product){
        // Rediriger avec un message de succès
        return redirect()->route('produits.create')->with('success', 'Produit enregistré avec succès');
    }else{
        return redirect()->route('produits.create')->with('error', 'Error');

    }


    }

    public function edit(Produit $produit )
    {
        $categories =Categorie::all();
        $marques =Marque::all();
        return view('produits.edit', compact('produit','categories','marques'));
    }

    public function update(Request $request, $id)
    {
        $produits =Produit::find($id);

        if ($request->hasFile('image')) {


            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/produits', $imageName);
            $produits['image'] = $imageName;
        }
        $produits->nom_prod = $request->nom_prod;
        $produits->slug = $request->slug;
        $produits->categorie_id = $request->categorie_id;
        $produits->marque_id = $request->marque_id;
        $produits->prix = $request->prix;
        $produits->qty = $request->qty;
        $produits->description = $request->description;

        $produits->update();
            return redirect()->route('index.produits')->with('success','Le produit a été modifié avec succès. Merci!');

    }

    public function delete(Produit $produit)
    {
        try{

            $produit->delete();
                return redirect()->route('index.produits')->with('message_delete','Le produit a été supprimé avec succès. Merci!');
        }catch(Exception $e){
            dd($e);
        }
    }

    public function updateD(Request $request, $id)
    {
        $produits =Produit::find($id);

        $produits->nom_prod = $request->nom_prod;
        $produits->slug = $request->slug;
        $produits->categorie_id = $request->categorie_id;
        $produits->marque_id = $request->marque_id;
        $produits->prix = $request->prix;
        $produits->qty = $request->qty;
        $produits->description = $request->description;

        $produits->update();
            return redirect()->route('index.produits')->with('success','Le produit a été modifié avec succès. Merci!');

    }



    public function pageShop()
    {
        $produits = Produit::orderBy('id', 'desc')->paginate(9);
            return view('shops.pageShop', compact('produits'));
    }

    public function boutique()
    {
        $produits = Produit::orderBy('id', 'desc')->paginate(9);
        $categories = Categorie::all();
            return view('shops.boutique', compact('produits','categories'));
    }

        //vue par categorie
    public function viewBycategory(Request $request)
    {
        $produits = Produit::where('categorie_id', $request->id)->get();
        $categories = Categorie::all();
        return view('shops.viewBycategory', compact('produits','categories'));
    }

    public function detailShop($id)
    {
        $produits = Produit::where('id', $id)->first();
        $categories = Categorie::all();
        $marques = Marque::all();

        return view('shops.detailShop', compact('produits','marques'));
    }

    public function filtrePrix(Request $request)
    {
        $produits = Produit::query();
        $categories = Categorie::all();


        // Vérifiez si des filtres de prix ont été appliqués
        if ($request->filled('min_price')) {
            $produits->where('prix', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $produits->where('prix', '<=', $request->input('max_price'));
        }

        $filteredProducts = $produits->get();

        return view('shops.filtrePrix', ['produits' => $filteredProducts, 'categories'=>$categories]);
    }

}

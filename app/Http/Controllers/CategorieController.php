<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieRequest;
use App\Models\Categorie;

use Illuminate\Http\Request;



class CategorieController extends Controller
{
    public function index(){

        $categories = Categorie::paginate(10);

        return view('categories.index', compact('categories'));
    }

    // public function viewcategorie(){

    //     $categories = Categorie::all();

    //     return view('shops.viewBycategory', compact('categories'));
    // }

    public function create(){

        return view('categories.create');
    }

    // public function generateQRCode()
    // {
    //     // Récupérer toutes les catégories
    //     $categories = Categorie::all();

    //     // Parcourir chaque catégorie
    //     foreach ($categories as $categorie) {
    //         // Générer le contenu à encoder dans le code QR (dans cet exemple, le nom de la catégorie)
    //         $content = $categorie->nom_cat;

    //         // Générer le code QR pour le contenu et récupérer les données base64 de l'image
    //         $qrCodeData = base64_encode(QrCode::format('png')->size(200)->generate($content));

    //         // Assigner les données du code QR à la catégorie actuelle
    //         $categorie->qrCode = $qrCodeData;
    //     }

    //     // Retourner la vue avec les catégories et les codes QR générés
    //     return view('categories.index', compact('categories'));

    // }

    public function store( StoreCategorieRequest $request)
    {
        $query= Categorie::create($request->all());

        if($query) {
            return redirect()->route('categories.create')->with('success_message','Valider avec succès. merci!');
        }
    }

    public function delete(Categorie $categorie)
    {
        try{

            $categorie->delete();
            return redirect()->route('categories.index')->with('delete_message','Supprimer avec succès');
        }catch(Exception $e){
            dd($e);
        }
    }

    public function edit(Categorie $categorie )
    {
        return view('categories.edit', compact('categorie'));
    }

    public function update(Categorie $categorie , StoreCategorieRequest $request)
    {
        try{
            $categorie->nom_cat = $request->nom_cat;
            $categorie->update();
            return redirect()->route('categories.index')->with('success_message','la categorie a été modifiée avec succès');
        }catch(Exception $e){
            dd($e);
    }

}


}




<?php

namespace App\Http\Controllers;
use App\Models\Marque;
use App\Http\Requests\StoreMarqueRequest;

use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index(){

        $marques = Marque::paginate(5);

        return view('marques.index', compact('marques'));
    }

    public function create(){

        return view('marques.create');
    }

    public function store( StoreMarqueRequest $request)
    {
        $query= Marque::create($request->all());

        if($query) {
            return redirect()->route('marques.create')->with('success_message','Valider avec succès. merci!');
        }
    }

    public function delete(Marque $marque)
    {
        try{

            $marque->delete();
            return redirect()->route('marques.index')->with('delete_message','Supprimer avec succès');
        }catch(Exception $e){
            dd($e);
        }
    }

    public function edit(Marque $marque )
    {
        return view('marques.edit', compact('marque'));
    }

    public function update(Marque $marque , StoreMarqueRequest $request)
    {
        try{
            $marque->nom = $request->nom;
            $marque->update();
            return redirect()->route('marques.index')->with('success_message','la marque a été modifiée avec succès');
        }catch(Exception $e){
            dd($e);
    }

}


}




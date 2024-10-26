<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registerClient(){
        return view('auth.registerClient');
    }

    public function login(){
        return view('auth.login');
    }

    Public function registerPost(Request $request)
    {
        $check_email = User::where('email', $request->email)->first();

        if ($check_email) {
            return back()->with('error', 'Cet email existe déjà');
        }

        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
        $input = $request->all();

            User::create($input);

            return redirect('login')->with('success','Votre compte a été crée avec succès');
    }

    Public function registerPostClient(Request $request)
    {
        $check_email = User::where('email', $request->email)->first();

        if ($check_email) {
            return back()->with('error', 'Cet email existe déjà');
        }

        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
        $input = $request->all();

            User::create($input);

            return redirect('login')->with('success','Votre compte a été crée avec succès');
    }

    Public function loginPost(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $user = Auth::user();
                return redirect()->route('shops.boutique')->with('success', 'Vous êtes connecté en tant qu\' un Client');

            // if($user->role === 'Admin'){
            //     return redirect()->route('dashboard')->with('success', 'Vous êtes connecté en tant qu\'un Administrateur');
            // } elseif($user->role === 'Client'){
            //     return redirect()->route('client_dashboard')->with('success', 'Vous êtes connecté en tant qu\' un Client');
            // }
        }
        return back()->with('error', 'Connexion échouée');
    }
}

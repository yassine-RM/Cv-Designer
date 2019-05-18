<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //----------------constructor
    public function __construct()
    {



    }
    //--------------------affecher la vue login.blade.php
    public function login()
    {
        return view('pages.auth.login');
    }
    //-------------------verifier login et le mot de passe
    public function verifierLogin(Request $request)
    {

        $email = $request->Email;
        $password = $request->Password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        } else {

            session()->flash('errorLogin', 'login ou mot passe incorrect !!!');
            return redirect()->back();
        }

        return view('pages.auth.login');
    }

    //--------------------afficher la vue register.blade.php
    public function register()
    {
        $jsonString = file_get_contents(base_path() . '/public./json/country.json');

        $data = json_decode($jsonString, true);
        return view('pages.auth.register', ['data' => $data]);
    }
    //--------------------get payes-------------------
    public function getPayes()
    {
        $jsonString = file_get_contents(base_path() . '/public./json/country.json');

        $data = json_decode($jsonString, true);

        return response()->json(['payes' => $data]);

    }
    //-------------------------get villes ---------------------------
    public function getVilles($paye)
    {

        $jsonString = file_get_contents(base_path() . '/public./json/country.json');

        $data = json_decode($jsonString, true);
        foreach ($data as $value) {

            if ($paye == $value['paye']) {

                $villes = $value['villes'];

                return response()->json(['villes' => $villes, 'paye' => $paye]);
            }
        }
        return response()->json(['villes' => ""]);

    }
    //---------------------store les information dans labase de donnée
    public function store(UserRequest $request)
    {
        $user = new User();

        $user->civilite = $request->Civilite;
        $user->nom = $request->Nom;
        $user->prenom = $request->Prenom;
        $user->ville = $request->Ville;
        $user->paye = $request->Paye;
        $user->telephonne = $request->Telephonne;
        $user->adresse = $request->Adresse;

        $user->dateNaissance = $request->DateNaissance;

        $user->photo = $request->file('Photo')->store('images', 'public');

        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);

        $user->save();

        Auth::login($user);

        return redirect('/login');
    }
    //------------------Profile------------------
     public function getProfile()
    {
     $jsonString = file_get_contents(base_path() . '/public./json/country.json');

        $data = json_decode($jsonString, true);
       return view('pages.modifierProfile',['data'=>$data]);
    }
     public function updateProfile(Request $request)
    {

        $request->validate([

            'civilite' => 'required',
            'nom' => 'required|min:3|max:30',
            'prenom' => 'required|min:3|max:30',
            'ville' => 'required',
            'paye' => 'required',
            'dateNaissance' => 'required',
            'adresse' => 'required|min:1',
            'telephonne' => 'required|min:10|max:10',
            'email' => 'required|email',
            'password' => 'required|min:8',

        ]);

       $user =User::find(Auth::user()->id);

        $user->civilite = $request->civilite;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->ville = $request->ville;
        $user->paye = $request->paye;
        $user->telephonne = $request->telephonne;
        $user->adresse = $request->adresse;
     
          
            $user->photo = $request->file('photo')->store('images', 'public');
      

        $user->dateNaissance = $request->dateNaissance;


        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        $request->session()->flash('profileSuccess','la mises à jour de votre cv a été fait avec succée');
        return redirect('getProfile');


    }
    //-------------------logout----------
    public function logOut()
    {
        Auth::logout();
        return redirect('/login');
    }
}

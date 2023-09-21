<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class personnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnals = Utilisateur::where('role', 'Directeur')
        ->orWhere('role', 'Censeur')
        ->get();


        return view('personnals', [
            'personnals' => $personnals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-personnal');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {


        // $inspections = Validator::make($request->all(), [
        //     'matricule' => 'required|max:255',
        //     'nom' =>'required|max:255',
        //     'prenom' =>'required|max:255',
        //     'dateNaissance' =>'required|max:255',
        //     'lieuNaissance' =>'required|max:255',
        //     'sexe' =>'required|max:255',
        //     'adresse' =>'required|max:255',
        //     'telephone' =>'required',
        //     'email' => 'required|email|unique:utilisateurs,email',
        //     'password' => 'required|min:8',
        //     'role' => 'required|max:255',
        //     'photo' => 'required|mimes:jpg,png,jpeg',
        // ]);
        // if($inspections->fails()){
        //     dd($inspections->errors());
        // }



        $validateData = $request->validate([
            'matricule' => 'required|max:255',
            'nom' =>'required|max:255',
            'prenom' =>'required|max:255',
            'dateNaissance' =>'required|max:255',
            'lieuNaissance' =>'required|max:255',
            'sexe' =>'required|max:255',
            'adresse' =>'required|max:255',
            'telephone' =>'required',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|min:8',
            'role' => 'required|max:255',
            'photo' => 'required|mimes:jpg,png,jpeg'

]);



    $path_photo = Storage::putFile('public/photos', $request->photo);
        $path_photo_convert_to_table = explode('/', $path_photo);

        if($request->has('photo'))
        {
            $path_photo = Storage::putFile('public/photos', $request->photo);
            $path_photo_convert_to_table = explode('/', $path_photo);
        }

 $superAdmin = Utilisateur::create([
    'matricule' => $request->matricule,
    'nom' => $request->nom,
    'prenom' => $request->prenom,
    'dateNaissance' => $request->dateNaissance,
    'lieuNaissance' => $request->lieuNaissance,
    'sexe' => $request->sexe,
    'adresse' => $request->adresse,
    'telephone' => $request->telephone,
    'email' => $request->email,
    'role' => $request->role,
    'password' => $request->password,
    'photo' => $request->has('photo') ? $path_photo_convert_to_table[2] : null,
    'statut' => true,
]);

    return redirect('/personnals');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $utilisateur = Utilisateur::where('id', (int) $id)->first();

        return view('editperso', compact('utilisateur'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'matricile' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'dateNaissance' => 'required|string|max:255',
            'lieuNaissance' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'role' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'photo' => 'required|mimes:jpg,png,jpeg'

        ]);

        $utilisateur = Utilisateur::where('id', (int) $id)->first();

        $path_photo = Storage::putFile('public/photos', $request->photo);
        $path_photo_convert_to_table = explode('/', $path_photo);

        if($request->has('photo'))
        {
            $path_photo = Storage::putFile('public/photos', $request->photo);
            $path_photo_convert_to_table = explode('/', $path_photo);
        }

    $utilisateur->matricule =  $request->matricule;
    $utilisateur->nom =  $request->nom;
    $utilisateur->prenom =  $request->prenom;
    $utilisateur->dateNaissance =  $request->dateNaissance;
    $utilisateur->lieuNaissance=  $request->lieuNaissance;
    $utilisateur->sexe =  $request->sexe;
    $utilisateur->adresse =  $request->adresse;
    $utilisateur->telephone =  $request->telephone;
    $utilisateur->email =  $request->email;
    $utilisateur->role =  $request->role;
    $utilisateur->password =  $request->password;
    $utilisateur->photo =  $request->photo;


    $utilisateur->save();


    return redirect()->route('personnals.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function activerOuDesactiver(Request $request)
    {
        $id = $request->input('id');
        $action = $request->input('action');

        // Obtenez l'élément correspondant depuis votre modèle (changez "VotreModel" par le nom de votre modèle réel)
        $element = Utilisateur::find($id);

        if (!$element) {
            return response()->json(['message' => 'Élément introuvable'], 404);
        }

        // Mettez en place la logique pour activer ou désactiver l'élément
        if ($action === 'activer') {
            $element->active = true;
        } elseif ($action === 'desactiver') {
            $element->active = false;
        }

        $element->save();

        // Répondez à la demande Ajax avec une réponse JSON (par exemple, indiquer le succès de l'opération)
        return response()->json(['message' => 'Opération réussie'], 200);
    }
    /*
            public function deactivate(Utilisateur $utilisateur)
        {
            $utilisateur->update(['disable' => false]);
            return redirect()->route('personnals.index')->with('success', 'User deactivated successfully');
        }

        public function activate(Utilisateur $utilisateur)
        {
            $utilisateur->update(['active' => true]);
            return redirect()->route('personnals.index')->with('success', 'User activated successfully');
        }
*/
}

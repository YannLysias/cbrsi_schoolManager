<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UtilisateurController extends Controller
{

    public function createSuperAdminAccount(Request $request)
    {
        $superAdmin = Utilisateur::where('role', 'Super Administrateur')->first();

        if($superAdmin)
        {
            return response()->json([
                'data' => $superAdmin,
                'message' => "L'administrateur avait déja été enregistrer"
            ]);
        }

        $superAdmin = Utilisateur::create([
            'matricule' => '2001201204501',
            'nom' => 'Guy',
            'prenom' => 'KPEDJO',
            'dateNaissance' => '22/01/2002',
            'lieuNaissance' => 'COTONOU',
            'sexe' => 'Masculin',
            'adresse' => 'etoile-rouge',
            'telephone' => '54103099',
            'email' => 'gkpedjo@gmail.com',
            'role' => 'Super Administrateur',
            'password' => 'original22',
            'photo' => 'Yann.jpg'
        ]);

        return response()->json([
            'data' => $superAdmin,
            'message' => 'Le super administrateur a été enregistré avec succès'
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){




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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

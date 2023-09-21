<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;

class infoEcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = Etablissement::all();
        return view('infoEcoles', [
            'schools' => $schools,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-school');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([

            'matricule' =>'required|max:255',
            'nom' =>'required|max:255',
            'type' => 'required|max:255',
            'email' =>'required|max:255',
            'telephone' =>'required|max:255',
        ]);

        $utilisateur = Etablissement::create([

            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'type' => $request->type,
            'email' => $request->email,
            'telephone' => $request->telephone,

        ]);

        return redirect('/infoEcoles');
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

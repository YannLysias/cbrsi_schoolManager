<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Salle;
use Illuminate\Http\Request;

class matiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listeMatieres($salle_id)
    {
        $matieres = Matiere::where('salle_id', $salle_id)->get();

        return view('listeMatieres', compact('matieres'));
    }


    public function index()
    {
        $matieres = Matiere::all();
        return view('matieres', [
            'matieres' => $matieres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salles = Salle::all();
        return view('add-matiere', [
            'salles' => $salles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([

            'code' =>'required|max:255',
            'nom' =>'required|max:255',
            'coef' =>'required|max:255',
            'salle_id' =>'required|max:255',
        ]);

        $salle =Salle::findOrFail(intval($request->salle_id));

        $matiere = Matiere::create([

            'code' => $request->code,
            'nom' => $request->nom,
            'coef' => $request->coef,
            'salle_id' => $salle->id,
        ]);

        return redirect('/matieres');


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

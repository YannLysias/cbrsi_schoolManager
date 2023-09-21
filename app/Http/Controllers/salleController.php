<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class salleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::all();
        return view('salles', [
            'salles' => $salles,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-salle');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([

            'num' =>'required|max:255',
            'nom' =>'required|max:255',

    ]);

$salles = Salle::create([

    'num' => $request->num,
    'nom' => $request->nom,

]);



    return redirect('/salles');
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
        $salles =Salle::where('id', (int) $id)->first();

        return view('editsalle', compact('salles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'num' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
        ]);
        $salles = Salle::where('id', (int) $id)->first();

        $salles->nom =  $request->nom;
        $salles->num =  $request->num;

        $salles->save();


    return redirect()->route('salles.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

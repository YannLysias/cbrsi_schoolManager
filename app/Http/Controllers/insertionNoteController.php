<?php

namespace App\Http\Controllers;

use App\Models\eleve;
use App\Models\Matiere;
use App\Models\note;
use App\Models\Salle;
use Illuminate\Http\Request;

class insertionNoteController extends Controller
{

    /**
     * Display a listing of the resource.
     */

     public function bulletins($eleve_id)
     {
         $salle = Salle::whereHas('eleve', function($query) use($eleve_id){
             $query->where('id', (int) $eleve_id);
         })->first();


         $matieres = Matiere::where('salle_id', $salle->id)->get();

         $eleve = Eleve::find($eleve_id);

         //$notes = note::all();

         // Initialisez un tableau pour stocker les moyennes par matière
    $moyennes = [];

    foreach ($matieres as $matiere) {
        $interrogations = $matiere->interrogations;
        $sommeInterrogations = $interrogations->sum('valeur');
        $nombreInterrogations = $interrogations->count();


        // Calculez la moyenne pour cette matière
        $moyenneMatiere = ($nombreInterrogations > 0) ? ($sommeInterrogations / $nombreInterrogations) : 0;


        // Stockez la moyenne dans le tableau des moyennes
        $moyennes[$matiere->id] = $moyenneMatiere;
    }


         return view('bulletins', [
            'matieres' => $matieres,
            'eleve_id' => $eleve_id,
            'eleve' => $eleve,
            'moyennes' => $moyennes,

         ]);
    }

    public function index($eleve_id)
    {
        $salle = Salle::whereHas('eleve', function($query) use($eleve_id){
            $query->where('id', (int) $eleve_id);
        })->first();

        $matieres = Matiere::where('salle_id', $salle->id)->get();

        // Initialisez un tableau pour stocker les moyennes par matière
    $moyennes = [];

    foreach ($matieres as $matiere) {
        $interrogations = $matiere->interrogations;
        $sommeInterrogations = $interrogations->sum('valeur');
        $nombreInterrogations = $interrogations->count();


        // Calculez la moyenne pour cette matière
        $moyenneMatiere = ($nombreInterrogations > 0) ? ($sommeInterrogations / $nombreInterrogations) : 0;


        // Stockez la moyenne dans le tableau des moyennes
        $moyennes[$matiere->id] = $moyenneMatiere;
    }


        $eleve = Eleve::find($eleve_id);

        //$notes = note::all();

        return view('insertionNotes', [
            'matieres' => $matieres,
            'eleve_id' => $eleve_id,
            'eleve' => $eleve,
            'moyennes' => $moyennes,

            ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($eleve_id)
    {

        $salle = Salle::whereHas('eleve', function($query) use($eleve_id){
            $query->where('id', (int) $eleve_id);
        })->first();

        $matieres = Matiere::where('salle_id', $salle->id)->get();

        $eleves = eleve::all();

        return view('add-note', [
            'eleve_id' => $eleve_id,
            'matieres' => $matieres,
            'eleves' => $eleves,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([

            'type' =>'required|max:255',
            'valeur' =>'required|max:255',
            'matiere_id' =>'required|max:255',
            'eleve_id' =>'required|max:255',
            ]);

            //$eleve = eleve::where('id', $eleve_id);

            //$eleve = eleve::find($eleve_id);

            $notes = note::create([

                'type' => $request->type,
                'valeur' => $request->valeur,
                'matiere_id' => $request->matiere_id,
                'eleve_id' => $request->eleve_id,


            ]);
           return redirect('insertionNotes/' . $request->eleve_id);


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

<?php

namespace App\Http\Controllers;

use App\Models\eleve;
use App\Models\Salle;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function listeStudents($salle_id)
     {
         $eleves = eleve::where('salle_id', $salle_id)->get();

         return view('listeStudents', compact('eleves'));
     }


    public function index()
    {
        $students = eleve::all();
        return view('students', [
            'students' => $students,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salles = salle::all();
        return view('add-student', [
            'salles' => $salles,
        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([

            'numMatricule' =>'required|max:255',
            'numEduMaster' =>'required|max:255',
            'status' => 'required|max:255',
            'statut' => 'required|max:255',
            'salle_id' =>'required|max:255',


            'nom' =>'required|max:255',
            'prenom' =>'required|max:255',
            'dateNaissance' =>'required|max:255',
            'lieuNaissance' =>'required|max:255',
            'sexe' =>'required|max:255',
            'adresse' =>'required|max:255',
            'telephone' =>'required',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|min:8',


            'photo' => 'required|mimes:jpg,png,jpeg',



    ]);


    $path_photo = Storage::putFile('public/photos', $request->photo);
        $path_photo_convert_to_table = explode('/', $path_photo);

        if($request->has('photo'))
        {
            $path_photo = Storage::putFile('public/photos', $request->photo);
            $path_photo_convert_to_table = explode('/', $path_photo);
        }

    $salle =Salle::findOrFail(intval($request->salle_id));

$utilisateur = Utilisateur::create([
    'matricule' => 'Null',
    'nom' => $request->nom,
    'prenom' => $request->prenom,
    'dateNaissance' => $request->dateNaissance,
    'lieuNaissance' => $request->lieuNaissance,
    'sexe' => $request->sexe,
    'adresse' => $request->adresse,
    'telephone' => $request->telephone,
    'email' => $request->email,
    'role' => 'Eleve',
    'statut' => true,
    'password' => $request->password,
    'photo' => $request->has('photo') ? $path_photo_convert_to_table[2] : null,

]);



 $students = eleve::create([

    'numMatricule' => $request->numMatricule,
    'numEduMaster' => $request->numEduMaster,
    'status' => $request->status,
    'statut' => $request->statut,
    'salle_id' => $salle->id,
    'utilisateur_id' =>  $utilisateur->id,

]);

    return redirect('/students');
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
        $students =eleve::where('id', (int) $id)->first();
        $salles = $students->Salle;
        return view('editstudent', compact('students', 'salles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'numMatricule' =>'required|max:255',
            'numEduMaster' =>'required|max:255',
            'status' => 'required|max:255',
            'statut' => 'required|max:255',
            'salle_id' =>'required|max:255',

            'nom' =>'required|max:255',
            'prenom' =>'required|max:255',
            'dateNaissance' =>'required|max:255',
            'lieuNaissance' =>'required|max:255',
            'sexe' =>'required|max:255',
            'adresse' =>'required|max:255',
            'telephone' =>'required',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|min:8',


            'photo' => 'required|mimes:jpg,png,jpeg',

        ]);

        $salle =Salle::findOrFail(intval($request->salle_id));

        $students = eleve::where('id', (int) $id)->first();

        $students->nonumMatriculem =  $request->numMatricule;
        $students->numEduMaster =  $request->numEduMaster;
        $students->status =  $request->status;
        $students->statut =  $request->statut;
        $students->salle_id =  $salle->id;

        $students->nom =  $request->nom;
        $students->prenom =  $request->prenom;
        $students->dateNaissance =  $request->dateNaissance;
        $students->lieuNaissance =  $request->lieuNaissance;
        $students->sexe =  $request->sexe;
        $students->adresse =  $request->adresse;
        $students->status =  $request->status;
        $students->telephone =  $request->telephone;
        $students->email =  $request->email;
        $students->password =  $request->password;
        $students->photo =  $request->photo;

        $students->save();

        return redirect()->route('students.index')->with('success', 'Modifier avec success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

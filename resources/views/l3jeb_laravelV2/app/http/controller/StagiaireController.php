<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $stagiaire = Stagiaire::find(1);
        // foreach ($stagiaire->modules as $module) {
        //     echo $module->pivot->note; // Access the pivot data
        // }
        $stagiaires = Stagiaire::all();
        return view("CRUD3.Stagiaire.stagiaires_list", compact("stagiaires"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupes = Group::all();
        return view('CRUD3.stagiaire.ajouter', compact('groupes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group = Group:: find($request->group_id);
        $stg = new Stagiaire;
        $stg->nom = $request->nom;
        $stg->prenom = $request->prenom;
        $stg->age = $request->age;
        $group->Stagiaires()->save($stg);

        return redirect()->route('stagiaires.index')->with('success','stagiaire have been added succedded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = Group::findOrFail($id);
        $stagiaires = $group->Stagiaires;
        return view("CRUD3.Stagiaire.stagiaires_list", compact("stagiaires", "group"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stagiaire = Stagiaire::find($id);
        $groupes = Group::all();
        return view('CRUD3.stagiaire.modifier', compact('stagiaire', 'groupes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stg = Stagiaire::find($id);
        $stg->nom = $request->nom;
        $stg->prenom = $request->prenom;
        $stg->age = $request->age;
        $stg->group_id = $request->group_id;
        $new_group = Group::find($request->group_id);
        if (!$new_group->is($stg->group)) {
            $stg->filiere()->associate($new_group);   
        }
        $stg->save();
        return redirect()->route('stagiaires.index')->with('success','you have updated stagiaire successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stagiaire = Stagiaire::find($id);
        $stagiaire->delete();

        return redirect()->route('stagiaires.index')->with('success','');

    }
}

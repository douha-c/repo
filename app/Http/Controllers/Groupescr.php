<?php

namespace App\Http\Controllers;
use App\Models\Groupe;
use Illuminate\Http\Request;

class Groupescr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $res = Groupe::All();
        return view('groupe', ['groupe' => $res]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajoutergroupes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $m=new Groupe;
        $m->nom=$request['nom'];
        $m->save();
        return redirect()->route('groupes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $res=Groupe::find($id);
        return view('stgshow', ['groupe' => $res->stagiaires]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $res=Groupe::find($id);
        return view('formmodifiergroupe', ['groupe' => $res]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $g= Groupe::find($id);
        $g->nom=$request->nom;
        $g->save();
        return redirect()->route('groupes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo $id;
        $q = Groupe::find($id);
        $q->delete();
        //return redirect()->route('groupes.index');
        
    }
}

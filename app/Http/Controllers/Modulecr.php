<?php

namespace App\Http\Controllers;
use App\Models\Module;
use App\Models\Representant;
use Illuminate\Http\Request;

class Modulecr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res=Module::all();
        //$res = Module::find(35);
        //$res->stagiaires()->attach(1, ['note' => 15]);
        //$res->stagiaires()->updateExistingPivot(1, ['note' => 19]);
        //$res->stagiaires()->detach(1);
        //return $res->stagiaires[0]->pivot->note;
        //return $res->stagiaires;
        return view('module', ['module' => $res]);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()   
    {
        return view('formajoutermodule');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'imag' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time().'.'.$request->imag->extension();  
        $request->imag->move(public_path('images'), $imageName);
        $m=new Module;
        $m->code=$request['code'];
        $m->titre=$request->titre;
        $m->masse=$request['horaire'];
        $m->imag=$imageName;
        $m->save();
        $r=new Representant;
        $r->nom=$request['nom_re'];
        $r->prenom=$request->prenom_re;
        $r->grade=$request['grade'];
        $r->module_id=$request['module_id'];
        $m->representant()->save($r);
        return redirect()->route('modules.index');
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
        $res=Module::find($id);
        return view('formmodifiermodule', ['module' => $res]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $m=Module::find($id);
        $m->code=$request['code'];
        $m->titre=$request['titre'];
        $m->masse=$request['horaire'];
        $m->imag=$request['imag'];
        $m->representant->nom=$request['nom_re'];
        $m->representant->prenom=$request['prenom_re'];
        $m->representant->grade=$request['grade'];
        $m->representant->module_id=$request['module_id'];
        $m->save();
        return redirect()->route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $m = Module::find($id);
        $m->representant->delete();
        $m->delete();
        return redirect()->route('modules.index');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Stagiaire;
use App\Models\Groupe;
use Illuminate\Http\Request;
        use App\Notifications\InvoicePaid;
        use App\Notifications\RegisteredNotification;
use App\Models\User;
class Stagiairescr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$res=Stagiaire::All();
        $res=Stagiaire::with('groupe')->get();
        return $res;
        //return view('stagiaire',['stagiaire'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajouterstagiaire');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $g=Groupe::find($request->groupe);
        $s=new Stagiaire;
        $s->nom=$request->nom;
        $s->prenom=$request->prenom;
        $s->email=$request->email;
        $s->date_naissance=$request->date;
        $s->note=$request->note;
        $s->ville=$request->ville;
        $s->groupe_idM=$request->groupe;
        $g->stagiaires()->save($s);
        return redirect()->route('stagiaires.index');
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
        $res=Stagiaire::find($id);
        return view('modstagiaire',['stagiaire'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $s=Stagiaire::find($id);
        $s->nom=$request->nom;
        $s->prenom=$request->prenom;
        $s->email=$request->email;
        //$s->date_naissance=$request->date;
        $s->note=$request->note;
        //$s->ville=$request->ville;
        $s->groupe_idM=$request->groupe;
        $s->save();
 
        // Find the user
        $user = User::find(1);        
        // Send the notification
        $user->notify(new RegisteredNotification());
        return redirect()->route('stagiaires.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $s=Stagiaire::find($id);
        $s->delete();
        return redirect()->route('stagiaires.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Note;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("CRUD3.Note.ajouter");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stagiaire = Stagiaire::find($request->stagiaire);
        $module = Module::find($request->module);

        if (!$stagiaire || !$module) {
            return back()->withErrors('Stagiaire or Module not found!');
        }

        $stagiaire->modules()->attach($module->id, ['note' => $request->note]);

        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        return view("CRUD3.Note.notes_list", compact("stagiaire"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = Note::find($id);
        return view("CRUD3.Note.modifier", compact("note"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note = Note::find($id);
        $note->note = $request->note;
        $note->save();

        return redirect()->route("notes.show", $note->stagiaire_id)->with("success","Note updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::findOrFail($id);
        $stagiaire_id = $note->stagiaire_id;
        $note->delete();
        return $this->show($stagiaire_id);

    }
}

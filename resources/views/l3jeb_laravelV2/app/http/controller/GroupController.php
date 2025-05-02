<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Group::all();
        return view("CRUD3.Group.groupes_list", compact('groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CRUD3.Group.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group = new Group;
        $group->group_name = $request->group_name;
        $group->save();

        return redirect()->route('groupes.index')->with('success','Group has been added succeeded.');
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
        $group = Group::find($id);
        return view('CRUD3.Group.modifier', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $group = Group::find($id);
        $group->group_name = $request->group_name;
        $group->save();

        return redirect()->route('groupes.index')->with('success','Group has been updated succeeded.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::find($id);
        $group->Stagiaires()->delete();
        $group->delete();

        return redirect()->route('groupes.index')->with('success','Group have been deleted successfully');
    }
}

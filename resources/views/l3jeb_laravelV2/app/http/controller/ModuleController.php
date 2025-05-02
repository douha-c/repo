<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Representant;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view("CRUD3.module.modules_list", compact("modules"));
    }

    public function create()
    {
        return view("CRUD3.module.ajouter");
    }

public function store(Request $request)
{
    $image = $this->uploadImage($request);
    $module = new Module;
    $module->id = $request->code;
    $module->titre = $request->titre;
    $module->mass_h = $request->MH;
    $module->image = $image;
    $module->save();

    $representant = new Representant;
    $representant->matricule = $request->matricule;
    $representant->nom = $request->nom;
    $representant->prenom = $request->prenom;
    $representant->grade = $request->grade;
    $module->Representant()->save($representant);

    return redirect()->route("modules.index")->with("success", "Module has been added successfully");
}


    public function edit($id)
    {
        $module = Module::find($id);
        return view("CRUD3.module.modifier", compact("module"));

    }
    public function update(Request $request, Module $module)
    {
        $this->deleteImageByID($module->id) ;
        $image = $this->uploadImage($request);
        $module->titre = $request->titre;
        $module->mass_h = $request->MH;
        $module->image = $image;
        $module->save();
        $module->Representant->matricule = $request->matricule;
        $module->Representant->nom = $request->nom;
        $module->Representant->prenom = $request->prenom;
        $module->Representant->grade = $request->grade;
        $module->Representant->save();
        return redirect()->route("modules.index")->with("success","module has been updated successfully");
    
}
    public function destroy($id)
    {
        $module = Module::find($id);
        $module->delete();
        return redirect()->route("modules.index")->with("success","module has been deleted successfully");
    }

    public function uploadImage(Request $request) {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('images',$name, 'public');
            return $path;
        }
    }

    public function deleteImageByID ($id) {
        $module = Module::find($id);
        $cuurentImage = $module->image;
        if ($cuurentImage)
        {
            $files = file_exists('storage/'.$cuurentImage);
            if ($files)
            {
                unlink('storage/'.$cuurentImage);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function getDataFromDB()
    {
        $res = Module::all();
        return view('module', ['module' => $res]);
    }
    public function supp($id)
    {
        $m = Module::find($id);
        $m->delete();
        return redirect()->route('module.store');
    }
    public function mod(Request $request, $id)
    {
        $m=Module::find($id);
        $m->code=$request['code'];
        $m->titre=$request['titre'];
        $m->masse=$request['horaire'];
        $m->imag=$request['imag'];
        $m->save();
        return redirect()->route('module.store');
    }
    public function ajou(Request $request)
    {
        $request->validate([
            'imag' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time().'.'.$request->imag->extension();  
        $request->imag->move(public_path('images'), $imageName);
        $m=new Module;
        $m->code=$request['code'];
        $m->titre=$request['titre'];
        $m->masse=$request['horaire'];
        $m->imag=$imageName;
        $m->save();
        return redirect()->route('module.store');
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class resourcecont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $res = DB::select('SELECT * FROM module');
        $res = DB::table('module')->get();
        return view('module', ['module' => $res]);
    }
    /*** Show the form for creating a new resource.*/
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
        // DB::insert('INSERT INTO module (code,titre,masse,imag) VALUES (?,?,?,?)', [$request['code'],$request['titre'],$request['horaire'],$imageName]);
        // return redirect()->route('modules.index');
        DB::table('module')->insert([
            'code' => $request['code'],
            'titre' => $request['titre'],
            'masse' => $request['horaire'],
            'imag' => $imageName
        ]);
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
        //$res = DB::select('SELECT * FROM module WHERE id = ?', [$id]);
        $res = DB::table('module')->where('id', $id)->first();
        return view('formmodifiermodule', ['module' => $res]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // DB::update('UPDATE module SET code=?,titre=?,masse=?,imag=? WHERE id = ?', [$request['code'],$request['titre'],$request['horaire'],$request['imag'], $id]);
        // $request->validate([
        //     'imag' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
    
        $data = [
            'code' => $request['code'],
            'titre' => $request['titre'],
            'masse' => $request['horaire'],
            'imag' => $request['imag'],
        ];
    
        // if ($request->hasFile('imag')) {
        //     $imageName = time().'.'.$request->imag->extension();  
        //     $request->imag->move(public_path('images'), $imageName);
        //     $data['imag'] = $imageName;
        // }
    
        DB::table('module')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('modules.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // DB::delete('DELETE FROM module WHERE id = ?', [$id]);
        DB::table('module')->where('id', $id)->delete();
        return redirect()->route('modules.index');
        
    }
}
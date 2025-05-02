<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class DBcontroller extends Controller
{
    public function getDataFromDB()
    {
        // $res = DB::select('SELECT * FROM module');
        // return view('module', ['module' => $res]);
    }
    public function supp($id)
    {
        // DB::delete('DELETE FROM module WHERE id = ?', [$id]);
        // return redirect()->route('module.store');
    }
    public function mod(Request $request, $id)
    {
        DB::update('UPDATE module SET code=?,titre=?,masse=?,imag=? WHERE id = ?', [$request['code'],$request['titre'],$request['horaire'],$request['imag'], $id]);
        return redirect()->route('module.store');
    }
    public function ajou(Request $request)
    {
        // $request->validate([
        //     'imag' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        // $imageName = time().'.'.$request->imag->extension();  
        // $request->imag->move(public_path('images'), $imageName);
        // DB::insert('INSERT INTO module (code,titre,masse,imag) VALUES (?,?,?,?)', [$request['code'],$request['titre'],$request['horaire'],$imageName]);
        // return redirect()->route('module.store');
    }

}

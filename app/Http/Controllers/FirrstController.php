<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class FirrstController extends Controller
{
    function index($id){
        $ProductList = [1 => "pantalon", 2 => "t-shirt", 3 => "Robe"];
        return view('tp1detaile',['id' => $ProductList[$id]]);
    }
}

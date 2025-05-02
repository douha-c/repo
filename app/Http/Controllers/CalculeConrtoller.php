<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculeConrtoller extends Controller
{
    function somme($a,$b){
        $s=$a+$b;
        return view('Affichage')->with('somme',$s);
    }
    function pro($a,$b){
        $s=$a*$b;
        return view('Affichage',['somme' => $s]);
    }
}

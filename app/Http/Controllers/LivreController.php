<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function show($id){
        $livers = [
            1 => ['title' => 'livre1', 'author' => 'author1', 'year' => '2021', 'description' => 'description1'],
            2 => ['title' => 'livre2', 'author' => 'author2', 'year' => '2022', 'description' => 'description2'],
            3 => ['title' => 'livre3', 'author' => 'author3', 'year' => '2023', 'description' => 'description3'],
            4 => ['title' => 'livre4', 'author' => 'author4', 'year' => '2024', 'description' => 'description4'],
            5 => ['title' => 'livre5', 'author' => 'author5', 'year' => '2025', 'description' => 'description5'],
        ];
        return view('livre', ['livre' => $livers[$id], 'id' => $id]);
    }
}

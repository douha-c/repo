<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = [ 'Acheter du lait','Faire la lessive', 'Rendre visite à mamie', 'Faire du sport', 'Lire un livre' ];
        return view('task-list', ['tasks' => $tasks]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formvalidaton extends Controller
{
    public function getData(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[A-Za-z]+\s[A-Za-z]+$/',
            'email' => 'required|email',
            'message' => 'required|max:500',
        ]);

        return view('readData', ['studentData' => $request->all()]);
    }
}
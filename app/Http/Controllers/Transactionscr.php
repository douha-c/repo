<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\CurrentBalance;
use Illuminate\Http\Request;

class Transactionscr extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentBalance = CurrentBalance::first();
        $transactions=Transaction::All();
        return view('start.index', ['transactions' => $transactions,'currentBalance' => $currentBalance->currentBalance]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentBalance = CurrentBalance::first();
        $currentBalance->currentBalance += $request->input('amount');
        $currentBalance->save();
        $transaction = new Transaction;
        $transaction->description = $request->input('description');
        $transaction->amount = $request->input('amount');
        $transaction->save();
        return redirect()->route('transactions.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

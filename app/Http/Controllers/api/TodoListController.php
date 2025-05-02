<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Todoslist;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Todoslist::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = Todoslist::create($request->all());
        return response()->json($todo, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todoslist $todo)
    {
        $todo->update($request->all());
        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todoslist $todo)
    {
        $todo->delete();
        return response()->json(null, 204);   
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operations = Operation::all();
        return view('admin.operations.index', ['operations' => $operations, 'title' => 'Toutes les opérations']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.operations.create', ['title' => 'Ajout d\'une opération']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $operation = new Operation;
        $operation->name = $request->input('name');
        $operation->name = Str::lower($operation->name);

        die();
        // $operation->save();

        //Redirection vers la view index du dossier categories
        return redirect()->route('operations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $operation = Operation::find($id);
        return view('admin.operations.show', ['title' => 'Voir une opération', 'operation' => $operation]);
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
        $operation = Operation::find($id);
        var_dump($operation);
        die();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

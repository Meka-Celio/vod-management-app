<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\DeletedOperation;
use App\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operations = Operation::all();

        $state = "";
        $msg = "";

        // Variales d'etats reçu des différentes fonctions
        if (Session::get('state')) {
            $state = Session::get('state');
            $msg = Session::get('msg');
        }
        // Return the 
        return view('dashboard.operations.index', ['pagetitle' => 'Toutes les opérations', 'operations' => $operations, 'title' => 'Toutes les opérations', 'state' => $state, 'msg' => $msg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Go to create element page
        return view('dashboard.operations.create', ['title' => 'Ajout d\'une opération', 'pagetitle' => 'Ajout d\'une opération']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new element
        $operation = new Operation;

        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";

        // Validation des données du formulaire
        $validate = Validation::validate($request->input('name'), 'string');

        // Si valide
        if ($validate[0]) {
            $operation->name = Str::lower($request->input('name'));
            $operation->save();
            $state = "ok";
            $msg = "Element ajouté avec succès !";
        } else {
            $state = "ko";
            $msg = "Echec lors de l'ajout, le nom ne doit pas être vide !";
        }

        // Redirection vers la view index du dossier opérations
        return redirect()->route('operations.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find an element
        $operation = Operation::find($id);
        return view('dashboard.operations.show', ['title' => 'Voir une opération', 'operation' => $operation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find an element
        $operation = Operation::find($id);
        return view('dashboard.operations.edit', ['title' => 'Modifier une opération', 'pagetitle' => 'Modifier une opération', 'operation' => $operation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Rechercher un element
        $operation = Operation::find($id);
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";

        // Validation des données du formulaire
        $validate = Validation::validate($request->input('name'), 'string');

        if ($validate[0]) {
            // Affectation
            $operation->name = Str::lower($request->input('name'));
            // Modifier un element
            $operation->save();
            // Update state & msg
            $state = "ok";
            $msg = "Element mise à jour avec succès !";
        } else {
            // Update state & msg
            $state = "ko";
            $msg = "Elément non mise à jour !";
        }
        // Redirection vers la view index du dossier opérations
        return redirect()->route('operations.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";

        // Rechercher un element
        $record = Operation::find($id);

        // Ajouter un element a la table deleted_{table}
        $item = new DeletedOperation;
        $item->name = $record->name;
        $item->save();

        // Supprimer un element
        if ($record) {
            $record->delete();
            $state = "ok";
            $msg = "Element supprimé avec succès !";
        } else {
            $state = "ko";
            $msg = "L'élément n'a pas pu être supprimé !";
        }
        // Redirection vers la view index du dossier opérations
        return redirect()->route('operations.index')->with('state', $state)->with('msg', $msg);
    }
}

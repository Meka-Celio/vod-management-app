<?php

namespace App\Http\Controllers;

use App\Models\DeletedStatus;
use App\Models\Status;
use App\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::all();

        $state = "";
        $msg = "";

        // Variales d'etats reçu des différentes fonctions
        if (Session::get('state')) {
            $state = Session::get('state');
            $msg = Session::get('msg');
        }
        // Return the 
        return view('dashboard.status.index', ['status' => $status, 'title' => 'Tous les status', 'pagetitle' => 'Tous les status de souscription abonnement', 'state' => $state, 'msg' => $msg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Go to create element page
        return view('dashboard.status.create', ['title' => 'Ajout d\'un status', 'pagetitle' => 'Ajouter un status']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new element
        $status = new Status();
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
        $good = 0;

        // Validation
        $validate = Validation::validate($request->input('name'), 'string');

        if ($validate[0]) {
            $status->name = Str::lower($status->name);
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le nom ne doit pas être vide !</p>";
        }

        // Vérification code_status
        $validate2 = Validation::validate($request->input('code_status'), 'number');
        if ($validate2[0]) {
            $status->code_status = $request->input('code_status');
            $good += 1;
        } else {
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le code doit être un nombre !</p>";
        }

        if ($good == 2) {
            // Ajouter un element
            $status->save();
            // Notification d'état
            $state = "ok";
            $msg = "Element ajouté avec succès !";
        }

        // Redirection vers la view index du dossier opérations
        return redirect()->route('status.index')->with('state', $state)->with('msg', $msg);
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
        // Find an element
        $status = Status::find($id);
        return view('dashboard.status.edit', ['title' => 'Modifier un status', 'pagetitle' => 'Modifier un status', 'status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = Status::find($id);
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
        $good = 0;
        // if input != ""
        if ($request->input('name') != "") {
            $status->name = $request->input('name');
            $status->name = Str::lower($status->name);
            $good += 1;
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de la mise à jour, le nom ne doit pas être vide !</p>";
        }
        // Vérification code_status
        $status->code_status = $request->input('code_status');
        $vCode = $status->code_status * (-1);
        // var_dump($status->code_status);
        // die();
        if (!$vCode) {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de la mise à jour, le code doit être un nombre !</p>";
        } else {
            $good += 1;
        }

        if ($good == 2) {
            // Ajouter un element
            $status->save();
            // Notification d'état
            $state = "ok";
            $msg = "Element modifié avec succès !";
        }
        // Redirection vers la view index du dossier opérations
        return redirect()->route('status.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Rechercher un element
        $record = Status::find($id);
        // Ajouter un element a la table deleted_{table}
        $item = new DeletedStatus();
        $item->name = $record->name;
        $item->code_status = $record->code_status;
        $item->save();
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
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
        return redirect()->route('status.index')->with('state', $state)->with('msg', $msg);
    }
}

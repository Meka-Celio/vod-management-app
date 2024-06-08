<?php

namespace App\Http\Controllers;

use App\Models\DeletedUsertype;
use App\Models\Usertype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usertypes = Usertype::all();

        $state = "";
        $msg = "";

        // Variales d'etats reçu des différentes fonctions
        if (Session::get('state')) {
            $state = Session::get('state');
            $msg = Session::get('msg');
        }
        // Return the 
        return view('dashboard.usertypes.index', ['usertypes' => $usertypes, 'title' => 'Tous les usertypes', 'pagetitle' => 'Tous les usertypes', 'state' => $state, 'msg' => $msg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Go to create element page
        return view('dashboard.usertypes.create', ['title' => 'Ajout d\'un usertype', 'pagetitle' => 'Ajouter un type user']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new element
        $usertype = new Usertype();
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
        // if input != ""
        if ($request->input('name') != "") {
            $usertype->name = $request->input('name');
            $usertype->name = Str::lower($usertype->name);
            // Ajouter un element
            $usertype->save();
            // Notification d'état
            $state = "ok";
            $msg = "Element ajouté avec succès !";
        } else {
            // Notification d'état
            $state = "ko";
            $msg = "Echec lors de l'ajout, le nom ne doit pas être vide !";
        }
        // Redirection vers la view index du dossier opérations
        return redirect()->route('usertypes.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find an element
        $usertype = Usertype::find($id);
        return view('dashboard.usertypes.show', ['title' => 'Voir un usertype', 'usertype' => $usertype]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find an element
        $usertype = Usertype::find($id);
        return view('dashboard.usertypes.edit', ['title' => 'Modifier un usertype', 'pagetitle' => 'Modifier un usertype', 'usertype' => $usertype]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Rechercher un element
        $usertype = Usertype::find($id);
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
        // If 'name != ""
        if ($request->input('name') != "") {
            $usertype->name = $request->input('name');
            $usertype->name = Str::lower($usertype->name);
            // Modifier un element
            $usertype->save();
            // Update state & msg
            $state = "ok";
            $msg = "Element mise à jour avec succès !";
        } else {
            // Update state & msg
            $state = "ko";
            $msg = "Elément non mise à jour !";
        }
        // Redirection vers la view index du dossier opérations
        return redirect()->route('usertypes.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Rechercher un element
        $record = Usertype::find($id);
        // Ajouter un element a la table deleted_{table}
        $item = new DeletedUsertype();
        $item->name = $record->name;
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
        return redirect()->route('usertypes.index')->with('state', $state)->with('msg', $msg);
    }
}

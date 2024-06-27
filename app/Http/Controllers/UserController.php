<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Models\Usertype;
use App\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $usertypes = Usertype::all();

        $state = "";
        $msg = "";

        // Variales d'etats reçu des différentes fonctions
        if (Session::get('state')) {
            $state = Session::get('state');
            $msg = Session::get('msg');
        }
        // Return the 
        return view('dashboard.users.index', [
            'title' => 'Tous les Utilisateurs', 'pagetitle' => 'Tous les Utilisateurs',
            'users' => $users,
            'usertypes' => $usertypes,
            'state' => $state,
            'msg' => $msg
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usertypes = Usertype::all();
        return view('dashboard.users.create', [
            'usertypes' => $usertypes,
            'title' => 'Ajout d\'un utilisateur', 'pagetitle' => "Ajouter un utilisateur"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new element
        $user = new User();
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
        $good = 0;

        // Validation
        $validate = Validation::validate($request->input('name'), 'string');
        $validate2 = Validation::validate($request->input('email'), 'string');
        $validate3 = Validation::validate($request->input('password'), 'string');
        $user->usertype_id = $request->input('usertype_id');

        if ($validate[0]) {
            $user->name = $request->input('name');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le nom ne doit pas être vide !</p>";
        }

        // Vérification email
        if ($validate2[0]) {
            $user->email = $request->input('email');
            $good += 1;
        } else {
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, l'email ne doit pas être vide !</p>";
        }

        // Vérification password
        if ($validate3[0]) {
            $user->password = $request->input('password');
            $good += 1;
        } else {
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le mot de passe ne doit pas être vide !</p>";
        }

        if ($good == 3) {
            // Ajouter un element
            $user->save();
            // Notification d'état
            $state = "ok";
            $msg = "Element ajouté avec succès !";
        }

        // Redirection vers la view index du dossier opérations
        return redirect()->route('users.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $msg = "";
        $state = "";

        if (Session::get('state')) {
            $state = Session::get('state');
        }

        if (Session::get('msg')) {
            $msg = Session::get('msg');
        }

        $user = User::find($id);
        $usertype = Usertype::find($user->usertype_id);
        $account = Account::where('user_id', $user->id)->first();
        // dd($account->user_id);

        return view('dashboard.users.show', [
            'user' => $user,
            'account' => $account,
            'usertype' => $usertype,
            'title' => 'Voir un utilisateur',
            'pagetitle' => "Voir " . $user->name,
            'msg' => $msg,
            'state' => $state
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $usertypes = Usertype::all();
        return view('dashboard.users.edit', [
            'user' => $user,
            'usertypes' => $usertypes,
            'title' => 'Modifer un utilisateur',
            'pagetitle' => "Modifier un utilisateur"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find an element
        $user = User::find($id);
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
        $good = 0;

        // Validation
        $validate = Validation::validate($request->input('name'), 'string');
        $validate2 = Validation::validate($request->input('email'), 'string');
        $validate3 = Validation::validate($request->input('password'), 'string');
        $user->usertype_id = $request->input('usertype_id');

        if ($validate[0]) {
            $user->name = $request->input('name');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec de la mise à jour !</p>";
        }

        // Vérification email
        if ($validate2[0]) {
            $user->email = $request->input('email');
            $good += 1;
        } else {
            $state = "ko";
            $msg .= "<p>Echec de la mise à jour !</p>";
        }

        // Vérification password
        if ($validate3[0]) {
            $user->password = $request->input('password');
            $good += 1;
        } else {
            $state = "ko";
            $msg .= "<p>Echec de la mise à jour !</p>";
        }

        if ($good == 3) {
            // Ajouter un element
            $user->save();
            // Notification d'état
            $state = "ok";
            $msg = "Mise à jour avec succès !";
        }

        // Redirection vers la view index du dossier opérations
        return redirect()->route('users.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

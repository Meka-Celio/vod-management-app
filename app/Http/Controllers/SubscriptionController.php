<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::all();

        $state = "";
        $msg = "";

        // Variales d'etats reçu des différentes fonctions
        if (Session::get('state')) {
            $state = Session::get('state');
            $msg = Session::get('msg');
        }
        // Return the 
        return view('dashboard.subscriptions.index', ['subscriptions' => $subscriptions, 'title' => 'Tous les Abonnements', 'pagetitle' => 'Tous les abonnements', 'state' => $state, 'msg' => $msg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Go to create element page
        return view('dashboard.subscriptions.create', ['title' => 'Ajout d\'un abonnement', 'pagetitle' => 'Ajouter un abonnement']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create new element
        $subscription = new Subscription();
        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
        $good = 0;

        // if input != ""
        if ($request->input('name') != "") {
            $subscription->name = $request->input('name');
            $subscription->name = Str::lower($subscription->name);
            $good += 1;
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le nom ne doit pas être vide !</p>";
        }
        // Vérification price
        $subscription->price = $request->input('price');
        $vPrice = $subscription->price * (-1);
        // Vérification du prix
        if (!$vPrice) {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le prix doit être un nombre !</p>";
        } else {
            $good += 1;
        }
        // Vérification de la durée
        $subscription->duration = $request->input('duration');
        $vDuration = $subscription->duration * (-1);
        if (!$vDuration) {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, la durée doit être un nombre !</p>";
        } else {
            if ($subscription->duration > 0) {
                if ($subscription->duration <= 12) {
                    $good += 1;
                } else {
                    // Notification d'état
                    $state = "ko";
                    $msg .= "<p>Echec lors de l'ajout, la durée ne peux excéder 12 mois !</p>";
                }
            } else {
                // Notification d'état
                $state = "ko";
                $msg .= "<p>Echec lors de l'ajout, la durée ne peux être inférieur ou égale à 0 !</p>";
            }
        }

        if ($good == 3) {
            // Ajouter un element
            $subscription->save();
            // Notification d'état
            $state = "ok";
            $msg = "Element ajouté avec succès !";
        } else {
            // Notification d'état
            $state = "ko";
            $msg = "Element non ajouté !";
        }

        // Redirection vers la view index du dossier opérations
        return redirect()->route('subscriptions.index')->with('state', $state)->with('msg', $msg);
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
        $subscription = Subscription::find($id);
        return view('dashboard.subscriptions.edit', ['title' => 'Modifier un abonnement', 'pagetitle' => 'Modifier un abonnement', 'subscription' => $subscription]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subscription = Subscription::find($id);
        $msg = "";
        $good = 0;
        $state = "";

        // if input != ""
        if ($request->input('name') != "") {
            $subscription->name = $request->input('name');
            $subscription->name = Str::lower($subscription->name);
            $good += 1;
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le nom ne doit pas être vide !</p>";
        }
        // Vérification price
        $subscription->price = $request->input('price');
        $vPrice = $subscription->price * (-1);
        // Vérification du prix
        if (!$vPrice) {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le prix doit être un nombre !</p>";
        } else {
            $good += 1;
        }
        // Vérification de la durée
        $subscription->duration = $request->input('duration');
        $vDuration = $subscription->duration * (-1);
        if (!$vDuration) {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, la durée doit être un nombre !</p>";
        } else {
            if ($subscription->duration > 0) {
                if ($subscription->duration <= 12) {
                    $good += 1;
                } else {
                    // Notification d'état
                    $state = "ko";
                    $msg .= "<p>Echec lors de l'ajout, la durée ne peux excéder 12 mois !</p>";
                }
            } else {
                // Notification d'état
                $state = "ko";
                $msg .= "<p>Echec lors de l'ajout, la durée ne peux être inférieur ou égale à 0 !</p>";
            }
        }

        if ($good == 3) {
            // Ajouter un element
            $subscription->save();
            // Notification d'état
            $state = "ok";
            $msg = "Element modifié avec succès !";
        } else {
            // Notification d'état
            $state = "ko";
            $msg = "Element non modifié !";
        }

        // Redirection vers la view index du dossier opérations
        return redirect()->route('subscriptions.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

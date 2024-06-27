<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();

        $state = "";
        $msg = "";

        // Variales d'etats reçu des différentes fonctions
        if (Session::get('state')) {
            $state = Session::get('state');
            $msg = Session::get('msg');
        }
        // Return the 
        return view('dashboard.movies.index', [
            'movies' => $movies,
            'title' => 'Tous les films',
            'pagetitle' => 'Tous les films',
            'state' => $state,
            'msg' => $msg
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Go to create element page
        return view('dashboard.movies.create', ['title' => 'Ajout d\'un film', 'pagetitle' => 'Ajouter un film']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $movie = new Movie();

        // Variables d'etats à envoyer par la fonction redirect
        $state = "";
        $msg = "";
        $good = 0;


        // Validation
        $validate = Validation::validate($request->input('name'), 'string');

        if ($validate[0]) {
            $movie->name = $request->input('name');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le nom ne doit pas être vide !</p>";
        }

        // display_name
        $validate = Validation::validate($request->input('display_name'), 'string');
        if ($validate[0]) {
            $movie->display_name = $request->input('display_name');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le nom d'affichage ne doit pas être vide !</p>";
        }

        // synopsis
        $validate = Validation::validate($request->input('synopsis'), 'string');
        if ($validate[0]) {
            $movie->synopsis = $request->input('synopsis');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le synopsis ne doit pas être vide !</p>";
        }

        // directed_by
        $validate = Validation::validate($request->input('directed_by'), 'string');
        if ($validate[0]) {
            $movie->directed_by = $request->input('directed_by');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le directed_by ne doit pas être vide !</p>";
        }

        // realese_date
        $movie->release_date = $request->input('release_date');

        // runtime
        $validate = Validation::validate($request->input('runtime'), 'number');
        if ($validate[0]) {
            $movie->runtime = $request->input('runtime');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le runtime doit être un nombre !</p>";
        }

        // Rating
        $validate = Validation::validate($request->input('rating'), 'number');
        if ($validate[0]) {
            $movie->rating = $request->input('rating');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le PG doit être un nombre !</p>";
        }

        // Selling_price
        $validate = Validation::validate($request->input('selling_price'), 'number');
        if ($validate[0]) {
            $movie->selling_price = $request->input('selling_price');
            $good += $validate[0];
        } else {
            // Notification d'état
            $state = "ko";
            $msg .= "<p>Echec lors de l'ajout, le prix de vente doit être un nombre !</p>";
        }

        // rental_price
        $movie->rental_price = $request->input('rental_price');
        // Cover
        $movie->cover = "dashboard/img/covers/no-cover.png";
        // banner
        $movie->banner = "dashboard/img/banners-movies/no-banner.png";

        if ($good == 7) {
            // Ajouter un element
            $movie->save();
            // Notification d'état
            $state = "ok";
            $msg = "Element ajouté avec succès !";
        } else {
            dd($request->all());
        }

        // Redirection vers la view index du dossier opérations
        return redirect()->route('movies.index')->with('state', $state)->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find an element
        $movie = Movie::find($id);
        return view('dashboard.movies.show', [
            'title' => 'Voir un film',
            'pagetitle' => 'Voir un film',
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find an element
        $movie = Movie::find($id);
        return view('dashboard.movies.edit', [
            'title' => 'Modifier un film',
            'pagetitle' => 'Modifier un film',
            'movie' => $movie
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function upload(Request $request, string $id)
    {
        $movie = Movie::find($id);;

        $request->validate([
            'file' => 'required|image|mimes:png,gif,jpg,jpeg|max:200000'
        ]);

        $element = $request->element;
        $filename = time() . '.' . $request->file->extension();
        switch ($element) {
            case 'cover':
                $request->file->move(public_path('dashboard/img/covers'), $filename);
                $movie->cover = 'dashboard/img/covers/' . $filename;
                break;
            case 'banner':
                $request->file->move(public_path('dashboard/img/banners-movies'), $filename);
                $movie->banner = 'dashboard/img/banners-movies/' . $filename;
                break;
            default:
                break;
        }
        $movie->save();

        // Redirection vers la view index du dossier opérations
        return redirect()->route('movies.index')->with('state', 'ok')->with('msg', 'element bien mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

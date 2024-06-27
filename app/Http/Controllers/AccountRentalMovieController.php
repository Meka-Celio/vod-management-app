<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Movie;
use App\Models\Operation;
use App\Validation;
use Illuminate\Http\Request;

class AccountRentalMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $account = Account::find($id);
        $movies = Movie::all();

        return view('dashboard.rentalmovies.create', [
            'account' => $account,
            'movies'    => $movies,
            'title' => 'Louer un film', 'pagetitle' => "Ajouter une location"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "Cette fonctionnalité n'est pas encore disponible !";
        die();
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

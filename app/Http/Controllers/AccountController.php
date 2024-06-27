<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\NumAccount;
use Illuminate\Http\Request;

class AccountController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userid = $request->input('user_id');
        $accounts = Account::all();

        if ($accounts) {
            foreach ($accounts as $ac) {
                if ($userid == $ac->user_id) {
                    // Redirection vers la view 
                    return redirect()->route('users.show', $userid)->with('state', 'ko')->with('msg', 'Un compte existe deja pour cet user !');
                } else {
                    $account = new Account();
                    $num_account = NumAccount::generateNumAccount($userid);
                    $account->num_account = $num_account;
                    $account->user_id = $userid;
                    $account->save();
                    // Redirection vers la view 
                    return redirect()->route('users.show', $userid)->with('state', 'ok')->with('msg', 'Compte ajouté avec succès !');
                }
            }
        }
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

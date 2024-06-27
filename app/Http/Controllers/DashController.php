<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Operation;
use App\Models\Status;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Usertype;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        // Load the elements to show on page
        $operations = Operation::all();
        $usertypes = Usertype::all();
        $status = Status::all();
        $subscriptions = Subscription::all();
        $users = User::all();
        $movies = Movie::all();
        // Go to Dashboard page
        return view('dashboard.index', [
            'title' => 'Dashboard', 'pagetitle' => 'Dashboard',
            'operations'    => $operations,
            'usertypes'     => $usertypes,
            'status'        => $status,
            'subscriptions' => $subscriptions,
            'users'         => $users,
            'movies'        => $movies
        ]);
    }

    public function login(Request $request)
    {
        $username = "celestin";
        $pass = "test21";
        $msg = "";
        $ok = 0;

        if ($request->input('username') != $username) {
            $msg .= "Username invalide";
        } else {
            $ok += 1;
        }

        if ($request->input('password') != $pass) {
            $msg .= "  | Mot de passe invalide";
        } else {
            $ok += 1;
        }

        if ($ok == 2) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('msg', $msg);
        }
    }
}

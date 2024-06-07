<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        // Go to create element page
        return view('dashboard.index', ['title' => 'Dashboard', 'pagetitle' => 'Dashboard']);
    }
}

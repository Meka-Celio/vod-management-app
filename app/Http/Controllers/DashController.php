<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Status;
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
        // Go to Dashboard page
        return view('dashboard.index', ['title' => 'Dashboard', 'pagetitle' => 'Dashboard', 'operations' => $operations, 'usertypes' => $usertypes, 'status' => $status]);
    }
}

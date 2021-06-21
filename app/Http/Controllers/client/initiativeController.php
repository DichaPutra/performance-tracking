<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class initiativeController extends Controller {

    function index() {
        // get user by session id
        $user = User::all()->where('client_parent', Auth::user()->id);

        // view
        return view('client.initiative.personnel', ['user' => $user]);
    }

}

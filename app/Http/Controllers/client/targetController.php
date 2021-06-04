<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class targetController extends Controller {

    public function index() {
        // Homepage Target
        $user = User::all()->where('client_parent', Auth::user()->id);
        return view('client.target.target', ['user' => $user]);
    }

    public function details(Request $request) {
        $data = User::where('id', $request->idpersonnel)->first();
//        dd($data);
        return view('client.target.details', ['data' => $data]);
    }

}

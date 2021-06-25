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

    function kpi(Request $request) {
        //var_dump($request->idpersonnel);
        $data = User::where('id', $request->idpersonnel)->first();

        // guard (jika user yang dilihat bukan personnelnya)
        if ($data == NULL) {
            return abort(403);
        }
        if ($data->client_parent != Auth::user()->id) {
            return abort(403);
        }

        return view('client.initiative.kpi', ['data' => $data]);
    }

    function initiative() {
        return view('client.initiative.initiative');
    }

}

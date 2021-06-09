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

        // guard (jika )
        if ($data->client_parent != Auth::user()->id) {
            return abort(403);
        }

        return view('client.target.details', ['data' => $data]);
    }

    public function addSo(Request $request) {
        //dd($request);
        if ($request->so_custom == null) {
            list($idcategory, $category) = explode('-', $request->category);
            list($idso, $so) = explode('-', $request->SO);
            echo "id : $idcategory | cat: $category <br>";
            echo "idso : $idso | so : $so";
        } else {
            echo $request->so_custom;
        }
    }

}

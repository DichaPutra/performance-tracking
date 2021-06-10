<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\target_so;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class targetController extends Controller {

    public function index() {// ** Memunculkan semua list personnel  
        // Homepage Target
        $user = User::all()->where('client_parent', Auth::user()->id);
        
        //$user = User::select(DB::raw('count(*) as so_count, status'))->where('client_parent', Auth::user()->id);
        return view('client.target.target', ['user' => $user]);
    }

    public function details(Request $request) {// ** Memunculkan detail personnel | req data : id personnel
        $data = User::where('id', $request->idpersonnel)->first();

        // guard (jika user yang dilihat bukan personnelnya)
        if ($data == NULL) {
            return abort(403);
        }
        if ($data->client_parent != Auth::user()->id) {
            return abort(403);
        }

        // get data SO by ID
        $dataso = target_so::where('id_user', $request->idpersonnel)->get();

        // pass to view
        return view('client.target.details', ['data' => $data, 'dataso' => $dataso]);
    }

    public function addSo(Request $request) {// ** Fungsi Store SO ke database
        if ($request->so_custom == null) {
            //SO dari library;
            list($idcategory, $category) = explode('-', $request->category);
            list($idso, $so) = explode('-', $request->SO);
            echo "id : $idcategory | cat: $category <br>";
            echo "idso : $idso | so : $so <br>";
            echo "user id :" . $request->userid;

            //insert db SO data
            $sodb = new target_so;
            $sodb->id_user = $request->userid;
            $sodb->id_so = $idso;
            $sodb->so = $so;
            $sodb->save();

            //redirect with succes message
            return redirect()->route('client.target.details', ['idpersonnel' => $request->userid])->with('success', 'Success ! Your strategic objective has been added');
        } else {
            // SO Custom
            $so = $request->so_custom;

            //insert db SO data
            $sodb = new target_so;
            $sodb->id_user = $request->userid;
            $sodb->id_so = NULL;
            $sodb->so = $so;
            $sodb->save();

            //redirect with succes message
            return redirect()->route('client.target.details', ['idpersonnel' => $request->userid])->with('success', 'Success ! Your strategic objective has been added');
        }
    }

}

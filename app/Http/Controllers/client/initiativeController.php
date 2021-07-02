<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\target_kpi;
use App\Models\target_si;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class initiativeController extends Controller {

    function index()
    {
        // get user by session id
        $user = User::all()->where('client_parent', Auth::user()->id);

        // view
        return view('client.initiative.personnel', ['user' => $user]);
    }

    function kpi(Request $request)
    {
        //Mengambil detail data personnel
        $data = User::where('id', $request->idpersonnel)->first();

        // guard (jika user yang dilihat bukan personnelnya)
        if ($data == NULL)
        {
            return abort(403);
        }
        if ($data->client_parent != Auth::user()->id)
        {
            return abort(403);
        }

        // get all kpi data by personnel 
        //$datakpi = target_kpi::where('id_user', $request->idpersonnel)->get();
        $datakpi = DB::table('target_kpi')
                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library')
                ->where('target_kpi.id_user', $request->idpersonnel)
                ->orderBy('target_kpi.id_target_so', 'asc')
                ->get();

        return view('client.initiative.kpi', ['data' => $data, 'datakpi' => $datakpi]);
    }

    function initiative(Request $request)
    {
        
//        dd($request);
        
        //Mengambil detail data personnel
        $data = User::where('id', $request->idpersonnel)->first();

        // guard (jika user yang dilihat bukan personnelnya)
        if ($data == NULL)
        {
            return abort(403);
        }
        if ($data->client_parent != Auth::user()->id)
        {
            return abort(403);
        }

        //get data kpi with SO
        $datakpi = DB::table('target_kpi')
                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library')
                ->where('target_kpi.id', $request->idkpi)
                ->first();
        
        // get data Target Strategic Inititives
        $datasi = target_si::where('id_target_kpi', $request->idkpi)->get();

        
        return view('client.initiative.initiative', ['data' => $data, 'datakpi' => $datakpi, 'datasi' => $datasi]);
    }

}

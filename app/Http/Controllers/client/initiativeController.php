<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\target_kpi;
use App\Models\target_si;
use App\Models\si_library;
use App\Models\actionplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class initiativeController extends Controller {

    function index(Request $request)
    {
        $alltahun = target_kpi::groupby('periode_th');

        // ** Memunculkan semua list personnel  
        if ($request->tahun == null)
        {
            // Default Tahun Sekarang
            $tahun = date('Y');
            // Homepage Target
            $user = User::all()->where('client_parent', Auth::user()->id);

            return view('client.initiative.personnel', ['user' => $user, 'tahun' => $tahun]);
        }
        else
        {
            //Tahun Pilihan
            // Homepage Target
            $user = User::all()->where('client_parent', Auth::user()->id);

            return view('client.initiative.personnel', ['user' => $user, 'tahun' => $request->tahun]);
        }

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
        $datakpi = DB::table('target_kpi')
                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library', 'range_period')
                ->where('target_kpi.id_user', $request->idpersonnel)
                ->where('target_kpi.periode_th', $request->tahun)
                ->orderBy('target_kpi.id_target_so', 'asc')
                ->get();

        // get data Target Strategic Inititives
        if ($request->idkpi != null)
        {
            //get data kpi with SO
            $datakpiselected = DB::table('target_kpi')
                    ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                    ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library')
                    ->where('target_kpi.id', $request->idkpi)
                    ->first();
            $datasi = target_si::where('id_target_kpi', $request->idkpi)->where('periode_th', $request->tahun)->get();
        }
        else
        {
            $datakpiselected = null;
            $datasi = null;
        }

        return view('client.initiative.kpi', ['data' => $data, 'datakpi' => $datakpi, 'tahun' => $request->tahun, 'datakpiselected' => $datakpiselected, 'datasi' => $datasi]);
    }

    function addInitiative(Request $request)
    {
//        dd($request);
        if ($request->id_si_library == 0)
        {
            // if custom
            $addtargetsi = new target_si;
            $addtargetsi->id_user = $request->id_user;
            $addtargetsi->id_target_kpi = $request->id_target_kpi;
            $addtargetsi->id_si_library = null;
            $addtargetsi->si = $request->customsi;
            $addtargetsi->periode_th = $request->periode_th;
            $addtargetsi->save();

            return redirect()->back();
        }
        else
        {
            // on si library
            //search on library
            $sionlib = si_library::where('id', $request->id_si_library)->first();

            // insert on db
            $addtargetsi = new target_si;
            $addtargetsi->id_user = $request->id_user;
            $addtargetsi->id_target_kpi = $request->id_target_kpi;
            $addtargetsi->id_si_library = $request->id_si_library;
            $addtargetsi->si = $sionlib->si;
            $addtargetsi->periode_th = $request->periode_th;
            $addtargetsi->save();

            return redirect()->back();
        }
    }

    function actionplan(Request $request)
    {
        // request idpersonnel, tahun, datakpiselected, idsi
        //dd($request);
        //Mengambil detail data personnel
        $data = User::where('id', $request->idpersonnel)->first();

        //mengambil data actionplan where tahun, user, idsi
        $datakpiselected = DB::table('target_kpi')
                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library', 'range_period')
                ->where('target_kpi.id', $request->idkpiselected)
                ->first();

        $datasi = target_si::where('id', $request->idsi)->first();
        //dd($datakpiselected);
        $actionplan = actionplan::where('id_user', $request->idpersonnel)
                ->where('id_target_si', $request->idsi)
                ->where('periode_th', $request->tahun)
                ->get();


        return view('client.initiative.actionplan', ['data' => $data,
            'datakpiselected' => $datakpiselected,
            'datasi' => $datasi,
            'tahun' => $request->tahun,
            'actionplan' => $actionplan]);
    }

    //    function initiative(Request $request)
//    {
//
//        //dd($request);
//        //Mengambil detail data personnel
//        $data = User::where('id', $request->idpersonnel)->first();
//
//        // guard (jika user yang dilihat bukan personnelnya)
//        if ($data == NULL)
//        {
//            return abort(403);
//        }
//        if ($data->client_parent != Auth::user()->id)
//        {
//            return abort(403);
//        }
//
//        //get data kpi with SO
//        $datakpi = DB::table('target_kpi')
//                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
//                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library')
//                ->where('target_kpi.id', $request->idkpi)
//                ->first();
//
//        // get data Target Strategic Inititives
//        $datasi = target_si::where('id_target_kpi', $request->idkpi)->get();
//
//
//        return view('client.initiative.initiative', ['data' => $data, 'datakpi' => $datakpi, 'datasi' => $datasi]);
//    }
}

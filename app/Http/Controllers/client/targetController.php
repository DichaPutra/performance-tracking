<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\target_so;
use App\Models\target_kpi;
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

            //insert db SO data
            $sodb = new target_so;
            $sodb->id_user = $request->userid;
            $sodb->id_so_library = $idso;
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
            $sodb->id_so_library = NULL;
            $sodb->so = $so;
            $sodb->save();

            //redirect with succes message
            return redirect()->route('client.target.details', ['idpersonnel' => $request->userid])->with('success', 'Success ! Your strategic objective has been added');
        }
    }

    public function editSO(Request $request) {
        //update eloquent
        $soupdate = target_so::find($request->idtargetso);
        $soupdate->so = $request->so;
        $soupdate->save();

        //redirect with succes message
        return redirect()->route('client.target.details', ['idpersonnel' => $request->userid])->with('success', 'Success ! Your strategic objective has been edited');
    }

    public function addKpi(Request $request) {
        // 3 kondisi add KPI = 
        // 1. SO Library KPI Library ( no customKpi var)
        // 2. SO Library KPI Custom  ( kpi = 0 , customKpi != null)
        // 3. SO Custom KPI Custom ( no kpi var)
        //dd($request->all());
        //$userid = $request->userid;
        //var_dump($request->kpi);
//        if (is_null($request->customKpi)) {
//            echo "kondisi ke 1 | 1. SO Library KPI Library";
//        } elseif ($request->kpi == '0') {
//            echo "kondisi ke 2 | 2. SO Library KPI Custom";
//        } elseif (is_null($request->kpi)) {
//            echo "kondisi ke 3 | 3. SO Custom KPI Custom";
//        }
        //insert db Target KPI data
        $kpidb = new target_kpi;
        $kpidb->id_user = $request->userid;
        $kpidb->id_target_so = $request->id_target_so;
        if (is_null($request->customKpi)) {
            list($idkpi, $kpi) = explode('-', $request->id_kpi_library);
            $kpidb->id_kpi_library = $idkpi;
            $kpidb->kpi = $kpi;
        } elseif ($request->id_kpi_library == '0') {
            $kpidb->id_kpi_library = null;
            $kpidb->kpi = $request->customKpi;
        } elseif (is_null($request->id_kpi_library)) {
            $kpidb->id_kpi_library = null;
            $kpidb->kpi = $request->customKpi;
        }
        $kpidb->measurement = $request->measurement;
        $kpidb->polarization = $request->polarization;
        $kpidb->target = $request->target;
        $kpidb->weight = $request->weight;
        $kpidb->save();

        //redirect with succes message
        return redirect()->route('client.target.details', ['idpersonnel' => $request->userid])->with('success', 'Success ! Your kpi has been added');
    }

}

<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\target_so;
use App\Models\target_kpi;
use App\Models\active_target_kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class targetController extends Controller {

    public function index(Request $request)
    {// ** Memunculkan semua list personnel  
        if ($request->tahun == null)
        {
            // Default Tahun Sekarang
            $tahun = date('Y');
            // Homepage Target
            $user = User::all()->where('client_parent', Auth::user()->id);

            return view('client.target.target', ['user' => $user, 'tahun' => $tahun]);
        }
        else
        {
            //Tahun Pilihan
            // Homepage Target
            $user = User::all()->where('client_parent', Auth::user()->id);

            return view('client.target.target', ['user' => $user, 'tahun' => $request->tahun]);
        }
    }

    public function details(Request $request)
    {// ** Memunculkan detail personnel | req data : id personnel
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

        // get data SO by ID
        $dataso = target_so::where('id_user', $request->idpersonnel)->where('periode_th', $request->tahun)->get();

        //get data KPI by ID
        $datakpi = DB::table('target_kpi')
                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library')
                ->where('target_kpi.id_user', $request->idpersonnel)
                ->where('target_kpi.periode_th', $request->tahun)
                ->orderBy('target_kpi.id_target_so', 'asc')
                ->get();

        //$datakpi = DB::select("SELECT * FROM target_kpi a, target_so b WHERE a.id_target_so = b.id AND a.id_user = $request->idpersonnel ORDER BY b.so ASC");
        // pass to view
        return view('client.target.details', ['data' => $data, 'dataso' => $dataso, 'datakpi' => $datakpi, 'tahun' => $request->tahun]);
    }

    public function addSo(Request $request)
    {// ** Fungsi Store SO ke database
        if ($request->so_custom == null)
        {
            //SO dari library;
            list($idso, $so) = explode('-', $request->SO);

            //insert db SO data
            $sodb = new target_so;
            $sodb->id_user = $request->userid;
            $sodb->id_so_library = $idso;
            $sodb->so = $so;
            $sodb->periode_th = $request->tahun;
            $sodb->save();

            //redirect with succes message
            return redirect()->route('client.target.details', ['idpersonnel' => $request->userid, 'tahun' => $request->tahun])->with('success', 'Success ! Your strategic objective has been added');
        }
        else
        {
            // SO Custom
            $so = $request->so_custom;

            //insert db SO data
            $sodb = new target_so;
            $sodb->id_user = $request->userid;
            $sodb->id_so_library = NULL;
            $sodb->so = $so;
            $sodb->periode_th = $request->tahun;
            $sodb->save();

            //redirect with succes message
            return redirect()->route('client.target.details', ['idpersonnel' => $request->userid, 'tahun' => $request->tahun])->with('success', 'Success ! Your strategic objective has been added');
        }
    }

    public function editSO(Request $request)
    {
        //update eloquent
        $soupdate = target_so::find($request->idtargetso);
        $soupdate->so = $request->so;
        $soupdate->save();

        //redirect with succes message
        return redirect()->route('client.target.details', ['idpersonnel' => $request->userid, 'tahun' => $request->tahun])->with('success', 'Success ! Your strategic objective has been edited');
    }

    public function addKpi(Request $request)
    {
        // 3 kondisi add KPI = 
        // 1. SO Library KPI Library ( no customKpi var)
        // 2. SO Library KPI Custom  ( kpi = 0 , customKpi != null)
        // 3. SO Custom KPI Custom ( no kpi var)
        //insert db Target KPI data
        $kpidb = new target_kpi;
        $kpidb->id_user = $request->userid;
        $kpidb->id_target_so = $request->id_target_so;
        if (is_null($request->customKpi))
        {
            list($idkpi, $kpi) = explode('-', $request->id_kpi_library);
            $kpidb->id_kpi_library = $idkpi;
            $kpidb->kpi = $kpi;
        }
        elseif ($request->id_kpi_library == '0')
        {
            $kpidb->id_kpi_library = null;
            $kpidb->kpi = $request->customKpi;
        }
        elseif (is_null($request->id_kpi_library))
        {
            $kpidb->id_kpi_library = null;
            $kpidb->kpi = $request->customKpi;
        }
        $kpidb->unit = $request->unit;
        $kpidb->measurement = $request->measurement;
        $kpidb->polarization = $request->polarization;
        $kpidb->target = $request->target;
        $kpidb->weight = $request->weight;
        $kpidb->timeframe_target = $request->timeframe;
        $kpidb->periode_th = $request->tahun;
        $kpidb->save();

        //redirect with succes message
        return redirect()->route('client.target.details', ['idpersonnel' => $request->userid, 'tahun' => $request->tahun])->with('success', 'Success ! Your kpi has been added')->with('tab', 'kpi');
    }

    public function editKPI(Request $request)
    {
        //dd($request);
        //update eloquent
        $kpiupdate = target_kpi::find($request->idtargetkpi);
        $kpiupdate->kpi = $request->kpiedit;
        $kpiupdate->target = $request->targetedit;
        $kpiupdate->weight = $request->weightedit;
        $kpiupdate->save();

        //redirect with succes message
        return redirect()->route('client.target.details', ['idpersonnel' => $request->userid, 'tahun' => $request->tahun])->with('success', 'Success ! Your kpi has been edited')->with('tab', 'kpi');

        //echo 'edit KPI';
    }

    public function activateTarget(Request $request)
    {
        //data IN : user_id , tahun

        $datakpi = DB::table('target_kpi')
                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library')
                ->where('target_kpi.id_user', $request->user_id)
                ->where('target_kpi.periode_th', $request->tahun)
                ->orderBy('target_kpi.id_target_so', 'asc')
                ->get();


        // Insert active target kpi based on timeframe
        foreach ($datakpi as $datakpi)
        {
            switch ($datakpi->timeframe_target)
            {
                case 'bulanan':
                    //code
                    for ($i = 1; $i <= 12; $i++)
                    {
                        $activetarget = new active_target_kpi;
                        $activetarget->id_user = $request->user_id;
                        $activetarget->bulan = "$i";
                        $activetarget->tahun = $request->tahun;
                        $activetarget->so = $datakpi->so;
                        $activetarget->kpi = $datakpi->kpi;
                        $activetarget->unit = $datakpi->unit;
                        $activetarget->measurement = $datakpi->measurement;
                        $activetarget->target = $datakpi->target;
                        $activetarget->weight = $datakpi->weight;
                        $activetarget->polarization = $datakpi->polarization;
                        $activetarget->timeframe_target = $datakpi->timeframe_target;
                        $activetarget->save();
                    }
                    break;
                case 'triwulan':
                    //code
                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '3';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();

                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '6';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();

                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '9';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();

                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '12';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();
                    break;
                case 'quartal':
                    //code
                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '4';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();

                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '8';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();

                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '12';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();
                    break;
                case 'semester':
                    //code
                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '6';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();

                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '12';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();
                    break;
                case 'tahunan':
                    //code
                    $activetarget = new active_target_kpi;
                    $activetarget->id_user = $request->user_id;
                    $activetarget->bulan = '12';
                    $activetarget->tahun = $request->tahun;
                    $activetarget->so = $datakpi->so;
                    $activetarget->kpi = $datakpi->kpi;
                    $activetarget->unit = $datakpi->unit;
                    $activetarget->measurement = $datakpi->measurement;
                    $activetarget->target = $datakpi->target;
                    $activetarget->weight = $datakpi->weight;
                    $activetarget->polarization = $datakpi->polarization;
                    $activetarget->timeframe_target = $datakpi->timeframe_target;
                    $activetarget->save();
                    break;
            }
        }
        
        target_kpi::where('id_user', $request->user_id)
                ->where('periode_th', $request->tahun)
                ->update(['is_active'=>'1']);
        
        // update target kpi into is active = 1;
        return redirect()->route('client.target');
    }

}

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
    { // ** Memunculkan semua list personnel  
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
    { // ** Memunculkan detail personnel | req data : id personnel
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

        //guard jika target telah activated
        $count = target_kpi::where('id_user', $data->id)->where('periode_th', $request->tahun)->sum('is_active');
        if ($count != 0)
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

    public function check(Request $request)
    {
        // data in request : tahun, idpersonnel
        //dd($request);
        $data = User::where('id', $request->idpersonnel)->first();

        //get active target kpi  : var  so, kpi
        $activetarget = active_target_kpi::groupBy('so', 'id_target_kpi', 'kpi', 'unit')
                        ->select('so', 'id_target_kpi', 'kpi', 'unit')
                        ->where('id_user', $request->idpersonnel)
                        ->where('periode_th', $request->tahun)->get();
        $startingbln = target_kpi::where('id_user', $request->idpersonnel)->where('periode_th', $request->tahun)->first();


        return view('client.target.active',
                ['data' => $data,
                    'tahun' => $request->tahun,
                    'activetarget' => $activetarget,
                    'startingbln' => $startingbln['starting_bln'],
                    'range_period' => $startingbln['range_period']
        ]);
    }

    public function addSo(Request $request)
    { // ** Fungsi Store SO ke database
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

    public function deleteSo(Request $request)
    {
        // data in : idpersonnel , tahun, idso
        // delete kpi child
        target_kpi::where('id_target_so', $request->id_targetso)->delete();

        // delete so
        target_so::where('id', $request->id_targetso)->delete();

        //redirect with succes message
        return redirect()->route('client.target.details', ['idpersonnel' => $request->userid, 'tahun' => $request->tahun])->with('success', 'Success ! Your strategic objective has been deleted');
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
        //$kpidb->weight = $request->weight;
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
        $kpiupdate->timeframe_target = $request->timeframe;
        $kpiupdate->save();

        //redirect with succes message
        return redirect()->route('client.target.details', ['idpersonnel' => $request->userid, 'tahun' => $request->tahun])->with('success', 'Success ! Your kpi has been edited')->with('tab', 'kpi');

        //echo 'edit KPI';
    }

    public function deleteKPI(Request $request)
    {
        //dd($request);
        target_kpi::where('id', $request->id_targetkpi)->delete();

        //redirect with succes message
        return redirect()->route('client.target.details', ['idpersonnel' => $request->userid, 'tahun' => $request->tahun])->with('success', 'Success ! Your kpi target has been deleted');
    }

    public function activateTarget(Request $request)
    {

//        dd($request);
//        dd($request['totalHidden']);
        //data in 
        $tahun = $request->tahun;
        $user_id = $request->user_id;
        $totalHidden = $request->totalHidden;
        $startingbln = $request->startingbln;
        $rangeperiode = $request->rangeperiode;
        //data in array
        $idtargetkpi = $request->idtargetkpi;
        $weight = $request->weight;

        // if total bobot != 100 redirect back.
        if ($totalHidden != 100)
        {
            return redirect()->back()->with('error', 'Error ! Total Weight must be 100% ');
        }

        // update weight on db
        foreach ($idtargetkpi as $index => $idtarget)
        {
            $targetkpi = target_kpi::find($idtarget);
            $targetkpi->weight = $weight[$index];
            $targetkpi->starting_bln = $startingbln;
            $targetkpi->range_period = $rangeperiode;
            $targetkpi->save();
        }

        // baca data target kpi
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
                    $bln = $datakpi->starting_bln;
                    $tahun = $datakpi->periode_th;

                    for ($i = 1; $i <= 12; $i++)
                    {
                        $activetarget = new active_target_kpi;
                        $activetarget->id_user = $request->user_id;
                        $activetarget->id_target_kpi = $datakpi->id;
                        $activetarget->periode_th = $datakpi->periode_th;
                        $activetarget->range_period = $datakpi->range_period;
                        $activetarget->bulan = "$bln";
                        $activetarget->tahun = "$tahun";
                        $activetarget->so = $datakpi->so;
                        $activetarget->kpi = $datakpi->kpi;
                        $activetarget->unit = $datakpi->unit;
                        $activetarget->measurement = $datakpi->measurement;
                        $activetarget->target = $datakpi->target;
                        $activetarget->weight = $datakpi->weight;
                        $activetarget->polarization = $datakpi->polarization;
                        $activetarget->timeframe_target = $datakpi->timeframe_target;
                        $activetarget->save();
                        if ($bln == 12)
                        {
                            $bln = 1;
                            $tahun++;
                        }
                        else
                        {
                            $bln++;
                        }
                    }
                    break;
                case 'triwulan':
                    //code
                    $bln = $datakpi->starting_bln;
                    $tahun = $datakpi->periode_th;
                    $counter = 1;

                    for ($i = 1; $i <= 12; $i++)
                    {

                        if ($counter == 3)
                        {
                            $activetarget = new active_target_kpi;
                            $activetarget->id_user = $request->user_id;
                            $activetarget->id_target_kpi = $datakpi->id;
                            $activetarget->periode_th = $datakpi->periode_th;
                            $activetarget->range_period = $datakpi->range_period;
                            $activetarget->bulan = "$bln";
                            $activetarget->tahun = "$tahun";
                            $activetarget->so = $datakpi->so;
                            $activetarget->kpi = $datakpi->kpi;
                            $activetarget->unit = $datakpi->unit;
                            $activetarget->measurement = $datakpi->measurement;
                            $activetarget->target = $datakpi->target;
                            $activetarget->weight = $datakpi->weight;
                            $activetarget->polarization = $datakpi->polarization;
                            $activetarget->timeframe_target = $datakpi->timeframe_target;
                            $activetarget->save();
                            $counter = 0;
                        }
                        if ($bln == 12)
                        {
                            $bln = 1;
                            $tahun++;
                            $counter++;
                        }
                        else
                        {
                            $bln++;
                            $counter++;
                        }
                    }
                    //code
                    break;
                case 'quartal':
                    $bln = $datakpi->starting_bln;
                    $tahun = $datakpi->periode_th;
                    $counter = 1;

                    for ($i = 1; $i <= 12; $i++)
                    {

                        if ($counter == 4)
                        {
                            $activetarget = new active_target_kpi;
                            $activetarget->id_user = $request->user_id;
                            $activetarget->id_target_kpi = $datakpi->id;
                            $activetarget->periode_th = $datakpi->periode_th;
                            $activetarget->range_period = $datakpi->range_period;
                            $activetarget->bulan = "$bln";
                            $activetarget->tahun = "$tahun";
                            $activetarget->so = $datakpi->so;
                            $activetarget->kpi = $datakpi->kpi;
                            $activetarget->unit = $datakpi->unit;
                            $activetarget->measurement = $datakpi->measurement;
                            $activetarget->target = $datakpi->target;
                            $activetarget->weight = $datakpi->weight;
                            $activetarget->polarization = $datakpi->polarization;
                            $activetarget->timeframe_target = $datakpi->timeframe_target;
                            $activetarget->save();
                            $counter = 0;
                        }
                        if ($bln == 12)
                        {
                            $bln = 1;
                            $tahun++;
                            $counter++;
                        }
                        else
                        {
                            $bln++;
                            $counter++;
                        }
                    }
                    //code
                    break;
                case 'semester':
                    $bln = $datakpi->starting_bln;
                    $tahun = $datakpi->periode_th;
                    $counter = 1;

                    for ($i = 1; $i <= 12; $i++)
                    {

                        if ($counter == 6)
                        {
                            $activetarget = new active_target_kpi;
                            $activetarget->id_user = $request->user_id;
                            $activetarget->id_target_kpi = $datakpi->id;
                            $activetarget->periode_th = $datakpi->periode_th;
                            $activetarget->range_period = $datakpi->range_period;
                            $activetarget->bulan = "$bln";
                            $activetarget->tahun = "$tahun";
                            $activetarget->so = $datakpi->so;
                            $activetarget->kpi = $datakpi->kpi;
                            $activetarget->unit = $datakpi->unit;
                            $activetarget->measurement = $datakpi->measurement;
                            $activetarget->target = $datakpi->target;
                            $activetarget->weight = $datakpi->weight;
                            $activetarget->polarization = $datakpi->polarization;
                            $activetarget->timeframe_target = $datakpi->timeframe_target;
                            $activetarget->save();
                            $counter = 0;
                        }
                        if ($bln == 12)
                        {
                            $bln = 1;
                            $tahun++;
                            $counter++;
                        }
                        else
                        {
                            $bln++;
                            $counter++;
                        }
                    }
                    break;
                case 'tahunan':
                    $bln = $datakpi->starting_bln;
                    $tahun = $datakpi->periode_th;
                    $counter = 1;

                    for ($i = 1; $i <= 12; $i++)
                    {

                        if ($counter == 12)
                        {
                            $activetarget = new active_target_kpi;
                            $activetarget->id_user = $request->user_id;
                            $activetarget->id_target_kpi = $datakpi->id;
                            $activetarget->periode_th = $datakpi->periode_th;
                            $activetarget->range_period = $datakpi->range_period;
                            $activetarget->bulan = "$bln";
                            $activetarget->tahun = "$tahun";
                            $activetarget->so = $datakpi->so;
                            $activetarget->kpi = $datakpi->kpi;
                            $activetarget->unit = $datakpi->unit;
                            $activetarget->measurement = $datakpi->measurement;
                            $activetarget->target = $datakpi->target;
                            $activetarget->weight = $datakpi->weight;
                            $activetarget->polarization = $datakpi->polarization;
                            $activetarget->timeframe_target = $datakpi->timeframe_target;
                            $activetarget->save();
                            $counter = 0;
                        }
                        if ($bln == 12)
                        {
                            $bln = 1;
                            $tahun++;
                            $counter++;
                        }
                        else
                        {
                            $bln++;
                            $counter++;
                        }
                    }
                    break;
            }
        }

        target_kpi::where('id_user', $request->user_id)
                ->where('periode_th', $request->tahun)
                ->update(['is_active' => '1']);
        // update target kpi into is active = 1;
        return redirect()->route('client.target')->with('success', 'Success ! Target has been activated');
    }

    public function activateConfirm(Request $request)
    {

        $startingbln = $request->startingbln;
        $tahun = $request->tahun;
        if ($startingbln == 1)
        {
            $periodetarget = $startingbln . "/" . $tahun . " s/d 12/" . $tahun;
        }
        else
        {
            $periodetarget = $startingbln . "/" . $tahun . " s/d " . ($startingbln - 1) . "/" . ($tahun + 1);
        }

        $data = User::where('id', $request->idpersonnel)->first();
        //dd($request);

        $datakpi = DB::table('target_kpi')
                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library')
                ->where('target_kpi.id_user', $request->idpersonnel)
                ->where('target_kpi.periode_th', $request->tahun)
                ->orderBy('target_kpi.id_target_so', 'asc')
                ->get();

        return view('client.target.activateConfirm', ['data' => $data, 'tahun' => $request->tahun, 'datakpi' => $datakpi, 'periodetarget' => $periodetarget, 'startingbln' => $startingbln]);
    }

}

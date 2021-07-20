<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use App\Models\active_target_kpi;
use App\Models\capaian_kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class personnelCapaianController extends Controller {

    function index(Request $requset)
    {
        if ($requset->tahun == null)
        {
            // jika tidak request bulan tahun spesifik
            $bulan = date('n');
            $tahun = date('Y');
            // ambil active target dibulan sekarang dan tahun sekarang
            $target = active_target_kpi::where('id_user', Auth::user()->id)->where('tahun', $tahun)->where('bulan', $bulan)->get();
        }
        else
        {
            // jika request bulan tahun 
            $bulan = $requset->bulan;
            $tahun = $requset->tahun;

            // ambil active target dibulan berdasarkan inputan
            $target = active_target_kpi::where('id_user', Auth::user()->id)->where('tahun', $requset->tahun)->where('bulan', $requset->bulan)->get();
        }


        // all tahun active untuk modal pilih bulan tahun
        $alltahun = active_target_kpi::groupby('tahun')
                ->select('tahun')
                ->where('id_user', Auth::user()->id)
                ->get();
        // is_scored : untuk melihat kondisi di bulan & tahun tersebut sudah di nilai, 0 = belum  1= sudah
        $is_scoredq = active_target_kpi::select('is_scored', 'periode_th', 'range_period')
                ->where('id_user', Auth::user()->id)
                ->where('tahun', $tahun)
                ->where('bulan', $bulan)
                ->first();
        $is_scored = $is_scoredq['is_scored'];

//        dd($is_scored->is_scored);

        return view('personnel.capaian.capaian', ['bulan' => $bulan,
            'tahun' => $tahun,
            'target' => $target,
            'alltahun' => $alltahun,
            'is_scored' => $is_scored,
            'periode_th' => $is_scoredq['periode_th'],
            'range_period' => $is_scoredq['range_period']
        ]);
    }

    function addCapaian(Request $request)
    {
        //not array 
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $periode_th = $request->periode_th;
        //array
        $activetargetid = $request->activetargetid;
        $so = $request->so;
        $kpi = $request->kpi;
        $unit = $request->unit;
        $measurement = $request->measurement;
        $target = $request->target;
        $weight = $request->weight;
        $polarization = $request->polarization;
        $timeframe_target = $request->timeframe_target;
        $capaian = $request->capaian;

        // insert into table capaian_kpi
        foreach ($activetargetid as $index => $activetargetid)
        {
            $capaiankpi = new capaian_kpi;
            $capaiankpi->id_user = Auth::user()->id;
            $capaiankpi->id_active_target_kpi = $activetargetid;
            $capaiankpi->periode_th = $periode_th;
            $capaiankpi->bulan = $bulan;
            $capaiankpi->tahun = $tahun;
            $capaiankpi->so = $so[$index];
            $capaiankpi->kpi = $kpi[$index];
            $capaiankpi->unit = $unit[$index];
            $capaiankpi->measurement = $measurement[$index]; //measurement =   percentages , absolute number , index , rating , rangking 
            $capaiankpi->target = $target[$index];
            $capaiankpi->weight = $weight[$index];
            $capaiankpi->polarization = $polarization[$index]; // minimize / maximize
            $capaiankpi->timeframe_target = $timeframe_target[$index];
            $capaiankpi->capaian = $capaian[$index];
            //$capaiankpi->score = 1;  //harus di kalkulasi berdasarkan jenis measurementnya
            switch ($measurement[$index])
            {
                case 'percentages':
                    if ($polarization[$index] == 'maximize')
                    {
                        $score = ($capaian[$index] / $target[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    elseif ($polarization[$index] == 'minimize')
                    {
                        $score = ($target[$index] / $capaian[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    //code
                    break;
                case 'absolute number':
                    if ($polarization[$index] == 'maximize')
                    {
                        $score = ($capaian[$index] / $target[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    elseif ($polarization[$index] == 'minimize')
                    {
                        $score = ($target[$index] / $capaian[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    //code
                    break;
                case 'index':
                    if ($polarization[$index] == 'maximize')
                    {
                        $score = ($capaian[$index] / $target[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    elseif ($polarization[$index] == 'minimize')
                    {
                        $score = ($target[$index] / $capaian[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    //code
                    break;
                case 'rating':
                    if ($polarization[$index] == 'maximize')
                    {
                        $score = ($capaian[$index] / $target[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    elseif ($polarization[$index] == 'minimize')
                    {
                        $score = ($target[$index] / $capaian[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    //code
                    break;
                case 'rangking':
                    if ($polarization[$index] == 'maximize')
                    {
                        $score = ($capaian[$index] / $target[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    elseif ($polarization[$index] == 'minimize')
                    {
                        $score = ($target[$index] / $capaian[$index]) * 100;
                        $capaiankpi->score = $score;
                        $capaiankpi->weightedscore = $score*$weight[$index];
                    }
                    //code
                    break;
            }
            //measurement =   percentages , absolute number , index , rating , rangking 
            $capaiankpi->save();
        }

        //update is_scored field ti tabel active_target_kpi jadi 1
        active_target_kpi::where('id_user', Auth::user()->id)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)->update(['is_scored' => 1]);

        return redirect()->route('personnel.capaian', ['tahun' => $tahun, 'bulan' => $bulan]);
        //dd($request);
    }

}

<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\capaian_kpi;
use App\Models\target_kpi;
use Illuminate\Http\Request;

class performanceReportController extends Controller {

    function index(Request $request)
    {
        $alltahun = capaian_kpi::groupby('periode_th');
        // ** Memunculkan semua list personnel  
        if ($request->tahun == null)
        {
            // Default Tahun Sekarang
            $tahun = date('Y');
            // Homepage Target
            $user = User::all()->where('client_parent', Auth::user()->id);

            return view('client.performancereport.performancereport', ['user' => $user, 'tahun' => $tahun]);
        }
        else
        {
            //Tahun Pilihan
            // Homepage Target
            $user = User::all()->where('client_parent', Auth::user()->id);

            return view('client.performancereport.performancereport', ['user' => $user, 'tahun' => $request->tahun]);
        }
    }

    function details(Request $request)
    {
        // data in request : tahun, idpersonnel
        // data user
        $data = User::where('id', $request->user_id)->first();
        //data target dlm periode th
        $startingbln = target_kpi::where('id_user', $request->user_id)->where('periode_th', $request->periode_th)->first();
        $month = null;


        // === DATA UNTUK CHART JS === 
        // Data Labels Chart JS
        $bulanChart = array();
        $loopBlnChart = $startingbln['starting_bln'];
        for ($i = 0; $i < 12; $i++)
        {
            $bulanChart[] = date('F', mktime(0, 0, 0, $loopBlnChart, 10));
            if ($loopBlnChart == 12)
            {
                $loopBlnChart = 1;
                continue;
            }
            $loopBlnChart++;
        }
        $bulanChart = json_encode($bulanChart);


        // == Data Capaian Untuk Chart JS == 
        $capaianChart = array();
        $loopBlnChart = $startingbln['starting_bln'];
        $loopThChart = $startingbln['periode_th'];
        for ($i = 0; $i < 12; $i++)
        {
            $capaianChart[] = $this->getScoreBulanan($data->id, $loopBlnChart, $loopThChart);
            if ($loopBlnChart == 12)
            {
                $loopBlnChart = 1;
                $loopThChart++;
                continue;
            }
            $loopBlnChart++;
        }
        $capaianChart = json_encode($capaianChart);

        //dd($capaianChart);


        return view('client.performancereport.details', [
            'data' => $data,
            'periode_th' => $request->periode_th,
            'startingbln' => $startingbln['starting_bln'],
            'range_period' => $startingbln['range_period'],
            'month' => $month,
            'bulanChart' => $bulanChart,
            'capaianChart' => $capaianChart
        ]);
    }

    function getScoreBulanan($id_user, $bulan, $tahun)
    {
        $sumweight = capaian_kpi::where('id_user', $id_user)
                        ->where('bulan', $bulan)->where('tahun', $tahun)->sum('weight');
        $sumweightedscore = capaian_kpi::where('id_user', $id_user)
                        ->where('bulan', $bulan)->where('tahun', $tahun)->sum('weightedscore');
        if($sumweight!=0){
            $overallMonthlyScore = $sumweightedscore/$sumweight;
        } else {
            $overallMonthlyScore = 0;
        }
        
        return $overallMonthlyScore;
    }

}

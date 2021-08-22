<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\capaian_kpi;
use App\Models\target_kpi;
use App\Models\active_target_kpi;
use Illuminate\Http\Request;

class personnelPerformanceReportController extends Controller {

    function index(Request $request)
    {
        // data in request : tahun, idpersonnel
        // all tahun active untuk pilih  tahun periode
        $alltahun = active_target_kpi::groupby('periode_th')
                ->select('periode_th')
                ->where('id_user', Auth::user()->id)
                ->get();


        if ($request->periode_th == null)
        {
            //get periode today month and year
            $getperiode = active_target_kpi::where('tahun', date('Y'))->where('bulan', date('n'))->first();
            if ($getperiode == null)
            {
                $periodeth = null;
            }
            else
            {
                $periodeth = $getperiode['periode_th'];
            }
        }
        else
        {
            $periodeth = $request->periode_th;
        }


        // data user
        $data = User::where('id', Auth::user()->id)->first();

        //data target dlm periode th
        $targetquery = target_kpi::where('id_user', Auth::user()->id)
                        ->where('periode_th', $periodeth)->first();
        if ($targetquery == null)
        {
            $startingbln = null;
            $rangeperiod = null;
        }
        else
        {
            $startingbln = $targetquery['starting_bln'];
            $rangeperiod = $targetquery['range_period'];
        }


        //data dropdown bulan
        $dropdownbln = capaian_kpi::groupby('bulan', 'tahun')->select('bulan', 'tahun')->where('id_user', Auth::user()->id)->where('periode_th', $periodeth)->get();

        // === DATA UNTUK MONTHLY DETAILS ===
        if ($request->month == null)
        {
            $month = null;
            $year = null;
            $bulanScore = null;
            $datacapaian = null;
        }
        else
        {
            $month = $request->month;
            list($month, $year) = explode('-', $request->month);

            $datacapaian = capaian_kpi::where('id_user', Auth::user()->id)
                    ->where('tahun', $year)
                    ->where('bulan', $month)
                    ->get();

            $bulanScore = $this->getScoreBulanan(Auth::user()->id, $month, $year) / 100;
        }


        // === DATA UNTUK CHART JS === 
        // Data Labels Chart JS
        $bulanChart = array();
        $loopBlnChart = $startingbln;
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
        $loopBlnChart = $startingbln;
        $loopThChart = $periodeth;
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

        // pass data
        return view('personnel.performancereport.performancereport', [
            'data' => $data,
            'periode_th' => $periodeth,
            'startingbln' => $startingbln,
            'range_period' => $rangeperiod,
            'month' => $month,
            'year' => $year,
            'datacapaian' => $datacapaian,
            'bulanScore' => $bulanScore,
            'bulanChart' => $bulanChart,
            'capaianChart' => $capaianChart,
            'dropdownbln' => $dropdownbln,
            'alltahun' => $alltahun
        ]);
    }

    //function untuk kalkulasi score capaian bulanan
    function getScoreBulanan($id_user, $bulan, $tahun)
    {
        $sumweight = capaian_kpi::where('id_user', $id_user)
                        ->where('bulan', $bulan)->where('tahun', $tahun)->sum('weight');
        $sumweightedscore = capaian_kpi::where('id_user', $id_user)
                        ->where('bulan', $bulan)->where('tahun', $tahun)->sum('weightedscore');
        if ($sumweight != 0)
        {
            $overallMonthlyScore = $sumweightedscore / $sumweight;
        }
        else
        {
            $overallMonthlyScore = 0;
        }

        return $overallMonthlyScore;
    }

}

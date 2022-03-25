<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use App\Models\active_target_kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class personnelTargetController extends Controller {

    function index(Request $request)
    {
        if ($request->tahun != null)
        {
            $tahun = $request->tahun;
            $datatarget = active_target_kpi::groupby('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period')->select('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period')
                            ->where('id_user', Auth::user()->id)
                            ->where('periode_th', $request->tahun)->get();

            $queryActiveTarget = active_target_kpi::where('id_user', Auth::user()->id)->where('periode_th', $request->tahun)->first();
        }
        else
        {
            $tahun = date('Y');
            $datatarget = active_target_kpi::groupby('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period','unit')->select('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period','unit')
                            ->where('id_user', Auth::user()->id)
                            ->where('periode_th', date('Y'))->get();

            $queryActiveTarget = active_target_kpi::where('id_user', Auth::user()->id)->where('periode_th', date('Y'))->first();
        }


        // all tahun active untuk modal pilih bulan tahun
        $alltahun = active_target_kpi::groupby('periode_th')
                ->select('periode_th')
                ->where('id_user', Auth::user()->id)
                ->get();

        //ambil data range_period & periode_th
        if ($queryActiveTarget == null)
        {
            $range_period = null;
            $periode_th = null;
        }
        else
        {
            $range_period = $queryActiveTarget['range_period'];
            $periode_th = $queryActiveTarget['periode_th'];
        }

        return view('personnel.target.target', [
            'datatarget' => $datatarget,
            'range_period' => $range_period,
            'periode_th' => $periode_th,
            'alltahun' => $alltahun,
            'tahun' => $tahun
        ]);
    }

}

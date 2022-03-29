<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use App\Models\active_target_kpi;
use App\Models\target_status;
use App\Models\target_kpi;
use App\Models\target_so;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class personnelTargetController extends Controller {

    function index(Request $request)
    {
        if ($request->tahun != null)
        {
            $tahun = $request->tahun;
            $datatarget = active_target_kpi::groupby('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period')->select('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period')
                            ->where('id_user', Auth::user()->id)
                            ->where('periode_th', $request->tahun)->get();
            // untuk ambil range periode
            $queryActiveTarget = active_target_kpi::where('id_user', Auth::user()->id)->where('periode_th', $request->tahun)->first();
        }
        else
        {
            $tahun = date('Y');
            $iduser = Auth::user()->id;

            //target status
            $targetstatus = target_status::where('id_user', Auth::user()->id)
                            ->where('periode_th', $tahun)->first();

            if ($targetstatus->status == 'waiting for approval'||'approved')
            {
                $datatarget = DB::select("SELECT b.so, a.kpi, a.target, a.unit, a.weight, a.timeframe_target, a.range_period "
                                . "FROM target_kpi a, target_so b "
                                . "WHERE a.id_target_so = b.id AND a.id_user = $iduser AND a.periode_th = $tahun");
            }
            else
            {
                $datatarget = active_target_kpi::groupby('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period', 'unit')->select('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period', 'unit')
                                ->where('id_user', $iduser)
                                ->where('periode_th', date('Y'))->get();
            }

            // untuk ambil range periode
            $queryActiveTarget = active_target_kpi::where('id_user', $iduser)->where('periode_th', date('Y'))->first();
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
            'tahun' => $tahun,
            'targetstatus' => $targetstatus
        ]);
    }

    function approve(Request $request)
    {
        $iduser = Auth::user()->id;
        //dd($request->tahun);
        
        target_status::where('id_user', $iduser)
                ->where('periode_th', $request->tahun)
                ->update(['status' => 'approved']);

        //redirect with succes message
        return redirect()->route('personnel.target')
                        ->with('success', 'Success ! Anda telah menyetujui target yang telah ditetapkan oleh Team Leader, menunggu proses aktivasi target oleh Team Leader');
    }

    function reject()
    {
        
    }

}

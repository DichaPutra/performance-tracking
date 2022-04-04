<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\target_kpi;
use App\Models\target_si;
use App\Models\si_library;
use App\Models\actionplan;
use App\Models\active_target_kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class personnelInitiativeController extends Controller {

    function index(Request $request)
    {
        //Mengambil detail data personnel
        $data = User::where('id', Auth::user()->id)->first();

        // all tahun active untuk modal pilih bulan tahun
        $alltahun = active_target_kpi::groupby('periode_th')
                ->select('periode_th')
                ->where('id_user', Auth::user()->id)
                ->get();

        //tahun
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


        // get all kpi data by personnel 
        $datakpi = DB::table('target_kpi')
                ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library', 'range_period')
                ->where('target_kpi.id_user', Auth::user()->id)
                ->where('target_kpi.periode_th', $periodeth)
                ->orderBy('target_kpi.id_target_so', 'asc')
                ->get();

        // get data Target Strategic Inititives
        if ($request->idkpi == null)
        {
            $datakpiselected = null;
            $datasi = null;
        }
        else
        {
            //get data kpi with SO
            $datakpiselected = DB::table('target_kpi')
                    ->join('target_so', 'target_kpi.id_target_so', '=', 'target_so.id')
                    ->select('target_kpi.*', 'target_so.so', 'target_so.id_so_library')
                    ->where('target_kpi.id', $request->idkpi)
                    ->first();
            $datasi = target_si::where('id_target_kpi', $request->idkpi)->where('periode_th', $periodeth)->get();
        }

        return view('personnel.initiative.kpi', [
            'data' => $data,
            'datakpi' => $datakpi,
            'tahun' => $periodeth,
            'periode_th' => $periodeth,
            'datakpiselected' => $datakpiselected,
            'datasi' => $datasi,
            'alltahun' => $alltahun
        ]);
    }

    function addInitiative(Request $request)
    {
        if ($request->id_si_library == 0)
        {
            // if custom
            $addtargetsi = new target_si;
            $addtargetsi->id_user = $request->id_user;
            $addtargetsi->id_target_kpi = $request->id_target_kpi;
            $addtargetsi->id_si_library = null;
            $addtargetsi->si = $request->customsi;
            $addtargetsi->periode_th = $request->periode_th;
            $addtargetsi->approval = 'waiting for approval';
            $addtargetsi->save();

            return redirect()->back()->with('success', 'Success ! Strategic Initiative has been added');
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
            $addtargetsi->approval = 'waiting for approval';
            $addtargetsi->save();

            return redirect()->back()->with('success', 'Success ! Strategic Initiative has been added');
        }
    }

    function editInitiative(Request $request)
    {
        //dd($request->idsi);
        //update SI
        target_si::where('id', $request->idsi)->update(['si' => $request->si,'approval' => 'waiting for approval','keterangan' => null]);

        return redirect()->back()->with('success', 'Success ! Strategic Initiative has been approved');
    }

    function deleteInitiative(Request $request)
    {
        //dd($request);
        //delete action plan child where idsi
        actionplan::where('id_target_si', $request->idsi)->delete();

        //delete si
        target_si::where('id', $request->idsi)->delete();

        return redirect()->back()->with('success', 'Success ! Strategic Initiative has been deleted');
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


        return view('personnel.initiative.actionplan', ['data' => $data,
            'datakpiselected' => $datakpiselected,
            'datasi' => $datasi,
            'tahun' => $request->tahun,
            'actionplan' => $actionplan]);
    }

    function addActionPlan(Request $request)
    {
        // data need id_target_si, periode_th, id_user, idkpiselected
        //dd($request);

        $insertap = new actionplan;
        $insertap->id_user = $request->id_user;
        $insertap->id_target_si = $request->id_target_si;
        $insertap->actionplan = $request->actionplan;
        $insertap->periode_th = $request->tahun;
        $insertap->approval = 'waiting for approval';
        $insertap->save();

        //redirect with succes message
        return redirect()->route('personnel.initiative.actionplan', [
                            'idpersonnel' => $request->id_user,
                            'tahun' => $request->tahun,
                            'idkpiselected' => $request->idkpiselected,
                            'idsi' => $request->id_target_si
                        ])
                        ->with('success', 'Success ! Action Plan has been added');
    }

    function deleteActionPlan(Request $request)
    {
        // id idactionplan
        actionplan::where('id', $request->idactionplan)->delete();

        //redirect with succes message
        return redirect()->route('personnel.initiative.actionplan', [
                            'idpersonnel' => $request->id_user,
                            'tahun' => $request->tahun,
                            'idkpiselected' => $request->idkpiselected,
                            'idsi' => $request->id_target_si
                        ])
                        ->with('success', 'Success ! Action Plan has been deleted');
        //dd($request);
    }

}

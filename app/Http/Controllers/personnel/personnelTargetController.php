<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use App\Models\active_target_kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class personnelTargetController extends Controller {

    function index()
    {
        //dd(Auth::user()->id);
        $datatarget = active_target_kpi::groupby('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period')->select('so', 'kpi', 'target', 'weight', 'timeframe_target', 'range_period')
                        ->where('id_user', Auth::user()->id)
                        ->where('tahun', date('Y'))->get();

        $target = active_target_kpi::where('id_user', Auth::user()->id)->where('periode_th', date('Y'))->first();
        $target = $target['range_period'];
//        dd($target['range_period']);
        //dd($datatarget);
        return view('personnel.target.target', ['datatarget' => $datatarget, 'range_target' => $target]);
    }

}

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
        $datatarget = active_target_kpi::groupby('so', 'kpi', 'target', 'weight', 'timeframe_target')->select('so', 'kpi', 'target', 'weight', 'timeframe_target')
                        ->where('id_user', Auth::user()->id)
                        ->where('tahun', date('Y'))->get();
        //dd($datatarget);
        return view('personnel.target.target', ['datatarget' => $datatarget]);
    }

}

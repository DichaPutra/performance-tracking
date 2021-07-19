<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\capaian_kpi;
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
//        dd($request);
        $data = User::where('id', $request->user_id)->first();

        
        return view('client.performancereport.details',['data' => $data, 'periode_th' => $request->periode_th]);
    }

}

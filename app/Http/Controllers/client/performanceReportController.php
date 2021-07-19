<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\capaian_kpi;
use Illuminate\Http\Request;

class performanceReportController extends Controller {

    public function indexxxx(Request $request)
    {
        
    }

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

}

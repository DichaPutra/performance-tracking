<?php

namespace App\Http\Controllers\admin;

use App\Models\bisnis;
use App\Models\so_library;
use App\Models\kpi_library;
use App\Models\si_library;
use App\Models\business_categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dataLibraryController extends Controller {

    function index(Request $request)
    {
        if ($request->bc != null)
        {
            //dd($request);
            $selectedbc = $request->bc;
            $bisnis = bisnis::where('id_business_categories', $request->bc)->get();
            $businesscategories = business_categories::get();
            $solibrary = so_library::where('id_business_categories', $request->bc)->get();
        }
        else
        {
            $selectedbc = null;
            $bisnis = null;
            $businesscategories = business_categories::get();
            $solibrary = so_library::get();
        }

        return view('admin.datalibrary.datalibrary', [
            'solibrary' => $solibrary,
            'selectedbc' => $selectedbc,
            'bisnis' => $bisnis,
            'businesscategories' => $businesscategories]);
    }

    function addSo(Request $request)
    {
        //dd($request);
        $addso = new so_library;
        $addso->id_business_categories = $request->id_business_categories;
        $addso->bisnis = $request->bisnis;
        $addso->aspect = $request->aspect;
        $addso->so = $request->so;
        $addso->save();

        //redirect back with success
        return redirect()->back()->with('success', 'Success ! Strategic Objective Library has been added');
    }

    function kpilibrary(Request $request)
    {
        // data in = idso
        //dd($request);
        $dataso = so_library::where('id', $request->idso)->first();
        $datakpi = kpi_library::where('id_so_library', $request->idso)->get();

        return view('admin.datalibrary.kpilibrary', [
            'dataso' => $dataso,
            'datakpi' => $datakpi
        ]);
    }

    function addKpi(Request $request)
    {
        // data in : id_so_library, kpi, unit, measurement, polarization
        //input data
        $datakpi = new kpi_library;
        $datakpi->id_so_library = $request->id_so_library;
        $datakpi->kpi = $request->kpi;
        $datakpi->unit = $request->unit;
        $datakpi->measurement = $request->measurement;
        $datakpi->polarization = $request->polarization;
        $datakpi->save();

        //redirect back with success
        return redirect()->back()->with('success', 'Success ! KPI Library has been added');
    }

    function silibrary(Request $request)
    {
        //data in = idso, idkpi
        //dd($request);
        $dataso = so_library::where('id', $request->idso)->first();
        $datakpi = kpi_library::where('id', $request->idkpi)->first();
        $datasi = si_library::where('id_kpi_library', $request->idkpi)->get();

        return view('admin.datalibrary.silibrary', [
            'dataso' => $dataso,
            'datakpi' => $datakpi,
            'datasi' => $datasi
        ]);
    }

    function addSi(Request $request)
    {
        // data in = id_kpi_library, si
        //input data
        $datasi = new si_library;
        $datasi->id_kpi_library = $request->id_kpi_library;
        $datasi->si = $request->si;
        $datasi->save();

        //redirect back with success
        return redirect()->back()->with('success', 'Success ! Strategic Initiative Library has been added');
    }

    function deleteSi(Request $request)
    {
        // data in = idsi
        
        //delete si library
        si_library::where('id', $request->idsi)->delete();
        
        //redirect back with success
        return redirect()->back()->with('success', 'Success ! SI Library has been deleted');
    }

}

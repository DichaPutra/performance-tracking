<?php

namespace App\Http\Controllers\admin;

use App\Models\bisnis;
use App\Models\so_library;
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
        return redirect()->back()->with('success', 'Success ! bisnis has been added');
    }

}

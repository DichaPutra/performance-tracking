<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\bisnis;
use App\Models\business_categories;
use Illuminate\Http\Request;

class businessCategoriesController extends Controller {

    function index(Request $request)
    {
        // get all business category
        if ($request->category == null)
        {
            $bisnis = null;
            $selectedbc = null;
            $businesscategories = business_categories::get();
        }
        else
        {
            $id_business_categories = $request->category;
            $bisnis = bisnis::where('id_business_categories', $id_business_categories)->get();
            $selectedbc = business_categories::where('id', $request->category)->first();
            $businesscategories = business_categories::get();
        }


        return view('admin.datalibrary.businesscategories', [
            'businesscategories' => $businesscategories,
            'bisnis' => $bisnis,
            'selectedbc' => $selectedbc
        ]);
    }

    function addBusinessCategories(Request $request)
    {
        //data in = businesscategories

        $addbisnis = new business_categories;
        $addbisnis->category = $request->businesscategories;
        $addbisnis->save();

        //redirect back with success
        return redirect()->back()->with('success', 'Success ! bisnis has been added');
    }

    function addBisnis(Request $request)
    {
        //data in = idbc , bisnis

        $addbisnis = new bisnis;
        $addbisnis->id_business_categories = $request->idbc;
        $addbisnis->bisnis = $request->bisnis;
        $addbisnis->save();

        //redirect back with success
        return redirect()->back()->with('success', 'Success ! bisnis has been added');
    }

    function deleteBisnis(Request $request)
    {
        //data in = idbisnis
        //dd($request);
        
        bisnis::where('id', $request->idbisnis)->delete();

        //redirect back with success
        return redirect()->back()->with('success', 'Success ! bisnis has been deleted');
    }

}

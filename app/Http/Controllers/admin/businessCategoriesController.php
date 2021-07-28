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
            $businesscategories = business_categories::get();
        }
        else
        {
            $id_business_categories = $request->category;
            $bisnis = bisnis::where('id_business_categories', $id_business_categories)->get();
            $businesscategories = business_categories::get();
        }


        return view('admin.datalibrary.businesscategories', [
            'businesscategories' => $businesscategories,
            'bisnis' => $bisnis
        ]);
    }

}

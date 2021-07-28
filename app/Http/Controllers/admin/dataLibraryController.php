<?php

namespace App\Http\Controllers\admin;

use App\Models\so_library;
use App\Models\business_categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dataLibraryController extends Controller {

    function index()
    {
        $bisnis = null;
        $businesscategories = business_categories::get();
        $solibrary = so_library::get();
        return view('admin.datalibrary.datalibrary', [
            'solibrary' => $solibrary,
            'bisnis' => $bisnis,
            'businesscategories' => $businesscategories]);
    }

}

<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class personnelCapaianController extends Controller {

    function index()
    {
        return view('personnel.capaian.capaian');
    }

}

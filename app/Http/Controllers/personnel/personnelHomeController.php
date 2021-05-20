<?php

namespace App\Http\Controllers\personnel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class personnelHomeController extends Controller {

    public function index() {
        return view('personnel.home');
    }

}

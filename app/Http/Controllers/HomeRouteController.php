<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeRouteController extends Controller {

    public function index()
    {
        if (auth()->user()->role == 'admin')
        {
            return redirect()->route('admin.home');
        }
        elseif (auth()->user()->role == 'client')
        {
            return redirect()->route('client.home');
        }
        elseif (auth()->user()->role == 'personnel')
        {
            return redirect()->route('personnel.home');
        }
    }

}

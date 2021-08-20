<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeRouteController extends Controller {

    public function index()
    {
        // Reset password & verified account success messages
        return view('auth.verifysuccess');
        
//        if (auth()->user()->role == 'admin')
//        {
//            return redirect()->route('admin.home')->with('success','');
//        }
//        elseif (auth()->user()->role == 'client')
//        {
//            return redirect()->route('client.home');
//        }
//        elseif (auth()->user()->role == 'personnel')
//        {
//            return redirect()->route('personnel.home');
//        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Rules\MatchOldPassword;

class ChangePasswordController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('changePassword');
    }

    public function store(Request $request) {
//        dd($request);
        echo "$request->new_passwor";
        echo "$request->new_confirm_password";
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'between:8,255'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Success! Your password has been change');
    }

}

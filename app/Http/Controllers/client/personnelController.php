<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class personnelController extends Controller {

    public function index() {
        return view('client.personnel.personnel');
    }

    public function addpersonnel() {
        return view('client.personnel.addpersonnel');
    }

    public function detailpersonnel() {
        return view('client.personnel.detailpersonnel', ['edit' => '0']);
    }

    public function editpersonnel() {
        return view('client.personnel.detailpersonnel', ['edit' => '1']);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'company_name' => ['required'],
                    'company_address' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('client-personnel-addpersonnel')
                            ->withErrors($validator)
                            ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'password' => Hash::make($request->password),
            'role' => 'personnel',
            'client_parent' => Auth::user()->id,
            'level' => $request->level,
            'position' => $request->position
        ]);
        
        return redirect('client-personnel')->with('message', 'Success ! Your personnel has been added');
    }

}

<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class personnelController extends Controller {

    public function index()
    {
        $user = User::all()->where('client_parent', Auth::user()->id);
        return view('client.personnel.personnel', ['user' => $user]);
    }

    public function addpersonnel()
    {
        return view('client.personnel.addpersonnel');
    }

    public function detailpersonnel(Request $request)
    {
        $idpersonnel = $request->idpersonnel;
        $data = User::where('id', $idpersonnel)->first();
        return view('client.personnel.detailpersonnel', ['edit' => '0', 'data' => $data]);
    }

    public function editpersonnel(Request $request)
    {
        $idpersonnel = $request->idpersonnel;
        $data = User::where('id', $idpersonnel)->first();
        return view('client.personnel.detailpersonnel', ['edit' => '1', 'data' => $data]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'company_name' => ['required'],
                    'company_address' => ['required']
        ]);

        if ($validator->fails())
        {
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
            'position' => $request->position,
            'level_name' => $request->level_name
        ]);

        return redirect('client-personnel')->with('message', 'Success ! Your personnel has been added');
    }

    public function update(Request $request)
    {
        //get data prev
        $dataprev = User::where('id', $request->id)->first();

        //if email not change
        if ($dataprev->email == $request->email)
        {
            if ($request->password != NULL)
            {
                $validator = Validator::make($request->all(), [
                            'name' => ['required', 'string', 'max:255'],
                            'password' => ['required', 'string', 'min:8', 'confirmed'],
                            'position' => ['required', 'string']
                ]);
            }
            else
            {
                $validator = Validator::make($request->all(), [
                            'name' => ['required', 'string', 'max:255'],
                            'position' => ['required', 'string']
                ]);
            }
        }
        else
        {
            if ($request->password != NULL)
            {
                $validator = Validator::make($request->all(), [
                            'name' => ['required', 'string', 'max:255'],
                            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                            'password' => ['required', 'string', 'min:8', 'confirmed'],
                            'position' => ['required', 'string'],
                            'level_name' => ['required', 'string']
                ]);
            }
            else
            {
                $validator = Validator::make($request->all(), [
                            'name' => ['required', 'string', 'max:255'],
                            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                            'position' => ['required', 'string'],
                            'level_name' => ['required', 'string']
                ]);
            }
        }

        // Redirect Validator
        if ($validator->fails())
        {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Update Data
        $user = User::where('id', $request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != NULL)
        {
            $user->password = Hash::make($request->password);
        }
        $user->position = $request->position;
        $user->level_name = $request->level_name;
        $user->save();

        return redirect()->route('client.personnel.detailpersonnel', ['idpersonnel' => $request->id])->with('success', 'Success ! Personnel data has been updated ');
    }

}

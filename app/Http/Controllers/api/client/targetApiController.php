<?php

namespace App\Http\Controllers\api\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\target_so;

class targetApiController extends Controller {

    public function getCountSO($id) {
        // in : id personnel
        // out : int count SO
        
        $countSo = target_so::where('id_user',$id)->count();
        return json_encode($countSo);
    }

}

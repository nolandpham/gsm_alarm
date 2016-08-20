<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Area;

class GsmController extends Controller
{
    protected function validator(Request $req)
    {
        return Validator::make($req->all(), [
            // 'token' => 'required|alpha_num|size:8',
            'token' => 'required|alpha_num|size:8|exists:tokens,str',
        ]);
    }
    
    public function status() {
        $areas = Area::where("is_deleted", 0)->get();
        return Response::json(array(
            'error' => false,
            'areas' => Area::shortFormat( $areas),
            'status_code' => 200
        ));
    }

    public function reset( Request $request) {
        if( $this->validator( $request)->fails())
            return 0;

        Area::where("is_deleted", 0)
            ->update(['status' => Area::$STATUS_LIVING]);

        return 1;
    }
}

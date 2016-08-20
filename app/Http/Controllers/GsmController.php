<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Response;
use App\Area;

class GsmController extends Controller
{
    
    public function inactive( Request $request) {
        $validator = Validator::make($request->all(), [
            'token' => 'required|alpha_num|size:8|exists:tokens,str',
            'area' => 'required|integer|exists:areas,id',
        ]);
        if( $validator->fails())
            return 0;

        // Update database
        Area::where("id", $request->input("area"))
            ->where("is_deleted", 0)
            ->update(['status' => Area::$STATUS_INACTIVE]);
        
        return 1;
    }

    public function reset( Request $request) {
        $validator = Validator::make($request->all(), [
            'token' => 'required|alpha_num|size:8|exists:tokens,str',
        ]);
        if( $validator->fails())
            return 0;

        Area::where("is_deleted", 0)
            ->update(['status' => Area::$STATUS_LIVING]);

        return 1;
    }
}

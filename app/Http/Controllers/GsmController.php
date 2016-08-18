<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GsmController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'token' => 'required|alpha_num|size:8',
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

    public function reset() {
        if( $this->validator( $request)->fails())
            return 0;

        Area::where("is_deleted", 0)
            ->update(['status' => Area::STATUS_LIVING]);

        return 1;
    }
}

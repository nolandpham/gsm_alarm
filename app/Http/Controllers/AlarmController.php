<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Token;
use App\Area;
use Validator;
use Response;

class AlarmController extends Controller
{
    protected function validator(Request $req)
    {
        return Validator::make($req->all(), [
            'token' => 'required|alpha_num|size:8|exists:tokens,str',
            'area' => 'required|integer|exists:areas,id',
        ]);
    }

    public function alarm( Request $request) {
        if( $this->validator( $request)->fails())
            // validate false
            return 0;

        // Update database
        $status = $request->is("alarm_stop")?1:2;
        Area::where("id", $request->input("area"))
            ->where("is_deleted", 0)
            ->update(['status' => $status]);
        
        return 1;
    }

    public function panel() {
        $areas = Area::where("is_deleted", 0)->get();
        return view('panel', array(
            'areas' => Area::shortFormat( $areas)
        ));
    }

    public function areas() {
        $areas = Area::where("is_deleted", 0)->get();
        return Response::json(array(
            'error' => false,
            'areas' => Area::shortFormat( $areas),
            'status_code' => 200
        ));
    }
}

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
    	return "this is status";
    }
}

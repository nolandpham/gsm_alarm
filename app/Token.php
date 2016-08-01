<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Token extends Model
{
    //
    protected $table = 'tokens';

    public static function check( $token) {
    	$result = false;
    	$token = Token::where('str', $token)->first();
    	if( isset( $token)) {
    		$result = $token->project;
    	}

    	return $result;
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}

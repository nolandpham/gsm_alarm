<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    public static function shortFormat( $areas) {
    	$result = array();
    	foreach ($areas as $area) {
    		$result[] = array(
    			"id" => intval( $area->id),
    			"name" => $area->name,
    			"status" => intval( $area->status),
    		);
    	}

    	return $result;
    }
}

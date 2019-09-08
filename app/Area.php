<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    public static $STATUS_INACTIVE = 0;
    public static $STATUS_LIVING = 1;
    public static $STATUS_DELETED = 2;

    public static function shortFormat( $areas) {
    	$result = array();
    	foreach ($areas as $area) {
    		$result[] = array(
    			"id" => intval( $area->id),
    			"name" => $area->name,
                "status" => intval( $area->status),
                "lat" => $area->lat,
                "lng" => $area->lng,
    		);
    	}

    	return $result;
    }
}

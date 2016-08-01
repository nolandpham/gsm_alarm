jQuery( document).ready( function( $) {
	// All define
	const DELAY_TIME = 2;// 2sec

	function red_blink( area_id) {
		var box = $("#area_" + area_id).removeClass("box_green box_yellow").addClass("box_red");
		for (var i = 0; i < DELAY_TIME; i++) {
			box.fadeOut( 500).fadeIn( 500);// effect need 1sec
		};
	}
	function yellow_blink( area_id) {
		var box = $("#area_" + area_id).removeClass("box_green box_red").addClass("box_yellow");
		for (var i = 0; i < DELAY_TIME; i++) {
			box.fadeOut( 500).fadeIn( 500);// effect need 1sec
		}
	}
	function stop_blink( area_id) {
		$("#area_" + area_id).removeClass("box_yellow box_red").addClass("box_green").stop();
	}
	
	var areas_status = [];
	function main() {
		$.get( host + "/areas", function( response) {
			// do alert
			alert( "Found some error in system. Please check!");
			$.each( response['areas'], function( key, area) {
				if( area["status"] == 0) {
					yellow_blink( area["id"]);

				} else if( area["status"] == 2) {
					red_blink( area["id"]);

				} else {// same 1 or other
					stop_blink( area["id"]);
				}
			});
		});
	}
	setInterval( main, DELAY_TIME*1000);
});
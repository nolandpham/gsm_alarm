jQuery( document).ready( function( $) {
	// All define
	const DELAY_TIME = 10;// 10sec

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
	function scroll_to_area( area_id) {
		$('html, body').animate({
	        scrollTop: $("#area_" + area_id).offset().top
	    }, 2000);
	}

	var areas_status = [];
	function main() {
		$.get( host + "/areas", function( response) {
			$.each( response['areas'], function( key, area) {
				if( area["status"] == 0) {
					scroll_to_area( area["id"]);
					yellow_blink( area["id"]);

				} else if( area["status"] == 2) {
					scroll_to_area( area["id"]);
					red_blink( area["id"]);

				} else {// same 1 or other
					stop_blink( area["id"]);
				}
			});
		});
	}
	setInterval( main, DELAY_TIME*1000);
});

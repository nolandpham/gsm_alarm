<!DOCTYPE html>
<html>
    <head>
        <title>GSM Alarm</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
        <script>
            /******** GLOBAL VARIABLES ***********/
            var host = "{{url("/")}}";
            var map, bounds;
            var areas = [];
            var markers = [];
            var activeInfoWindows = [];

            /******** CONSTANT DEFINE ***********/
            const DELAY_TIME = 5;// sec
            var markerStyle = [
                /* default */   'http://maps.google.com/mapfiles/kml/pal2/icon13.png',
                /* warning */   'http://maps.google.com/mapfiles/kml/pal3/icon34.png',
                /* big alert */ 'http://maps.google.com/mapfiles/kml/shapes/caution.png'
            ];


            /******** FUNCTIONS ***********/
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 10.7748478, lng: 106.693879},
                    zoom: 8
                });
                bounds = new google.maps.LatLngBounds();

                refreshMarkers();
            };

            function refreshMarkers() {
                console.log('refreshMarkers');
                $.get(host + '/areas', null, function(response) {
                    console.log(response);
                    if(response.status_code == 200) {
                        var json = JSON.stringify(response.areas);
                        $("form#areas input#areas").val(json);

                        refreshMap();
                    } else {
                        alert("Không thể load map. Xin vui lòng thử lại sau.");
                    }
                });
            }

            function checkAlarm(areas) {
                console.log('checkAlarm');
                var result = false;
                for (var i = areas.length - 1; i >= 0; i--) {
                    if (areas[i].status != 0) {
                        console.log("Found alert at: " + areas[i].name);
                        result = true;
                    }
                }
                return result;
            }

            function refreshMap() {
                console.log('refreshMap');
                // do clear all marker, infoWindow
                clearMap();
                var tmp = JSON.parse($('form#areas input#areas').val());
                for (var i = tmp.length - 1; i >= 0; i--) {
                    var area = [];
                    area['id'] = tmp[i].id;
                    area['name'] = tmp[i].name;
                    area['status'] = tmp[i].status;
                    area['lat'] = Number(tmp[i].lat);
                    area['lng'] = Number(tmp[i].lng);

                    // create obj
                    areas.push(area);
                    if(area['lat'] != '' && area['lng'] != '') {
                        var position = {lat: area['lat'], lng: area['lng']};
                        var marker = new google.maps.Marker({
                            position: position,
                            icon: markerStyle[area['status']],
                            map: map
                        });
                        marker.name = area['name'];
                        marker.status = area['status'];
                        marker.addListener('click', function(event) {
                            console.log('click marker');
                            // console.log(event);
                            activeMarker(this);
                        })

                        markers.push(marker);
                        bounds.extend(marker.getPosition());

                        // check alert
                        if(area.status != 0) {
                            activeMarker(marker);
                        }
                    }
                }
                map.fitBounds(bounds);
            }

            function clearMap() {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                }
                markers = [];
                for (var i = activeInfoWindows.length - 1; i >= 0; i--) {
                    activeInfoWindows[i].close();
                }
                activeInfoWindows = [];
            }

            function activeMarker(marker) {
                console.log('activeMarker: ' + marker.name);
                var infoWindow = new google.maps.InfoWindow({
                    content: infoWindowFormat(marker)
                });
                infoWindow.open(map, marker);
                activeInfoWindows.push(infoWindow);
            }
            
            function infoWindowFormat(marker) {
                var tmpStatus = 'default';
                var tmpColor = 'white';
                if(marker.status == 1) {
                    tmpStatus = 'warning';
                    tmpColor = 'yellow';
                } else if(marker.status == 2) {
                    tmpStatus = 'Alarm';
                    tmpColor = 'red';
                }
                var alertContent = "<b>Name: </b>" + marker.name + "<br/>"
                                 + "<b>Status: </b><b style='display: inline; background-color: " + tmpColor + "'>" + tmpStatus + "</b></div>";

                return alertContent;
            }
            
            // set refresh map
            setInterval(refreshMarkers, DELAY_TIME*1000);
        </script>
    </head>
    <body>
        <form id="areas">
            <input type="hidden" name="areas" id="areas" value="{{ $areas }}" />
        </form>
        <div class="content">
            <div class="title">GSM Alarm</div>
            <div id="panel" style="height: 800px;">
                    <div id="map" style="height: 800px;"></div>
            </div>

            <div class="footer"><b>Copyright:</b> <a href="http://vnsmarthome.vn/">Cty Nguyen Brother JSC</a>.</div>
        </div>

        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxjXFf52XlOq0v55B7DTdy5szz67MO37g&callback=initMap" async defer></script>
    </body>
</html>

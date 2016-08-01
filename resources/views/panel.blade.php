<!DOCTYPE html>
<html>
    <head>
        <title>GSM Alarm</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
        <script>
            var host = "{{url("/")}}";
        </script>
    </head>
    <body>
        <div class="content">
            <div class="title">GSM Alarm</div>
            <div id="panel">
                <div class="row-fluid show-grid">
                @for( $i=0; $i < count( $areas); $i++)
                    <div id="area_{{ $areas[$i]['id'] }}" data-id="{{ $areas[$i]['id'] }}" class="span2 box box_green">{{ $areas[$i]['name'] }}</div>
                @if( $i != 0 && ($i+1)%6 == 0)
                </div><div class="row-fluid show-grid">
                @endif
                @endfor
                </div>
            </div>
            <div class="footer"><b>Copyright:</b> <a href="http://vnsmarthome.vn/">Cty Nguyen Brother JSC</a>.</div>
        </div>

        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/script.js') }}"></script>
    </body>
</html>

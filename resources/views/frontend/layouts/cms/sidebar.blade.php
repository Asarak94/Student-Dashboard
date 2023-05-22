<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.cms.head')
</head>
<body>

@include('frontend.includes.cms.header')
@include('frontend.includes.cms.sidebar')
@yield('content')

</div>
</div>
<script src="{{ asset('public/backend_panel/js/custom.js') }}"></script>
@if(Session::has('action') && Session::has('title'))
    <script>
        var alert_action = '{{Session::get('action')}}';
        var alert_msg = '{{Session::get('title')}}';
        if(alert_action=="SUCCESS"){
            showAlert("SUCCESS",alert_msg);
        } else {
            showAlert("ERROR",alert_msg);
        }
    </script>
@endif
</body>
</html>
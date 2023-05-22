<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.head')
</head>
<body class="inner-page">

{{--@include('frontend.includes.header')--}}
<div class="row min-hgt-inr ">
    <div class="col-md-12">
        @yield('content')
        {{--@include('frontend.includes.footer')--}}
    </div>
</div>

<script src="{!! asset('public/js/custom.js') !!}"></script>
</body>
</html>

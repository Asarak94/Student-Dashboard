<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.head')
</head>
<body>

    <div class="row">
        <div class="col-md-12 back-white">
            <div class="row align-items-center">
                <div class="col-lg-9 login-back d-none d-lg-block">

                </div>
                <div class="col-lg-3 mobile-back">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</body>
</html>

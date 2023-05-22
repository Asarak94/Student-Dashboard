<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.includes.cms.head')
</head>
<body>

<div class="row head">
    <div class="col-xs-10 col-xs-offset-1">
        <div class="row">
            <div class="col-sm-3 text-center">
                <h3 class="logo-text">Choose the System</h3>
            </div>
            <div class="col-sm-9">
                @if (Auth::guest())
                    <a class="log-name" href="{{ url('/login') }}">Login</a>
                    <a class="log" href="{{ url('/register') }}">Register</a>
                @else
                    <div class="dropdown col-sm-3 pull-right">
                        <a href="#" class="btn login_btn_style btn-default dropdown-toggle text-center" data-toggle="dropdown" id="dropdownMenu1" role="button" aria-expanded="true">
                            <span>Hi!&nbsp;</span>{{ Auth::user()->name }} &nbsp;<span class="glyphicon glyphicon-user"></span>
                        </a>

                        <ul class="dropdown-menu col-sm-3" aria-labelledby="dropdownMenu1">
                            <li>
                                <a href="{{ url('/logout') }}" class="text-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1 gray-back main-div-border">


        @yield('content')
    </div>
</div>

</body>
</html>
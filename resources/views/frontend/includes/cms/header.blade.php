<div class="row head">
    <div class="col-xs-10 col-xs-offset-1">
        <div class="row">
            <div class="col-sm-3 text-left">
                <a href="{{ route('time-slot.index') }}"><img src="{!! url('public//images/Logo-Final.png') !!}" height="40px" class="logo-pos logo"></a>
                <h3 class="logo-text"></h3>
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
                                <a href="#" class="text-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <a href="{{ route('reset_password') }}" class="text-center" style="color: #ae0045">
                                    Change Password
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                             {{--   <form id="reset-form'" action="{{ route('reset_password') }}" method="get" style="display: none;">
                                    {{ csrf_field() }}
                                </form>--}}
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">News</a></li>
                    <li><a href="#">Promotions</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1 gray-back main-div-border">
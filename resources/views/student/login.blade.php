@include('backend.includes.cms.head')

<div class="row login_bg">

    <div class="col-xs-3 col-sm-7 col-md-8 login-left">
    </div>
    <div class="col-xs-9 col-sm-5 col-md-4 pad-login">
        <div class="row">
            <div class="col-sm-12 login-shadow">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-3">
                        <img src="{!! url('public/images/Logo.png') !!}" class="img-responsive log-logo">
                    </div>
                </div>
                <h3 class="login-text text-center">Student Demo Registration</h3>

                <div class="col-sm-12 login-btn-pad col-sm-offset-1">
                    <a class="btn btn-danger col-sm-10 login-btn" href="{{ route('students.create') }}">
                        Book a Time Slot
                    </a>
                </div>
                <div class="col-sm-12 login-btn-pad col-sm-offset-1">
                    <a class="btn btn-danger col-sm-10 login-btn" href="{{ route('students.index') }}">
                        View Registered Students
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>



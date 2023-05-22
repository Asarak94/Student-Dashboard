@extends('backend.layouts.cms.sidebar')
@section('content')
    <div class="col-sm-15 body-back">

        {!! Form::open(array('route' =>'students.store', 'method' => 'post','enctype'=>'multipart/form-data')) !!}
        <h3 class="all-news">Book Time Slot</h3>
        <div class="row min-pad">


            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail11"> First Name <span class="red-text">*</span></label>
                    {!! Form::text('first_name',null,array ('class' => 'form-control','maxlength' => 100 )) !!}
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            {{--invalid-feedback--}}
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail12">Last Name<span class="red-text">*</span></label>
                    {!! Form::text('last_name',null,array('class' => 'form-control','maxlength' => 100)) !!}
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail14">Email<span class="red-text">*</span></label>
                    {!! Form::text('email',null,array('class' => 'form-control','maxlength' => 100) ) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail12">Phone Number<span class="red-text">*</span></label>
                    {!! Form::text('phone_number',null,array('class' => 'form-control','maxlength' => 100)) !!}
                    @if ($errors->has('phone_number'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail13">Project Title<span class="red-text">*</span></label>
                    {!! Form::text('project_title',null,array('class' => 'form-control','maxlength' => 100) ) !!}
                    @if ($errors->has('project_title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('project_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail15">Student ID<span class="red-text">*</span></label>
                    {!! Form::text('student_id',null,array('class' => 'form-control','maxlength' => 100) ) !!}
                    @if ($errors->has('student_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-9 box-wrap">
                <div class="form-group">
                    <label for="timeslot">Time Slot</label>
                    <div class="col-md-12">
                        <select class="form-control inpt-lgn drp-sty" name="timeslot" id="exampleFormControlSelect1">
                            @foreach($timeslots as $timeslot)
                                <option
                                    value="{{$timeslot->id}}" {{(old('id')==$timeslot->id)?"selected":""}}>{{$timeslot->timeslot}}
                                    , {{6-($timeslot->booking_count)}} Seats Remaining
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('timeslot'))
                            <span class="help-block">
                                       <strong>{{ $errors->first('timeslot') }}</strong> </span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success"/>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
    </div>
    {!! Form::close() !!}
@endsection

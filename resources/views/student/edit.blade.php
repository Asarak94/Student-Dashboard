@extends('backend.layouts.cms.sidebar')
@section('content')
    <div class="col-sm-15 body-back">

        {!! Form::open(array('route' =>array('students.update',$student->student_id), 'method' => 'put','enctype'=>'multipart/form-data')) !!}
        <h3 class="all-news">Book Time Slot</h3>
        <div class="row min-pad">


            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail11"> First Name </label>
                    {!! Form::text('first_name',$student->first_name,array ('class' => 'form-control','maxlength' => 100,'readonly aria-describedby'=>"emailHelp" )) !!}
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
                    <label for="exampleInputEmail12">Last Name</label>
                    {!! Form::text('last_name',$student->last_name,array('class' => 'form-control','maxlength' => 100,'readonly aria-describedby'=>"emailHelp")) !!}
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail14">Email</label>
                    {!! Form::text('email',$student->email,array('class' => 'form-control','maxlength' => 100,'readonly aria-describedby'=>"emailHelp") ) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail12">Phone Number</label>
                    {!! Form::text('phone_number',$student->phone_number,array('class' => 'form-control','maxlength' => 100,'readonly aria-describedby'=>"emailHelp")) !!}
                    @if ($errors->has('phone_number'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail13">Project Title</label>
                    {!! Form::text('project_title',$student->project_title,array('class' => 'form-control','maxlength' => 100,'readonly aria-describedby'=>"emailHelp") ) !!}
                    @if ($errors->has('project_title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('project_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="col-sm-6 box-wrap">
                <div class="form-group">
                    <label for="exampleInputEmail15">Student ID</label>
                    {!! Form::text('student_id',$student->student_id,array('class' => 'form-control','maxlength' => 100,'readonly aria-describedby'=>"emailHelp") ) !!}
                    @if ($errors->has('student_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-9 box-wrap">
                <div class="form-group">
                    <label for="timeslot">Time Slot<span class="red-text">*</span></label>
                    <div class="col-md-12">
                        <select class="form-control inpt-lgn drp-sty" name="timeslot" id="exampleFormControlSelect1">
                            @foreach($timeslots as $timeslot)
                                @if ($timeslot->id == $student->timeslot_id)
                                    <option disabled="disabled" class="blockselection">{{$timeslot->timeslot}}
                                        ,{{6-($timeslot->booking_count)}}
                                        Seats Remaining
                                    </option>
                                    @continue
                                @endif
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

<!--            <div class="row">
                <div class="col-sm-12 text-lg-center">
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-success"/>
                    </div>
                </div>
                <div class="col-sm-12 text-lg-right">
                    <a  href="{{ route('students.index') }}">
                        Cancel
                    </a>students.index
                </div>
            </div>-->
            <div class="row">
            </div>
            <div class="modal-footer">

                <div class="col-sm-4 text-right">
                    <input type="submit" value="Update" class="btn btn-success sub-btn-inner col-12"/>
                </div>

                <div class="col-sm-4 text-right">
                    <a href="{{route('welcome')}}" class="btn btn-cancel col-12">Cancel</a>
                </div>

            </div>

        </div>
    </div>


    {!! Form::close() !!}
@endsection

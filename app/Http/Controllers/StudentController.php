<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Res_Owner;
use App\Reservation;
use App\ResOwner;
use App\Restaurant;
use App\Student;
use App\TimeSlot;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\backend\RestaurantCreate;
use App\Http\Requests\API\RateRestaurantRequest;
use App\Http\Requests\backend\RestaurantEdit;
use App\Helpers\API;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use App\Helpers\DeleteImage;
use App\Http\Requests\StudentCreate;
use App\Http\Requests\StudentEdit;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.studentList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maxbookings = 6;
        $timeslots = TimeSlot::where('booking_count', '<', $maxbookings)->get();
        return view('student.create')->with(["timeslots" => $timeslots]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCreate $request)
    {
        $input = $request->input();
        $student_id = $input['student_id'];
        $isExist = (Student::where('student_id', $student_id)->exists());
        if ($isExist) {
            session()->flash('action', 'ERROR');
            session()->flash('title', "Student is already Exists! Update registration or Cancel");
            return redirect()->route('students.edit', $student_id);
        } else {
            $student = new Student();
            $student->first_name = $input['first_name'];
            $student->last_name = $input['last_name'];
            $student->email = $input['email'];
            $student->phone_number = $input['phone_number'];
            $student->project_title = $input['project_title'];
            $student->student_id = $input['student_id'];
            $student->timeslot_id = $input['timeslot'];
            $result = $student->save();
            if ($result) {
                $bookingCounts = TimeSlot::select('booking_count')->where('id', $student->timeslot_id)->get();
                foreach ($bookingCounts as $bookingCount) {
                    $bookingCount = $bookingCount->booking_count;
                    $bookingCount = $bookingCount + 1;
                    $timeslotUpdateResponse = TimeSlot::where('id', $student->timeslot_id)->update(["booking_count" => $bookingCount]);
                }
                if ($timeslotUpdateResponse) {
                    session()->flash('action', 'SUCCESS');
                    session()->flash('title', "Time Slot Booking Success");
                    return redirect()->route('students.index');
                } else {
                    session()->flash('action', 'ERROR');
                    session()->flash('title', "Time Slot Booking Fail");
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.time-slot.list')->with(["restaurant_id" => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maxbookings = 6;
        $timeslots = TimeSlot::where('booking_count', '<', $maxbookings)->get();
        $student = Student::with('timeslots')->select('*')->where('student_id', $id)->get()->first();
        //dd($student);
        return view('student.edit')->with(['student' => $student, 'timeslots' => $timeslots]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentEdit $request, $id)
    {
        $input = $request->input();
        $newTimeSlot_id = $input["timeslot"];

        $oldTimeSlot_id = Student::select('timeslot_id')->where('student_id', $id)->get()->first()->timeslot_id;
        $old_bookingCount = TimeSlot::select('booking_count')->where('id', $oldTimeSlot_id)->get()->first()->booking_count;

        if ($old_bookingCount != 0) {
            $old_bookingCount = $old_bookingCount - 1;
        }
        $timeslotDeletingResponse = TimeSlot::where('id', $oldTimeSlot_id)->update(["booking_count" => $old_bookingCount]);
        $studentUpdateResponse = Student::where('student_id', $id)->update(["timeslot_id" => $newTimeSlot_id]);
        $bookingCount = TimeSlot::select('booking_count')->where('id', $newTimeSlot_id)->get()->first()->booking_count;
        $bookingCount = $bookingCount + 1;
        $timeslotUpdateResponse = TimeSlot::where('id', $newTimeSlot_id)->update(["booking_count" => $bookingCount]);
        if ($timeslotDeletingResponse & $studentUpdateResponse & $timeslotUpdateResponse) {

            session()->flash('action', 'SUCCESS');
            session()->flash('title', "Student Timeslot Detail Update Success");
            return redirect()->route('students.index');
        } else {
            session()->flash('action', 'ERROR');
            session()->flash('title', "Student Timeslot Detail Update Fail");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadstudents(Request $request)
    {

        $students = Student::with('timeslots')->get();
        return DataTables::of($students)
            ->addColumn('student_id', function ($data) {
                $result = $data->student_id;
                return $result;
            })
            ->addColumn('first_name', function ($data) {
                $result = $data->first_name;
                return $result;
            })
            ->addColumn('last_name', function ($data) {
                $result = $data->last_name;
                return $result;
            })
            ->addColumn('project_title', function ($data) {
                $result = $data->project_title;
                return $result;
            })
            ->addColumn('email', function ($data) {
                $result = $data->email;
                return $result;
            })
            ->addColumn('phone_number', function ($data) {
                $result = $data->phone_number;
                return $result;
            })
            ->addColumn('timeslot', function ($data) {
                $result = $data["timeslots"]["timeslot"];
                return $result;
            })
            ->make(true);

    }
    public function delete(Request $request, $id)
    {
        $restaurant = Restaurant::with('res_owner')->find($id);
        $owner = User::find($restaurant["res_owner"]["id"]);

        $result1 = $restaurant->delete();
        $result2 = $owner->delete();

        if ($result1 & $result2) {

            session()->flash('action', 'SUCCESS');
            session()->flash('title', "Restaurant Delete Success");

            return redirect()->route('restaurants.index');
        } else {
            session()->flash('action', 'ERROR');
            session()->flash('title', "Restaurant Delete Fail");
        }
    }

}

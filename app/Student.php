<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id','first_name', 'last_name','project_title','email','phone_number'
    ];

    public function timeslots(){

        return $this->belongsTo('App\TimeSlot','timeslot_id','id');
    }
}

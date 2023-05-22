<?php

namespace App\Providers;

use App\Restaurant;
use App\Student;
use App\TimeSlot;
Use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend(' is_email_exist', function ($attribute, $value, $parameters, $validator) {
            $result = (User::where('email', $value)->exists());
            return $result;
        });

        Validator::extend('check_mobile_no', function ($attribute, $value, $parameters, $validator) {
            $result = (!User::where("mobile_number", '+94' . substr($value, -9))->exists());
            // return response()->json($result);
            return $result;
        });

        Validator::extend('check_email_verified', function ($attribute, $value, $parameters, $validator) {
            $result = (User::where("is_user_verified", 1)->where('email', $value)->exists());
            return $result;
        });

        Validator::extend('validate_pax_count', function ($attribute, $value, $parameters, $validator) {
            $restaurant = Restaurant::find($parameters[0]);
            if (($parameters[1]) <= ($restaurant->max_guests)) {
                return true;
            } else {
                return false;
            }
        });


        Validator::extend(' is_time_exist', function ($attribute, $value, $parameters, $validator) {

            $result = (!TimeSlot::where('time', $parameters[0])->where('day',$parameters[1])->where('restaurant_id',$parameters[2])->exists());
            return $result;
        });


        Validator::extend(' confirm_old', function ($attribute, $value, $parameters, $validator) {

            $result = Hash::check($parameters[1],$parameters[0]);
            return $result;
        });

        Validator::extend(' check_user_name_exist', function ($attribute, $value, $parameters, $validator) {

            $result = (!User::where('user_name', $value)->exists());
            return $result;
        });

        Validator::extend(' check_student_exist', function ($attribute, $value, $parameters, $validator) {

            $result = (!Student::where('student_id', $value)->exists());
            return $result;
        });

        Validator::extend(' check_user_name', function ($attribute, $value, $parameters, $validator) {

            $user=User::select('user_name')->where('restaurant_id',$parameters[0])->first();

            if($value==$user->user_name){
              return true;
            }
            if($value!=$user->user_name){
                $result = (!User::where('user_name', $value)->exists());
                return $result;
            }

        });





    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

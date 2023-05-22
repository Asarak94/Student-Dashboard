<?php

namespace App\Helpers;
use Illuminate\Support\Facades\File;
class DeleteImage{

    public static function Delete($path){

        $path=explode('/',$path,5);
        $result= File::delete(public_path($path[0].'/'.$path[1].'/'.$path[2]));

      if ($result){
            return true;
        }else{
            return false;
        }
    }

}
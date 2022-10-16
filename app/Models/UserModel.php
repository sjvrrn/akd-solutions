<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
class UserModel extends Authenticatable
{ 
    public static function getUsers($created_by){
       $staff_data =DB::table("staff")->where('created_by',$created_by)->get()->toArray();
       return $staff_data;
    }
    public static function registerUser($data){
        $staff_data =DB::table("staff")->insert($data);
        return $staff_data;
    }
    public static function getUserById($staff_id){
        $staff_data =DB::table("staff")->where('staff_id',$staff_id)->get()->toArray();
        return $staff_data;
    }
    public static function updateUser($data){
        $staff_data =DB::table("staff")->where('staff_id',$data['staff_id'])->update($data);
        return $staff_data;
    }
}

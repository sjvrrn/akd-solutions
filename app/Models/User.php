<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function insertUser($data){
        $userid =DB::table("users")->insertGetID($data);
        return $userid;
     }
     public static function resetPasswordSave($request)
     {
        
         $result = DB::table('users')->where('remember_token', $request['remember_token'])->first();
         // dd($result);
         if($result){
             DB::table('users')->where('id',$result->id)->update(['remember_token'=>null,'password'=> bcrypt($request['password']),'updated_at'=> date('Y-m-d H:i:s')]);
             return true;
         }else
             return false;
     }
}

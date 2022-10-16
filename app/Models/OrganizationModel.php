<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
class OrganizationModel extends Authenticatable
{ 
    public static function getOrganizations(){
       $organization_data =DB::table("organizations")->get()->toArray();
       return $organization_data;
    }
    public static function registerOrganization($data){
        $organization_data =DB::table("organizations")->insert($data);
        return $organization_data;
    }
    public static function getOrganizationById($organization_id){
        $organization_data =DB::table("organizations")->where('organization_id',$organization_id)->get()->toArray();
        return $organization_data;
    }
    public static function updateOrganization($data){
        $organization_data =DB::table("organizations")->where('organization_id',$data['organization_id'])->update($data);
        return $organization_data;
    }
}

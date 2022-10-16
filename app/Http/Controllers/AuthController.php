<?php
 
namespace App\Http\Controllers;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Session;
use Mail;
use  Redirect;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller as BaseController;
class AuthController extends BaseController
{
    public function login(){
       return view('login');
    }

    public function authenticateUser(Request $request)
    {   
         
         
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = Auth::user(); 
           
            $data['email']=$user->email;
            $data['user_id']=$user->id; 
            $data['role_id']=$user->role_id; 
            Session::put('success','You are Login successfully!!'); 
            Session::put("logged_user",$data);
            return Redirect::to('dashboard');
            
        } else {
           
            return back()->with('error','your username or password are wrong.');
        }

    } 

    public function resetPassword(Request $request,$token){ 
        if(isset($_POST['password'])){
            $validatedData = $request->validate([ 
                'password' => 'required',
            ]); 
            $data=$request->all();
            unset($data['_token']);
            $res = User::resetPasswordSave($data);
            Session::put('success','Successfully Password changed.Please login!!');
            return Redirect::to('/');
        }
       
        return view('reset_password')->with(["token"=>$token]);
    }

    public function logout(){
        Session::forget("logged_user");
        Session::forget("user_id");
        Session::forget("role_id");
        return Redirect::to("/");
    }

    
} 
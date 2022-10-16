<?php

namespace App\Http\Controllers; 
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\OrganizationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Session; 
use Mail;
use  Redirect;use  URL;
class OrganizationController extends BaseController
{
    public function manageOrganization(Request $request){ 
       $organization_data=OrganizationModel::getOrganizations(); 
       return view('organization.manage_organization')->with(['organization_data'=> $organization_data]);
    }
    public function addOrganization(Request $request){ 
    
        return view('organization.add_organization');
    }
    public function registerOrganization(Request $request){ 
      $data=$request->all();
      $validatedData = $request->validate([
        'email' => 'required|email',
        'organization_name' => 'required',
        'contact_name' => 'required',
        'role' => 'required',
            'mobile' => 'required' 
      ]);
      unset($data['_token']);
      $remember_token=time(); 
      $user_data=["name"=>$data["contact_name"],"email"=>$data["email"],"role_id"=>2,'remember_token'=> $remember_token];
      $data['user_id']=User::insertUser($user_data);
      $organization_id=OrganizationModel::registerOrganization($data);
      Session::put('success','Succefully added Organization.'); 
      self::sendWelcomeEmail($user_data, $remember_token);

      $status =  ($request->input('status'))? 1 : 0;
      if($status){
            return Redirect::to("/");exit;
      }

      return Redirect::to("manage-organization");exit;
    }
    public function editOrganization(Request $request,$organization_id){ 
       
        $organization=OrganizationModel::getOrganizationById($organization_id); 
        
        return view('organization.edit_organization')->with(['organization'=> $organization]);
    }
    public function updateOrganization(Request $request){  
        $data=$request->all();
        $validatedData = $request->validate([
            'email' => 'required|email',
            'organization_name' => 'required',
            'contact_name' => 'required',
            'role' => 'required',
                'mobile' => 'required' 
          ]);
          
        unset($data['_token']);
        OrganizationModel::updateOrganization($data);
        Session::put('success','Succefully added Organization.');
        return Redirect::to('manage-organization'); 
    }

    public function sendWelcomeEmail($user_data, $remember_token)
    {
        $url=URL::to('/reset_password').'/'.$remember_token;
        $link = '<a href="'.$url.'"> <button type="button"
        style="background-color: #fda63c;color:#000; border-radius: 4px; border: none; font-size: 10px;padding: 8px; color: white;">CONFIRM
        YOUR EMAIL ADDRESS AND RESET PASSWORD</button></a>';
        $logo = asset('assets/img/logo.png');
        $message = '<!DOCTYPE html>
        <html lang="en"> 
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>AKD Solution form</title>
        </head><body> 
        <div class="form-group" style="margin: 25px;">
        <div class="para1" style="font-size:28px">
            <p> Thanks for registering<br>with AKD Solution!</p>

        </div>
        </div>
        <div class="form-group" style="margin: 25px;">
            <div class="para2" style="font-size: 14px">
                <p>We\'re excited for you to dream big, invest smart and reach your biggest goals.<br> Now,lets
                    complete your registration.</p>
            </div>
        </div>
        <div class="form-group" style="margin:25px;">'.$link.'</div>';

        $message .= '<div class="form-group" style="margin:25px">
        <div class="para3">
            <div class="line1" style=" font-size: 14px; margin-bottom: 8px;">
                Thanks,

            </div>
            <div class="line2" style="font-size: 14px;"> 
                    AKD Solution
            </div>
        </div>
        </div>
        <footer style="background-color: antiquewhite; padding: 10px;">
            <div class="footer" style="color: gray;font-size: 12px;">
                © 2022 AKD Solution. All rights reserved.
            </div>
        </footer>
                </body></html>';

       
        $to_email = $user_data['email'];
        $subject="Welcome to AKD Solution!"; 
        $body_message =$message;
        Mail::send([], [], function ($message) use ($to_email, $body_message, $subject) {
            $message->to($to_email);
            $message->subject($subject);
            $message->setBody($body_message, 'text/html');
            $message->setPriority(\Swift_Message::PRIORITY_HIGH);
            $message->from("no-reply@akdsolution.com", "no-reply");
        });
    }
}

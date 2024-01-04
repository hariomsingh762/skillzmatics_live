<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;
use Carbon\Carbon;
use Cookie;
use DB;
use Mail;
use File;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $admindata = Admin::where('id',Session::get('ADMIN_LOGIN'))->first();
            view()->share([
                'admindata' =>$admindata,
            ]);
        return $next($request);    
        });
    }

    public function login()
    {
        return view('backend.admin.auth.login');
    }

     public function check(Request $request){
        //Validate requests
        $request->validate([
             'username_or_email'=>'required',
             'userpassword'=>'required'
        ]);
        $userInfo = Admin::where('email','=', $request->username_or_email)->first();
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->userpassword, $userInfo->password)){
                $request->session()->put('ADMIN_LOGIN1',true);
                $request->session()->put('ADMIN_LOGIN', $userInfo->id);
                Session::put('ADMIN_NAME', $userInfo->name);
                $request->session()->put('ADMIN_IMAGE', $userInfo->image);
                if($request->rememberme=== null){
                    setcookie('adminemail',$request->username_or_email,100);
                    setcookie('adminpassword',$request->userpassword,100);

                }else{
                    setcookie('adminemail',$request->username_or_email,time()+60*60*24*100);
                    setcookie('adminpassword',$request->userpassword,time()+60*60*24*100);
                }
                return redirect('dashboard');
                 
            }else{
                return back()->with('fail','Incorrect email and password');
            }
        }
    }

    public function dashboard()
    {
        return view('backend.admin.auth.dashboard');
    }
    public function ForgotPasswordPage()
    {
        return view('backend.admin.auth.forgot-password');
    }


    public function sendPasswordResetToken(Request $request)
    {
      $user = Admin::where ('email', $request->email)->first();
       if ( !$user )
       {
        return redirect()->back()->with('error','Email not found');
       }
      DB::table('password_reset_tokens')->insert([
        'email' => $request->email,
        'token' => Str::random(40),
        'created_at' => Carbon::now()
       ]);
       $users = Admin::where ('id', $user->id)->first();
      
       $token = DB::table('password_reset_tokens')
       ->where('email', $request->email)->first();
        $this-> sandEmail($users, $token);
        session()->flash('message','Reset Password link send your email id');
        return redirect()->back();

    }

    public function sandEmail($users, $token){
        Mail::send(
            'backend.admin.auth.forgot-mail',
            ['users' => $users, 'token' => $token],
            function($message) use ($users) {
                $message->to($users->email);
                $message->subject($users->name . ', Reset Password');
            }
        );
    }


    public function getPassword($email, $token) { 
          return view('backend.admin.auth.f-changepassword', ['token' => $token , 'email'=>$email]);
    }

    public function updaterestpassword(Request $request)
    {

    $request->validate([
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required',

    ]);

   $updatePassword = DB::table('password_reset_tokens')
                      ->where(['email' => $request->email, 'token' => $request->token])
                      ->first();

   if(!$updatePassword)
   {
      return back()->withInput()->with('error', 'Invalid token!');
    }else{

    $user = Admin::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

    DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

    return redirect('admin-login')->with('changePassMessage', 'Your password has been changed!');
    }
    }

    public function adminlogout()
    {

        if(!empty(Session::get('ADMIN_LOGIN'))){
            
            $adminId = session('ADMIN_LOGIN');
 
            session()->forget('ADMIN_LOGIN');
            return redirect('admin-login')->with('success', 'Logout successfully');
        }
        return redirect('login')->with('error', 'You are not logged in.');
    }


    public function profileSetting()
    {
        $adminId = session::get('ADMIN_LOGIN');
        $adminInfo = Admin::where('id',$adminId)->first();
        return view('backend.admin.profile-setting.profile-info',compact('adminInfo'));
    }

    
    public function profileUpdateSetting()
    {
        $adminId = session::get('ADMIN_LOGIN');
        $adminInfo = Admin::where('id',$adminId)->first();


        return view('backend.admin.profile-setting.profile-update',compact('adminInfo'));
    }

    public function profileUpdateStore(Request $request)
    {

        $adminId = session('ADMIN_LOGIN');
        if($request['first_name']!=null)
        {
                    
        $profile['name'] = $request['first_name'].$request['last_name'];
        $profile['user_name'] = $request['user_name'];
        $profile['email'] = $request['email'];
        $profile['phone'] = $request['phone'];
        $profile['designation'] = $request['designation'];
        $profile['bio'] = $request['bio'];
        $profile['updated_at'] = now();

        $query = DB::table('admin')->where('id', $adminId)->update($profile);
        Session::flash('pass', 'Profile has been updated');
        return redirect()->back();
        }
        $address = [
            'country' => $request['country'],
            'state' => $request['state'],
            'city' => $request['city'],
            'zip' => $request['zip'],
        ];

        // Check if any key in $address has a non-null value
        if (array_filter($address, 'strlen')) {
            $profile['address'] = json_encode($address);
            $profile['updated_at'] = now();
            $query = DB::table('admin')->where('id', $adminId)->update($profile);
            
            Session::flash('pass', 'Address has been updated');
            return redirect()->back();
        }

    }


    public function profileAddressUpdateStore(Request $request)
    {
        dd($request);
        $address = [
            'country' => $request['country'],
            'state' => $request['state'],
            'city' => $request['city'],
            'zip' => $request['zip'],
            ];
      
        // Check if any key in $address has a non-null value
        if (array_filter($address, 'strlen')) {
            $profile['address'] = json_encode($address);
            $profile['updated_at'] = now();
            $adminId = session('ADMIN_LOGIN');
            dd($profile['address']);
            $query = DB::table('admin')->where('id', $adminId)->update($profile);
            
            Session::flash('pass', 'Address has been updated');
            return redirect()->back();
        }
    }


    public function profilePasswordSetting()
    {
        return view('backend.admin.profile-setting.profile-password');
    }

    

    public function profilePasswordUpdateSetting(Request $request)
    {
        $request->validate([
            'old_pass' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $adminId = session('ADMIN_LOGIN');
        $user = Admin::where('id',$adminId)->first(); 
        if (Hash::check($request->old_pass, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('admin.profilePasswordSetting')->with('success', 'Password updated successfully');
        } else {
            return back()->withErrors(['old_pass' => 'The old password is incorrect']);
        }
    }

}






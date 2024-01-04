<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;
use DB;
use Mail;
use File;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $companyId = session::get('COMPANY_LOGIN');
            $companyInfo=DB::table('company')->where('id',$companyId)->first();
            view()->share([
                'companyInfo' =>$companyInfo,
            ]);
        return $next($request);    
        });
    }


    public function uploadimage($location,$imagename){
        $name = $imagename->getClientOriginalName();
        $imagename->move( public_path().'/'.$location,date('ymdgis').$name);
        return date('ymdgis').$name;
       }
    public function regiser(){
        return view('company.auth.register');
    }

    public function registration_process(Request $request)
    {
        $rand_id = rand(111111111, 999999999);
        $request->validate([
            'company_name' => 'required|max:255',
            'email' => 'required|email|unique:company',
            'password' => 'required|min:8', // Example validation, adjust as needed
            'password_confirmation' => 'required|same:password',
            'state' => 'required',
            'phone' => 'required',
        ]);

        $data['company_name'] = $request['company_name'];
        $data['email'] = $request['email'];
        $data['is_verify'] = 0;
        $data['rand_id'] = $rand_id;
        $data['password'] = Hash::make($request->password);
        $data['state'] = $request['state'];
        $data['phone'] = $request['phone'];
        $data['rand_id'] = $rand_id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $query = DB::table('company')->insert($data);
        if($query){
            $data=['name'=>$request->company_name,'rand_id'=>$rand_id];
            $user['to']=$request->email;
            Mail::send('company.mail.email_verification',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Email Id Verification');
            });
        }
        $message = 'Registration successful. Please confirm your email to sign in.';
        return redirect()->route('compnay.auth.login')->with('success_message', 'Registration successful. Please confirm your email to sign in.');
       
    }


    public function email_verification(Request $request,$id)
    {
        $result=DB::table('company')  
            ->where(['rand_id'=>$id])
            ->where(['is_verify'=>0])
            ->get(); 

        if(isset($result[0])){
            DB::table('company')  
            ->where(['id'=>$result[0]->id])
            ->update(['is_verify'=>1,'rand_id'=>'']);
        return view('company.mail.verification');
        }else{
            return redirect('/');
        }
    }

    public function login()
    {
        return view('company.auth.login');
    }


    public function UserVerify(Request $request)
    {
        //Validate requests
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        //$userInfo = User::where('email', '=', $request->email)->first();
        $userInfo=DB::table('company')->where('email',$request->email)->first();
        //dd($userInfo);
        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address');
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                if ($userInfo->is_verify == 0) {
                    return back()->with('fail', 'Please verify your email id');
                }

                if ($userInfo->status == 1) {

                    $request->session()->put('COMPANY_LOGIN', $userInfo->id);
                    Session::flash('COMPANY_NAME', $userInfo->company_name);
                    if($request->rememberme===null){
                        setcookie('login_email',$request->email,100);
                        setcookie('login_pwd',$request->password,100);
                    }else{
                       setcookie('login_email',$request->email,time()+60*60*24*100);
                       setcookie('login_pwd',$request->password,time()+60*60*24*100);
                    }
                    return redirect('/company/dashboard');

                } else {
                    return back()->with('fail', 'Please Contact Administrator');
                }

            } else {
                return back()->with('fail', 'Incorrect email and password');
            }
        }
    }


    public function dashboard()
    {
        $companyId = Session::get('COMPANY_LOGIN');
        $dashboardData['JobPostedBy'] = JobPosting::where('company_id',$companyId)->count();
        // dd($JobPostedBy);
        return view('company.auth.dashboard',compact('dashboardData'));
    }


    public function profileSetting()
    {
        $companyId = session::get('COMPANY_LOGIN');
        $companyInfo=DB::table('company')->where('id',$companyId)->first();
        return view('company.profile-setting.profile-info',compact('companyInfo'));
    }


    public function profileUpdateSetting()
    {
        $companyId = session::get('COMPANY_LOGIN');
        $companyInfo=DB::table('company')->where('id',$companyId)->first();
        return view('company.profile-setting.profile-update',compact('companyInfo'));
    }


    public function profileUpdateStore(Request $request)
    {

        $companyId = session('COMPANY_LOGIN');
        if ($request->hasFile('logo')) {
            $profile['logo'] = $this->uploadimage('company',$request['logo']);
        }
        $profile['company_name'] = $request['company_name'];
        $profile['email'] = $request['email'];
        $profile['phone'] = $request['phone'];
        $profile['country'] = $request['country'];
        $profile['state'] = $request['state'];
        $profile['city'] = $request['city'];
        $profile['zip'] = $request['zip'];
        $profile['address'] = $request['address'];
        $profile['updated_at'] = date('Y-m-d H:i:s');
        $query = DB::table('company')->where('id', $companyId)->update($profile);
        Session::flash('pass', 'Profile has been updated');
        return redirect()->back();

    }

    public function profilePasswordSetting()
    {
        return view('company.profile-setting.profile-password');
    }

    

    public function profilePasswordUpdateSetting(Request $request)
    {
        $request->validate([
            'old_pass' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $companyId = session('COMPANY_LOGIN');
        $user=DB::table('company')->where('id',$companyId)->first();
      
        if (Hash::check($request->old_pass, $user->password)) {
            $profile['password'] = Hash::make($request->password);
            DB::table('company')->where('id', $companyId)->update($profile);
            return redirect()->route('compnay.profilePasswordSetting')->with('success', 'Password updated successfully');
        } else {
            return back()->withErrors(['old_pass' => 'The old password is incorrect']);
        }

       
    }

    function forgotpassword(){
        return view('company.auth.forgot-password');
    }

    public function UserForgotPasswordCheckEmail(Request $request)
    {

        $request->validate([
            'email' => 'required',
        ]);

        //$user = User::where('email', $request->email)->first();
        $user = DB::table('company')->where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email not found');
        }

        //create a new token to be sent to the user. 
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(40),
            //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);
        //$users = Sentinel::findById($user->id);
        //$users = User::where('id', $user->id)->first();
        $users = DB::table('company')->where('id', $user->id)->first();
        $token = DB::table('password_resets')
            ->where('email', $request->email)->first();

        // or $email = $tokenData->email;
        $this->sandEmail($users, $token);
        session()->flash('message', 'Rset Password link send your email id');
        return redirect()->back();

    }

    public function sandEmail($users, $token)
    {
        Mail::send(
            'company.mail.forgot-mail',
            ['users' => $users, 'token' => $token],
            function ($message) use ($users) {
                $message->to($users->email);
                $message->subject("$users->company_name, reset your password");
            }
        );
    }

    public function GetPassword($email, $token)
    {
        return view('company.auth.f-changepassword', ['token' => $token, 'email' => $email]);
    }
    public function Resetpassword(Request $request)
    {

        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);
        
        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();
       //dd(!$updatePassword);
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        } else {
            
            $profile['password'] = Hash::make($request->password);
            DB::table('company')->where('email', $request->email)->update($profile);
            DB::table('password_resets')->where(['email' => $request->email])->delete();

            return redirect('/company/login')->with('message', 'Your password has been changed!');
        }
    }

}

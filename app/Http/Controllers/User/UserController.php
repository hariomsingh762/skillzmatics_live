<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Crypt;
use Session;
use DB;
use Mail;
use Cokie;
use File;

class UserController extends Controller
{
    public function registration(Request $request)
    {
       /* if($request->session()->has('FRONT_USER_LOGIN')!=null){
            return redirect('/');
        }*/
        
        $result=[];
        return view('user.auth.registration',$result);
    }


    public function registration_process(Request $request)
    {
       $valid=Validator::make($request->all(),[
            "name"=>'required',
            "email"=>'required|email|unique:customers,email',
            "password"=>'required',
            "mobile"=>'required|numeric|digits:10',
       ]);

       if(!$valid->passes()){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
       }else{
            $rand_id=rand(111111111,999999999);
            $arr=[
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Crypt::encrypt($request->password),
                "mobile"=>$request->mobile,
                "status"=>1,
                "is_verify"=>0,
                "rand_id"=>$rand_id,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('customers')->insert($arr);
            if($query){

                $data=['name'=>$request->name,'rand_id'=>$rand_id];
                $user['to']=$request->email;
                Mail::send('user.auth.email_verification',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Email Id Verification');
                });

                return response()->json(['status'=>'success','msg'=>"Registration successfully. Please check your email id for verification"]);
            }

       }
       
    }

    public function login_process(Request $request)
    {
       
        $result=DB::table('customers')  
            ->where(['email'=>$request->str_login_email])
            ->get(); 
        
        if(isset($result[0])){
            $db_pwd=Crypt::decrypt($result[0]->password);
            $status=$result[0]->status;
            $is_verify=$result[0]->is_verify;

            if($is_verify==0){
                return response()->json(['status'=>"error",'msg'=>'Please verify your email id']); 
            }
            if($status==0){
                return response()->json(['status'=>"error",'msg'=>'Your account has been deactivated']); 
            }

            if($db_pwd==$request->str_login_password){

                if($request->rememberme===null){
                    setcookie('login_email',$request->str_login_email,100);
                    setcookie('login_pwd',$request->str_login_password,100);
                }else{
                   setcookie('login_email',$request->str_login_email,time()+60*60*24*100);
                   setcookie('login_pwd',$request->str_login_password,time()+60*60*24*100);
                }

                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$result[0]->id);
                $request->session()->put('FRONT_USER_NAME',$result[0]->name);

                $status="success";
                $msg="";
            }else{
                $status="error";
                $msg="Please enter valid password";
            }
        }else{
            $status="error";
            $msg="Please enter valid email id";
        }
       return response()->json(['status'=>$status,'msg'=>$msg]); 
       //$request->password
    }

    public function email_verification(Request $request,$id)
    {
        $result=DB::table('customers')  
            ->where(['rand_id'=>$id])
            ->where(['is_verify'=>0])
            ->get(); 

        if(isset($result[0])){
            DB::table('customers')  
            ->where(['id'=>$result[0]->id])
            ->update(['is_verify'=>1,'rand_id'=>'']);
        return view('user.auth.verification');
        }else{
            return redirect('/');
        }
    }

    public function forgot_password(Request $request)
    {
        
        $result=DB::table('customers')  
            ->where(['email'=>$request->str_forgot_email])
            ->get(); 
        $rand_id=rand(111111111,999999999);
        if(isset($result[0])){

            DB::table('customers')  
                ->where(['email'=>$request->str_forgot_email])
                ->update(['is_forgot_password'=>1,'rand_id'=>$rand_id]);

            $data=['name'=>$result[0]->name,'rand_id'=>$rand_id];
            $user['to']=$request->str_forgot_email;
            Mail::send('user.auth.forgot_email',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject("Forgot Password");
            });
            return response()->json(['status'=>'success','msg'=>'Please check your email for password']); 
        }else{
            return response()->json(['status'=>'error','msg'=>'Email id not registered']); 
        }
    }

    public function forgot_password_change(Request $request,$id)
    {
        $result=DB::table('customers')  
            ->where(['rand_id'=>$id])
            ->where(['is_forgot_password'=>1])
            ->get(); 

        if(isset($result[0])){
            $request->session()->put('FORGOT_PASSWORD_USER_ID',$result[0]->id);
        
            return view('user.auth.forgot_password_change');
        }else{
            return redirect('/');
        }
    }

    public function forgot_password_change_process(Request $request)
    {
        DB::table('customers')  
            ->where(['id'=>$request->session()->get('FORGOT_PASSWORD_USER_ID')])
            ->update(
                [
                    'is_forgot_password'=>0,
                    'password'=>Crypt::encrypt($request->password)   ,
                    'rand_id'=>''
                ]
            ); 
        return response()->json(['status'=>'success','msg'=>'Password changed']);     
    }


    public function dashboard(){
        

        return view('user.auth.dashboard');
    }


    public function accountdetails()
    {
        $user_id = Session::get('FRONT_USER_ID');
        $datalogin = DB::table('customers')->where('id',$user_id)->first();
        return view('user.auth.account-details',['datalogin'=>$datalogin]);
    }


    public function accountupdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'company' => 'required',
        ]);

        //dd($request);
        $id = Session::get('FRONT_USER_ID');
        $update['name'] = $request->name;
        $update['email'] = $request->email;
        $update['mobile'] = $request->mobile;
        $update['state'] = $request->state;
        $update['city'] = $request->city;
        $update['company'] = $request->company;
        $update['address'] = $request->address;
        $update['zip'] = $request->zip;
        $update['mobile'] = $request->mobile;
        $update['updated_at'] = date('Y-m-d H:i:s');
        DB::table('customers')->where('id',$id)->update($update);
        Session::flash('pass', 'Profile update successful');
        return redirect()->back();
    }

    //======================Change Password================================
    public function changepassword(){
    return view('user.auth.change-password');
    }

    public function updatepassword(Request $request){
        if (session()->has('FRONT_USER_ID')) {
            $user = DB::table('customers')->where('id', Session::get('FRONT_USER_ID'))->first();
            $db_pwd=Crypt::decrypt($user->password);

            // Validate requests
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:8', // Example validation, adjust as needed
                'password_confirmation' => 'required|same:password',
            ]);
           
            if ($request->current_password == $db_pwd) {
               
            $newPassword = Crypt::encrypt($request->password);
    
            DB::table('customers')->where('id', Session::get('FRONT_USER_ID'))->update([
                'password' => $newPassword,
            ]);
    
            return redirect()->back()->with('updatepassword', 'Password updated successfully!');
              
            }
         
            return back()->with('error', 'Current password does not match!');
            
        } else {
            return redirect('/login')->with('fail', 'You must be logged in');
        }
    }
}

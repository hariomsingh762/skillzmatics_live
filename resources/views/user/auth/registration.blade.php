@extends('frontend.layouts.master')

@section('title', 'Registration')

@section('content')

<section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-12">
                <div class="aa-myaccount-register">     
                <div class="row">
                    <div class="col-md-6">
                    <div class="">  
                      
                    @php
  if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pwd'])){
    $login_email=$_COOKIE['login_email'];
    $login_pwd=$_COOKIE['login_pwd'];
    $is_remember="checked='checked'";
  } else{
    $login_email='';
    $login_pwd='';
    $is_remember="";
  }   

  @endphp 
        <div class="LoginForm">
       
          <div id="popup_login">
            <h4><span>Login</span></h4>
            <form class="aa-login-form" id="frmLogin1">
              <label >Email address<span>*</span></label>
              <input type="email" placeholder="Email" name="str_login_email"  value="{{$login_email}}">
              <label >Password<span>*</span></label>
              <input type="password" placeholder="Password" name="str_login_password"  value="{{$login_pwd}}">
              <button class="aa-browse-btn" type="submit" id="btnLogin">Login</button>
              <label  class="rememberme"><input type="checkbox" id="rememberme" name="rememberme" {{$is_remember}}> Remember me </label>

              <div id="login_msg"></div>

              <p class="aa-lost-password"><a href="javascript:void(0)" onclick="forgot_password()">Lost your password?</a></p>
              
              <!--<div class="aa-register-now">-->
              <!--  Don't have an account?<a href="{{url('registration')}}">Register now!</a>-->
              <!--</div>-->
              @csrf
            </form>
          </div>
          <div id="popup_forgot" style="display:none;">
            <h4>Forgot Password</h4>
            <form class="aa-login-form" id="frmForgot">
              <label >Email address<span>*</span></label>
              <input type="email" placeholder="Email" name="str_forgot_email">
              <button class="aa-browse-btn" type="submit" id="btnForgot">Submit</button>
              <br><br>
              <div id="forgot_msg"></div>
             
              <div class="aa-register-now">
                Login Form?<a href="javascript:void(0)" onclick="show_login_popup()">Login now!</a>
              </div>
              @csrf
            </form>
          </div>

        </div>                        
      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="LoginForm register">
                  <h4><span>Register</span></h4>
                 <form action="" class="aa-login-form" id="frmRegistration">
                   
                   
                    <input type="text" name="name" placeholder="Name">
                    <div id="name_error" class="field_error text-danger"></div>
                    
                   
                    <input type="email" name="email" placeholder="Email" >
                    <div id="email_error" class="field_error text-danger"></div>

                  
                    <input type="password" placeholder="Password" name="password" autocomplete="off">
                    <div id="password_error" class="field_error text-danger"></div> 

                   
                    <input type="text" name="mobile" placeholder="Mobile" >
                    <div id="mobile_error" class="field_error text-danger"></div>
                    <div id="thank_you_msg" class="field_error"></div>
                    <button type="submit" class="aa-browse-btn" id="btnRegistration">Register</button>    
                    @csrf                
                  </form>
                  </div>
                  </div>
                </div>
                </div>
             
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>

   <div class="loader-div">
    <img class="loader-img" src="{{ asset('front_assets/assets/images/Spinner-1s-200px.gif')}}" style="height: 120px;width: auto;" />
   </div>
   <style type="text/css">
		.loader-div {
			display: none;
			position: fixed;
			margin: 0px;
			padding: 0px;
			right: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			background-color: #fff;
			z-index: 30001;
			opacity: 0.8;
		}
		.loader-img {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
		}
	</style>
@endsection
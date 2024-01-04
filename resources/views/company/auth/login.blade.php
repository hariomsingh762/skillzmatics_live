@extends('frontend.layouts.master')

@section('title', 'Login')

@section('content')

<section class="contact-sec">
<div class="bread-top"><svg fill="currentColor" height="59" preserveaspectratio="none" viewbox="0 0 1440 59" width="100%" xmlns="http://www.w3.org/2000/svg"> <path d="M756.5 59.0001C581.048 59.0001 185.5 27 5.59506e-06 27L1.03159e-05 0L1463 0.000255799L1463 27.0003C1299 27.0002 951.635 59.0002 756.5 59.0001Z" fill="white" transform="rotate(180 731.5 29.5)"></path> </svg></div>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="main-title text-center">
<h4>Login</h4>

</div>
</div>
</div>

<div class="row justify-content-center mt-5">
<div class="col-md-6">
<form action="{{route('compnay.UserVerify')}}" class="mans_form" enctype="multipart/form-data" method="POST">
 @csrf
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
          @if (session('success_message'))
          <div class="col-md-12">
           <p class="p-3 mb-2 bg-success text-white">
           {!! session('success_message') !!}
           </p>
           </div>
           @endif
           @if (session('message'))
          <div class="col-md-12">
           <p class="p-3 mb-2 bg-success text-white">
           {!! session('message') !!}
           </p>
           </div>
           @endif
           @if (session('fail'))
          <div class="col-md-12">
           <p class="p-3 mb-2 bg-danger text-white">
           {!! session('fail') !!}
           </p>
           </div>
           @endif
           @if (session('error'))
          <div class="col-md-12">
           <p class="p-3 mb-2 bg-danger text-white">
           {!! session('error') !!}
           </p>
           </div>
           @endif

<div class="col-md-12">
<div class="form-group">
    <label>Email <span class="form-required">*</span></label> 
    <input class="form-control" id="email"  name="email" type="text" value="{{$login_email}}" /></div>
    @error('email')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
</div>



<div class="col-md-12">
<div class="form-group">
    <label>Password <span class="form-required">*</span></label> 
    <input type="password" class="form-control" autocomplete="off" id="password" value="{{$login_pwd}}" name="password" type="text" /></div>
    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
</div>
<div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="rememberme" name="rememberme" {{$is_remember}}>
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
                 <label class="form-check-label float-right" for="rememberPasswordCheck">
                    <a href="{{route('compnay.forgotpassword')}}">Forgot Password</a>
                </label>
              </div>
<div class="col-md-12">
<div class="form-group">
<input type="submit" class="submit_btn" id="submit"  value="Submit" /></div>
</div>
</div>
</form>
</div>
</div>
</div>
</section>


@endsection
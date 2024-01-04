@extends('frontend.layouts.master')

@section('title', 'Forget Password')

@section('content')

<section class="contact-sec">
<div class="bread-top"><svg fill="currentColor" height="59" preserveaspectratio="none" viewbox="0 0 1440 59" width="100%" xmlns="http://www.w3.org/2000/svg"> <path d="M756.5 59.0001C581.048 59.0001 185.5 27 5.59506e-06 27L1.03159e-05 0L1463 0.000255799L1463 27.0003C1299 27.0002 951.635 59.0002 756.5 59.0001Z" fill="white" transform="rotate(180 731.5 29.5)"></path> </svg></div>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="main-title text-center">
<h4>Reset Password</h4>

</div>
</div>
</div>

<div class="row justify-content-center mt-5">
<div class="col-md-6">
<form method="POST" action="{{ route('compnay.UserForgotPasswordCheckEmail') }}">
         
         @csrf
            
              @if(Session::get('fail'))
              <div class="alert alert-danger">
              {{ Session::get('fail') }}
             </div>
             @endif
              <div>
                <input type="text" class="form-control" placeholder="Email" name="email"/>
                @error('email')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
              </div>

               <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        @if(Session::get('error'))<span class="text-danger">
         {{ Session::get('error') }}
        </span> 
         @endif
      @if(Session::get('message'))
         <span class="text-success">
              {{ Session::get('message') }}
        </span>
        @endif
    
        @error('email')
            <span class="text-danger" role="alert">
            {{ $message }}
          </span>
          @enderror


              <div>
               <button type="submit" class="btn btn-primary btn-block">Forgot Password</button>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="{{ route('compnay.login') }}" class="to_register"> Back To Login </a>
                </p>

                <div class="clearfix"></div>
                <br />
              </div>
            </form>
</div>
</div>
</div>
</section>

@endsection
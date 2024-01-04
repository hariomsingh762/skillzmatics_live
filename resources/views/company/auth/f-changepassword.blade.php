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
<form method="post" action="{{url('/company/forgot-password')}}/{{$email}}/{{$token}}">
        @if(Session::get('error'))
              <div class="alert alert-danger">
              {{ Session::get('error') }}
             </div>
         @endif
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" name="password">
          
        </div>
        @error('password')
        <span class="text-danger" role="alert">
        {{ $message }}
        </span>
        @enderror
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confrim Password" name="password_confirmation">
         
        </div>
        @error('password_confirmation')
        <span class="text-danger" role="alert">
        {{ $message }}
        </span>
        @enderror
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Change Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form> 
</div>
</div>
</div>
</section>

@endsection
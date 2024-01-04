@extends('frontend.layouts.master')

@section('title', 'User Dashbord')

@section('content')
<div class="dash_all">
<div class="container">
      <div class="row">
      <div class="col-md-3">
      @include('user.layouts.sidebar')
</div>

<div class="col-md-9">
    <div class="dash_res">
          <p>
            Hello <strong>{{Session::get('FRONT_USER_NAME')}}</strong>
          </p>
          <p>
            From your account dashboard you can view your <a href="{{url('/user/account-details')}}"> addresses</a> and <a href="{{url('/user/change-password')}}">edit your
              password and account details</a>.
          </p>
          </div>
</div>
</div>
</div>  
</div>
@endsection
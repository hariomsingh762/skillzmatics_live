@extends('frontend.layouts.master')

@section('title', 'Account Details')

@section('content')
<div class="dash_all">
<div class="container">
      <div class="row">
      <div class="col-md-3">
      @include('user.layouts.sidebar')
</div>

<div class="col-md-9">
    <div class="dash_res">
    <section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
   <h4>Account <span>Details</span></h4>
   </div>
  </section>
<div class="rht_dshside aboutcontent">
        
                        
                        <div id="default-content">
                           <form class="checkstatusform" method="post" data-id="24" data-name="Newsletter Form" method="post"
        action="{{route('user.updateprofile')}}" enctype="multipart/form-data">
        @csrf
        <!-- Display success message -->
        @if(session('pass'))
        <div class="alert alert-success">
            {{ session('pass') }}
        </div>
        @endif

        <!-- Display error message -->
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
<div class="row">
    <div class="col-md-12">
        <div class="input-group extra">
            <input type="text"  class="form-control" name="name"  value="{{$datalogin->name}}" placeholder="Enter Your Name *">
            @error('name')
            <span class="text-danger float left" role="alert">{{ $message }}</span>
            @enderror
        </div>
</div>
<div class="col-md-4">
        <div class="input-group extra">
            <input type="text" value="{{$datalogin->email}}" class="form-control" name="email" placeholder="Enter Your Email *">
            @error('email')
            <span class="text-danger float left" role="alert">{{ $message }}</span>
            @enderror
        </div>
</div>
<div class="col-md-4">
        <div class="input-group extra">
            <input type="text" value="{{$datalogin->mobile}}" class="form-control" name="mobile" placeholder="Enter Your Mobile *">
            @error('mobile')
            <span class="text-danger float left" role="alert">{{ $message }}</span>
            @enderror
        </div>
       </div>
<div class="col-md-4">
        <div class="input-group extra">
            <input type="text" value="{{$datalogin->company}}" class="form-control" name="company" placeholder="Enter Your company *">
            @error('company')
            <span class="text-danger float left" role="alert">{{ $message }}</span>
            @enderror
        </div>
       </div>
<div class="col-md-4">
        <div class="input-group extra">
            <input type="text" value="{{$datalogin->state}}" class="form-control" name="state" placeholder="State *">
            @error('state')
            <span class="text-danger float left" role="alert">{{ $message }}</span>
            @enderror
        </div>
        </div>
<div class="col-md-4">
        <div class="input-group extra">
            <input type="text" value="{{$datalogin->city}}" class="form-control" name="city" placeholder="City *">
            @error('city')
            <span class="text-danger float left" role="alert">{{ $message }}</span>
            @enderror
        </div>
</div>
<div class="col-md-4">
        <div class="input-group extra">
            <input type="text" value="{{$datalogin->zip}}" class="form-control" name="zip" placeholder="Zip *">
            @error('zip')
            <span class="text-danger float left" role="alert">{{ $message }}</span>
            @enderror
        </div>
</div>
<div class="col-md-12">
        <div class="input-group extra">
           
           <textarea  name="address" rows="4" >{{$datalogin->address}}
           </textarea>
           @error('address')
           <span class="text-danger float left" role="alert">{{ $message }}</span>
           @enderror
       </div>
      </div>
<div class="col-md-5">

        <br>
        <div class="makeappointmentbtn"><button type="submit" class="btn btn-primary btn-login text-uppercase fw-bold py-3 px-5">Update</button></div>
        </div>
        </div>
    </form>
                        </div>
                    </div>
</div>
</div>
</div>
</div> 
</div>
@endsection
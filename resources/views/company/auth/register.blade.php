@extends('frontend.layouts.master')

@section('title', 'Register')

@section('content')



<section class="contact-sec">
<div class="bread-top"><svg fill="currentColor" height="59" preserveaspectratio="none" viewbox="0 0 1440 59" width="100%" xmlns="http://www.w3.org/2000/svg"> <path d="M756.5 59.0001C581.048 59.0001 185.5 27 5.59506e-06 27L1.03159e-05 0L1463 0.000255799L1463 27.0003C1299 27.0002 951.635 59.0002 756.5 59.0001Z" fill="white" transform="rotate(180 731.5 29.5)"></path> </svg></div>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="main-title text-center">
<h4>register</h4>

</div>
</div>
</div>

<div class="row justify-content-center mt-5">
<div class="col-md-6">
<form action="{{route('compnay.register')}}" class="mans_form" enctype="multipart/form-data" method="POST">
    @csrf
<div class="row">
<div class="col-md-12">
<div class="form-group">
    <label>Company Name <span class="form-required">*</span></label>
     <input class="form-control" id="company_name" name="company_name" type="text" /></div>
     @error('company_name')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
    </div>

<div class="col-md-12">
<div class="form-group">
    <label>Email <span class="form-required">*</span></label> 
    <input class="form-control" id="email"  name="email" type="email" /></div>
    @error('email')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
</div>



<div class="col-md-12">
<div class="form-group">
    <label>Password <span class="form-required">*</span></label> 
    <input type="password" class="form-control" autocomplete="off" id="password" name="password" type="text" /></div>
    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
</div>

<div class="col-md-12">
<div class="form-group">
    <label>Conform Password<span class="form-required">*</span></label> 
    <input type="password" class="form-control" autocomplete="off" id="password_confirmation"  name="password_confirmation" type="text" /></div>
    <span class="text-danger">@error('password_confirmation'){{ $message }} @enderror</span>
</div>

<div class="col-md-6">
<div class="form-group">
    <label>State</label> <select class="form-control" id="state" name="state">
        <option disabled="disabled" selected="selected" value="">- Please Select -</option>
        <option value="Alabama">Alabama</option><option value="Alaska">Alaska</option>
        <option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option>
        <option value="California">California</option><option value="Colorado">Colorado</option>
        <option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option>
        <option value="Florida">Florida</option><option value="Georgia">Georgia</option
        option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option>
        <option value="Illinois">Illinois</option><option value="Indiana">Indiana</option>
        <option value="Iowa">Iowa</option><option value="Kansas">Kansas</option>
        <option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option>
        <option value="Maine">Maine</option><option value="Maryland">Maryland</option>
        <option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option>
        <option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option>
        <option value="Missouri">Missouri</option>
        <option value="Montana">Montana</option>
        <option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option>
        <option value="New Hampshire">New Hampshire</option>
        <option value="New Jersey">New Jersey</option>
        <option value="New Mexico">New Mexico</option><option value="New York">New York</option>
        <option value="North Carolina">North Carolina</option>
        <option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option>
        <option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option>
        <option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option>
        <option value="South Carolina">South Carolina</option>
        <option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option>
        <option value="Texas">Texas</option><option value="Utah">Utah</option>
        <option value="Vermont">Vermont</option><option value="Virginia">Virginia</option>
        <option value="Washington">Washington</option><option value="West Virginia">West Virginia</option>
        <option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option>
        <option value="AB">Alberta</option><option value="BC">British Columbia</option><option value="MB">Manitoba</option>
        <option value="NB">New Brunswick</option><option value="NL">Newfoundland</option>
        <option value="NS">Nova Scotia</option><option value="ON">Ontario</option>
        <option value="PE">Prince Edward Island</option><option value="QC">Quebec</option>
        <option value="SK">Saskatchewan</option><option value="Puerto Rico">Puerto Rico</option> 
    </select>
    <span class="text-danger">@error('state'){{ $message }} @enderror</span>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
    <label>Phone Number <span class="form-required">*</span></label>
     <input class="form-control" id="phone" name="phone" type="tel" />
     <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
    </div>
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
@extends('frontend.layouts.master')

@section('title', 'Contact Us')

@section('content')
<!-- page content -->
<link href="{{ asset('admin/css/sweetalert.css') }}" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <head>
  <!-- ... -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<section class="contact-sec">
<div class="bread-top"><svg fill="currentColor" height="59" preserveaspectratio="none" viewbox="0 0 1440 59" width="100%" xmlns="http://www.w3.org/2000/svg"> <path d="M756.5 59.0001C581.048 59.0001 185.5 27 5.59506e-06 27L1.03159e-05 0L1463 0.000255799L1463 27.0003C1299 27.0002 951.635 59.0002 756.5 59.0001Z" fill="white" transform="rotate(180 731.5 29.5)"></path> </svg></div>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="main-title text-center">
<h4>Let's Connect and Elevate Your Healthcare Staffing Firm </h4>

<p>Contact us today to see how we can help you build a robust workforce, help employees flourish and agency thrive. </p>

<p><small><b>Note:</b> Got questions? We are just a message away. Fill out the form and reach out to us now! </small></p>
</div>
</div>
</div>

<div class="row justify-content-center mt-5">
<div class="col-md-6">
<form action="#" class="mans_form" enctype="multipart/form-data" method="POST">
    @csrf
<div class="row">
<div class="col-md-12">
<div class="form-group">
    <label>First Name <span class="form-required">*</span></label> 
    <input class="form-control" id="first_name" name="first_name" type="text" /></div>
</div>

<div class="col-md-12">
<div class="form-group">
    <label>Last Name <span class="form-required">*</span></label> 
    <input class="form-control" id="last_name"  name="last_name" type="text" /></div>
</div>

<div class="col-md-12">
<div class="form-group">
    <label>Email <span class="form-required">*</span></label> 
    <input class="form-control" id="email"  name="email" type="email" /></div>
</div>

<div class="col-md-12">
<div class="form-group">
    <label>Company Name <span class="form-required">*</span></label>
     <input class="form-control" id="company_name" name="company_name" type="text" /></div>
</div>

<div class="col-md-12">
<div class="form-group">
    <label>What describes you best?</label> 
    <select class="form-control" id="describe_you" name="What_describes_you_best">
        <option disabled="disabled" selected="selected" value="">- Please Select -</option>
        <option value="Agency Owner / Exec / Admin">Agency Owner / Exec / Admin</option>
        <option value="Franchisee Owner / Exec / Admin">Franchisee Owner / Exec / Admin</option>
        <option value="Franchisor Owner / Exec / Admin">Franchisor Owner / Exec / Admin</option>
        <option value="Starting an Agency">Starting an Agency</option>
        <option value="Nurse / Administrator">Nurse / Administrator</option>
        <!--<option value="Professional Caregiver">Professional Caregiver</option>-->
        <!--<option value="Family Caregiver">Family Caregiver</option>-->
        <option value="Other">Other</option> </select></div>
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
    </select></div>
</div>

<div class="col-md-6">
<div class="form-group">
    <label>Phone Number <span class="form-required">*</span></label>
     <input class="form-control" id="phone" name="phone" type="tel" /></div>
</div>

<div class="col-md-12">
<div class="form-group">
    <label>How did you hear about us?</label>
    <textarea class="form-control" id="hear" name="hear_about_us"></textarea></div>
</div>

<div class="col-md-12">
<div class="form-group">
    <label>How can we help you?</label><textarea class="form-control" id="hear" name="message"></textarea></div>
</div>

<div class="col-md-12">
<div class="form-group">
<p>We&#39;re committed to your privacy. Shiftleap uses the information you provide to us to contact you about our relevant content, products, and services. You may unsubscribe from these communications at any time. For more information, check out our Privacy Policy.</p>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
    <input class="submit_btn" id="submit" type="button" value="Submit" /></div>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
@include('sweetalert::alert')

@if (session('success_message'))
    {!! session('success_message') !!}
@endif

@endsection
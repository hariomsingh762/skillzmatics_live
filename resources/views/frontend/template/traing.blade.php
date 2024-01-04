@extends('frontend.layouts.master')

@section('title', "Training")

@section('content')
<style>
.head_content.traing-content h4 {
    color: #fd4f04;
}
.head_content.traing-content h1 {
    font-weight: 900;
    font-family: 'Alte Haas Grotesk Bold';
    font-size: 1.8rem;
    color: #0171bd;
    margin-bottom: 20px;
}
.head_content.traing h1 {
    font-size: 1.8rem;
    color:#0171bd;
}
.head_content.traing h4 {
    color: #fd4f04;
}
section.traingn-2 {
    padding: 100px 0px;
}
.traing-img1 {
    text-align: right;
}

@media only screen and (max-width:768px){
    .about_sec .head_content.traing-content {
    padding: 50px 0px;
}
.bread-sec {
    position: inherit;
    padding-top: 0px;
}
 .bread-sec:before {
    background-position: 17% 0 !important;}   
}
</style>


<section class="bread-sec">
<div class="container">
<div class="align-items-center row">
<div class="col-md-7">
<div class="head_content traing">
<h4>Training</h4>

<h1>Grow Your Healthcare Staffing Agency with Expert Training Programs</h1>

<p><strong>Invest in Your Staff's Development for Superior Patient Care and Business Outcomes</strong></p>

<p>ShiftLeap offers training programs meticulously crafted to equip your team with the skills and knowledge they need to excel in their roles, improve patient outcomes, and add to your agency’s growth and long-term success. </p>

<p>We use a range of training methods and innovative technologies to make learning easy, accessible, and effective. Get in touch today to learn more about our training programs and how we can help elevate your healthcare staffing agency! </p>

<div class="get_quotebtn mt-5"><a class="btn2" href="#">Get Started Now</a></div>
</div>
</div>

<div class="col-md-5">
<div class="head_img"><img src="{{ asset('front_assets/assets/img/header-people.png')}}" class="img-fluid" alt=""></div>
</div>
</div>
</div>
</section>



<section class="about_sec">
<div class="container">
<div class="row mt-4">
<div class="col-md-6">
<img src="https://caredigest.com/shiftleap/front_assets/assets/img/traingng.jpg" class="img-fluid" alt="">
</div>
<div class="col-md-6">
<div class="head_content traing-content">
<h4>Orientation</h4>

<h1>Orientation Training for Health Care Staffing Agencies</h1>

<p><strong>Setting Your New Hires Up for Success</strong></p>

<p>Orientation training is a crucial part of onboarding new staff members, and it can significantly impact their performance in new roles. At ShiftLeap, we offer on-point training that covers everything new employees need to know to start off on the right foot.  </p>

<p>From the agency's policies and processes to organizational culture and values, a complete overview of what it means to be part of a dynamic and thriving team. By investing in orientation training, you can set new hires up for success, ensuring they are comfortable and confident in their assigned roles — ultimately improving the quality of the outcome. </p>

<div class="get_quotebtn mt-5"><a class="btn2" href="#">Enroll in Orientation Training Now</a></div>
</div>
</div>
</div>
</div>
</section>


<section class="traingn-2">
    <div class="container">
        <div class="head_content traing-content text-center">
<h4>Refresher Training</h4>

<h1>Refresher Training for Health Care Staffing Agencies</h1>

<p><strong>Keep Your Healthcare Staff Sharp and Progressive. Boost Your Team's Knowledge and Confidence</strong></p>

<p>We provide refresher training to help your personnel stay current on the newest trends and best practices in the healthcare staffing sector, as well as to ensure compliance with regulations. Whether it is a short-term course or a more comprehensive program, our training is designed to elevate skills and knowledge, improve patient care and outcomes, keep your team engaged and motivated, and increase job satisfaction.   </p>

<p>By investing in refresher training, you can keep your employees informed and maintain compliance with industry regulations and standards. This ultimately leads to better productivity, engagement, and care delivered to the patient.  </p>

</div>
    </div>    
</section>   



<section class="about_sec">
<div class="container">
<div class="row mt-4">

<div class="col-md-6">
<div class="head_content traing-content">
<h4>Registration/Subscription </h4>

<h1>Register for Our Exclusive Health Care Staffing Training Program Today</h1>

<p><strong>Invest in Your Team's Development and Boost Your Agency's Success</strong></p>

<p>Whether you are looking to onboard new staff, bridge skills gaps, or provide ongoing training and development opportunities, we can help you.
Fill out the registration form below to get started today! 
 </p>
</div>
</div>
<div class="col-md-6">
<div class="traing-img1">    
<img src="https://caredigest.com/shiftleap/front_assets/assets/img/healthcaetraing.png" class="img-fluid" alt="">
</div>
</div>
</div>
</div>
</section>

@endsection
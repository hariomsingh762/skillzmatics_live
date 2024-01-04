@extends('frontend.layouts.master')

@section('title', 'Review Submit')

@section('content')
        <!-- Bootstrap Rating css -->
        <link href="{{ asset('admin/assets/libs/bootstrap-rating/bootstrap-rating.css')}}" rel="stylesheet" type="text/css" />
    
        <!-- Bootstrap Css -->
        <!-- Icons Css -->
        <link href="{{ asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{ asset('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
<style>
/* Style the container */
#q27 {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

/* Style the question text */
#q27 .question {
    font-weight: 400;
    margin-bottom: 10px;
}

/* Style the table */
.matrix_stars {
    width: 100%;
    border-collapse: collapse;
}

/* Style table rows */
.matrix_row_light{
    background-color: #FFEECC; /* Alternating row colors */
}

.matrix_row_dark{
    background-color: #ffffff; /* Alternating row colors */
}

/* Style table cells */
.matrix_stars td {
    padding: 10px;
    text-align: left;
}

/* Style star rating elements */
.star {
    display: inline-block;
    font-size: 24px;
    color: #ffbb00;
    cursor: pointer;
    transition: color 0.2s;
}

/* Hover effect for stars */
.star:hover {
    color: #ffcc00;
}

/* Hide accessibility hidden text */
.accessibility_hidden {
/*    display: none;*/
}

/* Style the required icon */
.icon_required {
    color: #f00;
    font-size: 16px;
    margin-left: 5px;
}
.form_table {
    width: 650px;
    margin-left: auto;
    margin-right: auto;
    border-radius: 0;
    border: 1px solid #D9DDE2;
    background: #FFFFFF;
    background-size: cover;
    color: #36454E;
    overflow: hidden;
    box-shadow: none;
    background-position: 50% 50%;
}
.q .matrix_stars .star, .q .icon_add, .q .icon_calendar, .q .icon_del {
    cursor: pointer;
    display: inline-block;
    height: 1.2em;
    position: relative;
    user-select: none;
    vertical-align: text-top;
    width: 1.5em;
}
.checklist h2 {
    font-size: 30px;
    font-weight: 600;
    color: #1e1f20;
    margin-bottom: 20px;
    padding: 15px 20px;
    text-align: center;
}
.checklist h2 span {
    background: linear-gradient(to right, #0861b9 11%, #ef5a28 102%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.form-check1 label {
    display: block;
    font-size: 14px;
    margin-top: 10px;
}
.form-check1 {
    padding: 0px 15px;
}
.form-check1 input {
    width: 100%;
    font-size: 14px;
    height: 34px;
    border: 1px solid #ddd;
}
.form-check1 select {
    width: 100%;
       font-size: 14px;
    height: 34px;
    border: 1px solid #ddd;
}
.form-check1 button {
    margin: 30px 0px;
    background: #f05a27;
    border: none;
    padding: 10px 20px;
    color: #fff;
    text-transform: uppercase;
}
.q {
    padding: 10px;
    margin-bottom: 10px;
    margin-left: 10px;
    float: left;
    display: block;
}
.full_width {
    padding-left: 0 !important;
    padding-right: 0 !important;
    padding-top: 0 !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    width: 100%;
}
</style>

<div class="form_table">
<div class="q full_width"><div class="segment_header"><h1>Success</h1></div></div>
<div class="q full_width"><div class="full_width_space"><div id="success_body" style="text-align: left;"><span style="font-size: 16px;">Your form has been successfully submitted. Thank you for your time.</span></div></div></div>
<div class="clear"></div>
<div class="q">Reference #: 17332173</div>
<div class="clear"></div>
</div>

        <!-- Bootstrap rating js -->
                <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/assets/libs/bootstrap-rating/bootstrap-rating.min.js')}}"></script>

         
@endsection



@extends('frontend.layouts.master')

@section('title', 'Skills Checklist')

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
</style>

<div class="form_table">
    <div class="checklist">
       <h2>Case Management Skills <span>Checklist</span></h2>
    </div>  
    <div class="form-check1">
            @if(Session::get('pass'))
            <div class="alert alert-success" role="alert">
                <strong>Thank you!</strong> You have submitted the review.
            </div>
            @endif
        <form method="POST" action="{{route('submitSkillzReview')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="requestedBy">Requested By:</label>
                    <select id="requestedBy" name="requestedBy" >
                        <option value="1">Health Carousel</option>
                        <option value="2">Health Carousel</option>
                        <option value="3">Health Carousel</option>
                    </select>
                    @error('requestedBy')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                </div>
            <div class="col-md-6">
                <label for="todaysDate">Today's date</label>
                <input type="date" id="todaysDate" name="todaysDate" value="{{ date('Y-m-d') }}">
            </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName">
                    @error('firstName')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-6">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName">
                    @error('lastName')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="mobileNumber">Mobile Number:</label>
                    <input type="text" id="mobileNumber" name="mobileNumber">
                    @error('mobileNumber')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-6">
                    <label for="emailAddress">Email Address:</label>
                    <input type="text" id="emailAddress" name="emailAddress">
                    @error('emailAddress')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="confirmEmail">Confirm Email:</label>
                    <input type="text" id="confirmEmail" name="confirmEmail">
                    @error('confirmEmail')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                </div>
            </div>
            <div id="q27" class="q required">
               <a class an item_anchor name="ItemAnchor9"></a>
                <span class="question top_question">
                    @php
                    $data = json_decode($skillUnitList->data_set, true);
                    $totalQuestionCount = 0;
                    @endphp

                     @if (!empty($data) && is_array($data))
                        @foreach ($data as $item)
                            <strong>{{ $item['top_question'] }}</strong><br><br>
                            <input type="hidden" name="data[{{ $loop->index }}][top_question]" value="{{ $item['top_question'] }}" class="rating"/>
                            {!! $item['rule'] !!}

                            @if (isset($item['question_set']) && is_array($item['question_set']))
                                <table class="matrix matrix_stars">
                                    <tbody>
                                        @foreach ($item['question_set'] as $index => $question)
                                            <tr class="{{ $index % 2 == 0 ? 'matrix_row_dark' : 'matrix_row_light' }}">
                                                <td style="width:360px;">
                                                    <div class="question-container">
                                                        <span class="question">{{ $question['question_name'] }}</span>
                                                        <input type="hidden" name="data[{{ $loop->parent->index }}][question_set][{{ $index }}][question_name]" value="{{ $question['question_name'] }}" class="rating"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="rating-star">
                                                        @php $inputName = "data[{$loop->parent->index}][question_set][{$index}][stars]" @endphp
                                                        <input type="hidden" name="{{ $inputName }}" class="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-muted"/>
                                                        @error($inputName)
                                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                            @endif
                        @endforeach
                    @endif
                </span>

            </div>
             <div class="row">
                <div class="col-md-12">
                   <button type="submit">Submit</button>
                </div>  
              
            </div>
        </form>    
    </div>    



</div>

        <!-- Bootstrap rating js -->
                <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/assets/libs/bootstrap-rating/bootstrap-rating.min.js')}}"></script>

        <script src="{{ asset('admin/assets/js/pages/rating-init.js')}}"></script>

         
@endsection



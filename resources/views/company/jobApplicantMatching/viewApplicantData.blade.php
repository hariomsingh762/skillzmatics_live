@extends('company.layouts.master')
@section('title','View Applicant Review')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">View Applicant Review</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                            <li class="breadcrumb-item"><a href="#">View Applicant </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Review</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="dropdown">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-arrow-left"></i> Back
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div id="notification-message"></div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <table class="table mb-0 table-success" style="border: 2px solid gray;margin:10px 10px;">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <th style="border-right: 2px solid black;">Name </th>
                                    <td>{{$ApplicantReviewData->name}}</td>
                                </tr>
                                <tr>
                                    <th style="border-right: 2px solid black;">Email </th>
                                    <td>{{$ApplicantReviewData->email}}</td>
                                </tr>
                                <tr>
                                    <th style="border-right: 2px solid black;">Contact </th>
                                    <td>{{$ApplicantReviewData->mobile}}</td>
                                </tr>
                                
                                <tr>
                                    <th style="border-right: 2px solid black;">Applied Date </th>
                                    <td>{{$ApplicantReviewData->mobile}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h4 class="card-title mt-4">Review Data</h4>
                        <div class="accordion" id="accordionExample">

                            @php
                            $abc = json_decode($ApplicantReviewData->checklist_response, true);
                            $holdValue = $abc;

                            @endphp
                            @if (!is_null($holdValue))
                            @foreach($holdValue as $index_1 => $data_1)

                            @if ($data_1['question_set']!=NULL)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title"><span class="badge rounded-pill bg-info">{{
                                                    $data_1['top_question'] }}</span></h4>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Ratings</th>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $classes = [
                                                        '0' => '',
                                                        '1' => 'table-light',
                                                        '2' => 'table-success',
                                                        '3' => 'table-info',
                                                        '4' => 'table-warning',
                                                        '5' => 'table-danger'
                                                        ];
                                                        @endphp

                                                        @if (isset($data_1['question_set']) &&
                                                        is_array($data_1['question_set']))
                                                        @foreach ($data_1['question_set'] as $index_2 => $question)
                                                        @php
                                                        $classIndex = $index_2 % count($classes);
                                                        $class = $classes[$classIndex];
                                                        @endphp

                                                        <tr class="{{ $class }}" id="row-{{ $index_2 }}">
                                                            <th scope="row">{{ $index_2 + 1 }}</th>
                                                            <td>{{ $question['question_name'] }}</td>
                                                            <td>@for($i = 1; $i <= 5; $i++) @if($i <=$question['stars'])
                                                                    <span style="font-size: 20px;color: #9e670e;">
                                                                    &#9733;</span>
                                                                    @else
                                                                    <span
                                                                        style="font-size: 20px; color: grey;">&#9733;</span>
                                                                    @endif
                                                                    @endfor</td>

                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- end row -->


                            @endforeach
                            @endif



                        </div>

                    </div>
                </div>
            </div>

            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    ©
                    <script>document.write(new Date().getFullYear())</script> Dpt<span class="d-none d-sm-inline-block">
                        - Crafted with <i class="mdi mdi-heart text-danger"></i> by .....</span>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

@endsection
@extends('company.layouts.master')

@section('title', 'Contact Applicant')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Email Compose</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                            <li class="breadcrumb-item"><a href="#">Email</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Email Compose</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <!-- Right Sidebar -->
                    <div class="email-rightbar">

                        <div class="card">
                            <div class="card-body">
                                <div>
                                @if(Session::get('success'))
                                        <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> Mail has been sent to user.
                                        </div>
                                        @endif
                                        @if(Session::get('error'))
                                        <div class="alert alert-success" role="alert">
                                            <strong>Failed!</strong>
                                        </div>
                                        @endif 
                                    <form method="post" action="{{ route('send.email.and.save') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" name="email" value="{{$ApplicantReviewData->email}}"
                                                class="form-control" placeholder="To">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="subject" class="form-control"
                                                placeholder="Subject">
                                        </div>
                                        <div class="mb-3">
                                            <textarea id="email-editor"
                                                name="titleDescription">{{$getJobDetail->description}}</textarea>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ $ApplicantReviewData->id }}">
                                        <input type="hidden" name="company_id" value="{{ $getJobDetail->company_id }}">
                                        <input type="hidden" name="jobpost_id" value="{{ $getJobDetail->id }}">
                                        <div class="btn-toolbar mb-0">
                                            <div class="">
                                                <button class="btn btn-purple waves-effect waves-light">
                                                    <span>Send</span>
                                                    <i class="fab fa-telegram-plane ms-2"></i> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end Col-9 -->
                </div>

            </div><!-- End row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    ©
                    <script>document.write(new Date().getFullYear())</script> Veltrix<span
                        class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by
                        Themesbrand.</span>
                </div>
            </div>
        </div>
    </footer>


</div>
<!-- end main content-->
@endsection
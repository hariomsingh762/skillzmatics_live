@extends('company.layouts.master')

@section('title','Profile Info')

@section('content')  
           <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Profile Info Page</h6>
                                    <ol class="breadcrumb m-0">
                                      
                                        <li class="breadcrumb-item active" aria-current="page">Profile Info Page</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card directory-card">
                                    @php
                                       ($companyInfo->address);
                                    @endphp
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('admin/assets/images/users/user-2.jpg')}}" alt="" class="img-fluid img-thumbnail rounded-circle avatar-lg">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="text-primary font-size-18 mb-1">{{$companyInfo->company_name}}</h5>
                                                <p class="mb-0">{{$companyInfo->email}}</p>
                                            </div>
                                            <ul class="list-unstyled social-links ms-auto">
                                                <li><a href="#" class="btn-primary"><i class="mdi mdi-facebook"></i></a></li>
                                                <li><a href="#" class="btn-info"><i class="mdi mdi-twitter"></i></a></li>
                                            </ul>
                                          </div>
                                          <hr>
                                        <p class="mb-0"><b>Intro : </b>{{$companyInfo->company_name}}</p>
                                        <hr>
                                                                                <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                            
                                                </thead>
                                                <tbody>


                                                <tr>
                                                    <td>Mobile</td>
                                                    <td>
                                                        <a href="#" id="inline-mobile" data-type="text" data-pk="1" data-title="Enter mobile number">{{$companyInfo->phone}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Country</td>
                                                    <td>
                                                        <a href="#" id="inline-country" data-type="select" data-pk="1" data-value="" data-title="Select country">{{$companyInfo->country}}</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>State</td>
                                                    <td>
                                                        <a href="#" id="inline-country" data-type="select" data-pk="1" data-value="" data-title="Select country">{{$companyInfo->state}}</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>City</td>
                                                    <td>
                                                        <a href="#" id="inline-country" data-type="select" data-pk="1" data-value="" data-title="Select country"> {{$companyInfo->city}} | {{$companyInfo->zip}}</a>
                                                    </td>
                                                </tr>

                                               
    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div><!--end row -->



                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer>

                
            </div>
            <!-- end main content-->

@endsection
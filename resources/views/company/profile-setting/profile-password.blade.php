@extends('company.layouts.master')

@section('title','Profile Password')

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
                                    <h6 class="page-title">Profile Password Page</h6>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <div class="p-3">
                                @if(Session::get('fail'))
                                    <div class="alert alert-danger mt-5" role="alert">
                                        {{ Session::get('fail') }} !
                                    </div>
                                @endif
                                @if(Session::get('success'))
                                    <div class="alert alert-success mt-5" role="alert">
                                        {{ Session::get('success') }} !
                                    </div>
                                @endif
                                @if(Session::get('changePassMessage'))
                                    <div class="alert alert-success mt-5" role="alert">
                                       {{ Session::get('changePassMessage') }}
                                    </div>
                                 @endif
                                            <form class="mt-4" method="POST" action="{{ route('compnay.profilePasswordUpdateSetting') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label" for="old_pass">Old Password</label>
                                                    <input type="password" class="form-control" name="old_pass" id="old_pass" autocomplete="off" placeholder="Enter old Password" value="">
                                                    @error('old_pass')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                                </div>

                                                <div class="mb-3">
                                                    <input type="password" class="form-control" name="userpassword" id="userpassword" autocomplete="off" placeholder="Enter password" value="">
                                                    @error('password')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                                </div>

                                                <div class="mb-3">
                                                    <input type="password" class="form-control" name="password_confirmation" autocomplete="off" id="password_confirmation" placeholder="Confirm Password" value="">
                                                    @error('password_confirmation')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                                </div>

                                                <div class="mb-3 row">
                                                    <div class="col-sm-6 text-end">
                                                        <button class="btn btn-primary w-md waves-effect waves-light float right" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

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




@endesction
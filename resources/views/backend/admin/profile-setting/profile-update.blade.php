@extends('backend.admin.layouts.master')

@section('title','Profile Update')

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
                                    <h6 class="page-title">Profile Update Page</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Veltrix</a></li>
                                        <li class="breadcrumb-item"><a href="#">Extra Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profile Update Page</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        @if(Session::get('pass'))
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> {{Session('pass')}}.
                                        </div>
                                        @endif

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab">
                                                    <span class="d-none d-md-block">Basic</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#address" role="tab">
                                                    <span class="d-none d-md-block">Address</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#social" role="tab">
                                                    <span class="d-none d-md-block">Social</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                                                    <span class="d-none d-md-block">Settings</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active p-3" id="home2" role="tabpanel">
										<!-- Validation Form -->
				                         <div class="row">
				                            <div class="col-lg-9" style="">
				                                <div class="card">
				                                    <div class="card-body">
				                                        <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('admin.profileUpdateStore')}}" enctype="multipart/form-data" >
                                            				@csrf
				                                            <div class="col-md-4">
				                                                <label for="validationCustom01" class="form-label">First name</label>
				                                                <input type="text" class="form-control" name="first_name" id="validationCustom01" placeholder="Mark" value="{{$adminInfo->first_name}}" required>
				                                                <div class="valid-feedback">
				                                                    Looks good!
				                                                </div>
				                                            </div>
				                                            <div class="col-md-4">
				                                                <label for="validationCustom02" class="form-label">Last name</label>
				                                                <input type="text" class="form-control" name="last_name" id="validationCustom02" placeholder="Otto" value="{{$adminInfo->last_name}}" required>
				                                                <div class="valid-feedback">
				                                                    Looks good!
				                                                </div>
				                                            </div>
				                                            <div class="col-md-4">
				                                                <label for="validationCustomUsername" class="form-label">Username</label>
				                                                <div class="input-group has-validation">
				                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
				                                                    <input type="text" class="form-control" name="user_name" id="validationCustomUsername"
				                                                        aria-describedby="inputGroupPrepend"  value="{{$adminInfo->user_name}}" required>
				                                                    <div class="invalid-feedback">
				                                                        Please choose a username.
				                                                    </div>
				                                                </div>
				                                            </div>

				                                            <div class="col-md-4">
				                                                <label for="validationCustomUsername" class="form-label">Email</label>
				                                                <div class="input-group has-validation">
				                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
				                                                    <input type="text" class="form-control" name="email"id="validationCustomUsername"
				                                                        aria-describedby="inputGroupPrepend" value="{{$adminInfo->email}}" required>
				                                                    <div class="invalid-feedback">
				                                                        Please choose a valid and unique email.
				                                                    </div>
				                                                </div>
				                                            </div>

				                                            <div class="col-md-4">
				                                                <label for="validationCustom03" class="form-label">Mobile</label>
				                                                <input type="text" class="form-control" name="phone"id="validationCustom03" value="{{$adminInfo->phone}}" required>
				                                                <div class="invalid-feedback">
				                                                    Please provide a valid Mobile Number.
				                                                </div>
				                                            </div>

				                                            <div class="col-md-4">
				                                                <label for="validationCustom03" class="form-label">Designation</label>
				                                                <input type="text" class="form-control" name="designation"id="validationCusto" value="{{$adminInfo->designation}}" required>
				                                                <div class="invalid-feedback">
				                                                    Please provide your designation.
				                                                </div>
				                                            </div>

				                                            <div class="col-12">
				                                                <label class="form-label">Add Bio</label>
				                                                <div>
				                                                    <textarea required class="form-control" name="bio" rows="5">{{$adminInfo->bio}}</textarea>
				                                                </div>
				                                            </div>

				                                            <div class="col-12">
				                                                <button class="btn btn-primary" type="submit">Submit form</button>
				                                            </div>
				                                        </form>
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
                            			<!--Form Section End-->
                                            </div>
                                            <div class="tab-pane p-3" id="address" role="tabpanel">
											<!-- Validation Form -->
						                         <div class="row">
						                            <div class="col-lg-9">
						                                <div class="card">
						                                    <div class="card-body">
						                                        <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('admin.profileAddressUpdateStore')}}" enctype="multipart/form-data" >
                                            				@csrf
						                                            <div class="col-md-3">
						                                                <label for="validationCustom04" class="form-label">Country</label>
						                                                <select class="form-select" name="country" id="validationCustom041" required>
						                                                    <option selected disabled value="">Choose...</option>
						                                                    <option>India</option>
						                                                </select>
						                                                <div class="invalid-feedback">
						                                                    Please select a valid country.
						                                                </div>
						                                            </div>

						                                            <div class="col-md-3">
						                                                <label for="validationCustom04" class="form-label">State</label>
						                                                <select class="form-select" name="state" id="validationCustom041" required>
						                                                    <option selected disabled value="">Choose...</option>
						                                                    <option>Uttar Pradesh</option>
						                                                </select>
						                                                <div class="invalid-feedback">
						                                                    Please select a valid state.
						                                                </div>
						                                            </div>

						                                            <div class="col-md-6">
						                                                <label for="validationCustom03" class="form-label">City</label>
						                                                <input type="text" class="form-control" name="city" id="validationCustom03" required>
						                                                <div class="invalid-feedback">
						                                                    Please provide a valid city.
						                                                </div>
						                                            </div>
						                                            <div class="col-md-3">
						                                                <label for="validationCustom05" class="form-label">Zip</label>
						                                                <input type="text" class="form-control" name="zip" id="validationCustom051" required>
						                                                <div class="invalid-feedback">
						                                                    Please provide a valid zip.
						                                                </div>
						                                            </div>
						                                            <div class="col-12">
						                                                <button class="btn btn-primary" type="submit">Submit form</button>
						                                            </div>
						                                        </form>
						                                    </div>
						                                </div>
						                            </div>
						                        </div>
                            					<!--Form Section End-->
                                            </div>
                                            <div class="tab-pane p-3" id="social" role="tabpanel">
											<!-- Validation Form -->
						                         <div class="row">
						                            <div class="col-lg-6">
						                                <div class="card">
						                                    <div class="card-body">
						                                        <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('admin.profileSocialUpdateStore')}}" enctype="multipart/form-data" >
                                            				@c
                                                                    <div data-repeater-list="group-a">
                                                                        <div data-repeater-item class="row">
                                                                            <div  class="mb-3 col-lg-6">
                                                                                <label class="form-label" for="name">Question</label>
                                                                                <input type="text" id="name" name="question_name" class="form-control"/>
                                                                                @error('question_name')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                                                            </div>
                                
                                                                            <!-- <div  class="mb-3 col-lg-2">
                                                                                <label class="form-label" for="email">Email</label>
                                                                                <input type="email" id="email" class="form-control"/>
                                                                            </div> -->
                                
                                                                           <div  class="mb-3 col-lg-4">
                                                                                <label class="form-label" for="subject">Stars</label>
                                                                                <input type="text" id="subject" name="stars" class="form-control"/>
                                                                                @error('stars')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                                                            </div>
                                
                                                                           <!--  <div class="mb-3 col-lg-2">
                                                                                <label class="form-label" for="resume">Resume</label>
                                                                                <input type="file" class="form-control" id="resume">
                                                                                
                                                                            </div> -->
                                
                                                                            <!-- <div class="mb-3 col-lg-2 col-sm-8">
                                                                                <label class="form-label" for="message">Message</label>
                                                                                <textarea id="message" class="form-control"></textarea>
                                                                            </div> -->
                                                                            <!-- -->
                                                                            <div class="col-lg-2 col-sm-4 align-self-center">
                                                                                <div class="d-grid">
                                                                                    <input data-repeater-delete type="button" class="btn btn-primary mb-2" value="Delete"/>
                                                                                </div>    
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                    </div>
                                                                       <input data-repeater-create type="button" class="btn btn-success mt-2 mt-sm-0" value="Add"/>
						                                            <div class="col-12">
						                                                <button class="btn btn-primary" type="submit">Submit form</button>
						                                            </div>
						                                        </form>
						                                    </div>
						                                </div>
						                            </div>
						                        </div>
                            			<!--Form Section End-->
                                            </div>
                                            <div class="tab-pane p-3" id="settings" role="tabpanel">
                                                <p class="mb-0">
                                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                                    art party before they sold out master cleanse gluten-free squid
                                                    scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                                    art party locavore wolf cliche high life echo park Austin. Cred
                                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                                    farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                                    mustache readymade thundercats keffiyeh craft beer marfa
                                                    ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                                    vegan.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <!-- Validation Form -->
                         <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation" novalidate>
                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label">First name</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="Mark" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom02" class="form-label">Last name</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Otto" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustomUsername" class="form-label">Username</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" class="form-control" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="validationCustomUsername" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" class="form-control" id="validationCustomUsername"
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a valid and unique email.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Mobile</label>
                                                <input type="text" class="form-control" id="validationCustom03" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile Number.
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="validationCustom04" class="form-label">Country</label>
                                                <select class="form-select" id="validationCustom04" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <option>...</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid country.
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="validationCustom04" class="form-label">State</label>
                                                <select class="form-select" id="validationCustom04" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <option>...</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">City</label>
                                                <input type="text" class="form-control" id="validationCustom03" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="validationCustom05" class="form-label">Zip</label>
                                                <input type="text" class="form-control" id="validationCustom05" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Add Bio</label>
                                                <div>
                                                    <textarea required class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" required>
                                                    <label class="form-check-label" for="invalidCheck1">
                                                        Agree to terms and conditions
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        You must agree before submitting.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Submit form</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                            <!--Form Section End-->





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
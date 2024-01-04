@extends('company.layouts.master')

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
                                            
                                            
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active p-3" id="home2" role="tabpanel">
										<!-- Validation Form -->
				                         <div class="row">
				                            <div class="col-lg-9" style="">
				                                <div class="card">
				                                    <div class="card-body">
				                                        <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('compnay.profileUpdateSetting')}}" enctype="multipart/form-data" >
                                            				@csrf
				                                            <div class="col-md-4">
				                                                <label for="validationCustom01" class="form-label">Company Name</label>
				                                                <input type="text" class="form-control" name="company_name" id="validationCustom01" placeholder="Mark" value="{{$companyInfo->company_name}}" required>
				                                                <div class="valid-feedback">
				                                                    Looks good!
				                                                </div>
				                                            </div>
				                                           
				                                           

				                                            <div class="col-md-4">
				                                                <label for="validationCustomUsername" class="form-label">Email</label>
				                                                <div class="input-group has-validation">
				                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
				                                                    <input type="text" class="form-control" name="email"id="validationCustomUsername"
				                                                        aria-describedby="inputGroupPrepend" value="{{$companyInfo->email}}" required>
				                                                    <div class="invalid-feedback">
				                                                        Please choose a valid and unique email.
				                                                    </div>
				                                                </div>
				                                            </div>

				                                            <div class="col-md-4">
				                                                <label for="validationCustom03" class="form-label">Mobile</label>
				                                                <input type="text" class="form-control" name="phone"id="validationCustom03" value="{{$companyInfo->phone}}" required>
				                                                
				                                            </div>

				                                            <div class="col-md-3">
				                                                <label for="validationCustom03" class="form-label">Country</label>
				                                                <input type="text" class="form-control" name="country"id="validationCusto" value="{{$companyInfo->country}}" required>
				                                                
				                                            </div>
                                                            <div class="col-md-3">
				                                                <label for="validationCustom03" class="form-label">State</label>
				                                                <input type="text" class="form-control" name="state"id="validationCusto" value="{{$companyInfo->state}}" required>
				                                                
				                                            </div>
                                                            <div class="col-md-3">
				                                                <label for="validationCustom03" class="form-label">Zip</label>
				                                                <input type="text" class="form-control" name="zip"id="validationCusto" value="{{$companyInfo->zip}}" required>
				                                                
				                                            </div>
                                                            <div class="col-md-3">
				                                                <label for="validationCustom03" class="form-label">City</label>
				                                                <input type="text" class="form-control" name="city"id="validationCusto" value="{{$companyInfo->city}}" required>
				                                                
				                                            </div>

				                                            <div class="col-12">
				                                                <label class="form-label">Address</label>
				                                                <div>
				                                                    <textarea required class="form-control" name="address" rows="5">{{$companyInfo->address}}</textarea>
				                                                </div>
				                                            </div>
                                                            @if(!empty($companyInfo->logo))
                                                            <div class="col-12">
                                                            <div class="content featured-image">
							                                 <p><img id="output" src="{{asset('company')}}/{{$companyInfo->logo}}" width="140" height="140"/></p>	
							                                 <input type="file"  accept="image/*" name="logo" id="file"  onchange="loadFile(event)" style="display: none;">
							                                   <p><label for="file" style="cursor: pointer;" class="btn btn-success">Upload Logo</label></p>							
						                                     </div>
				                                            </div>
															@else
															<div class="col-12">
                                                            <div class="content featured-image">
							                                 <p><img id="output" width="140" height="140"/></p>	
							                                 <input type="file"  accept="image/*" name="logo" id="file"  onchange="loadFile(event)" style="display: none;">
							                                   <p><label for="file" style="cursor: pointer;" class="btn btn-success">Upload Logo</label></p>							
						                                     </div>
				                                            </div>
															@endif

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

<script>
    var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
     };
</script>


@endesction
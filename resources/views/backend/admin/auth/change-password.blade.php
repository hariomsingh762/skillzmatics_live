@extends('admin.layouts.master')

@section('title', 'Change Pasword')

@section('content')
 
<!-- page content -->
  <div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Update</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Update<small>Password</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
                  <form method="POST" action="{{ route('admin.updatepassword') }}">
              @csrf

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Current Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
                      <input type="password" class="form-control" name="current_password"  placeholder="Enter Current Password Here">
                        <span class="text-danger">@error('current_password'){{ $message }} @enderror</span>	
                         @if(Session::get('error'))<span class="text-danger">
                             {{ Session::get('error') }}
                             </span>	
                            @endif
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">New Password<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
                      <input type="password" class="form-control" name="password" placeholder="Enter  New Password Here">
                      <span class="text-danger">@error('password'){{ $message }} @enderror</span>	
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Conform Password<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
                      <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password">
                      <span class="text-danger">@error('password_confirm'){{ $message }} @enderror</span>
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

					
				
				</div>
			</div>
<!-- /page content -->
@if(Session::has('updatepassword')) 
  <script type="text/javascript">
  	toastr.success(' {{session('updatepassword')}}');
  </script>
 @endif
  @endsection
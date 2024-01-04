@extends('frontend.layouts.master')

@section('title', 'Change Password')

@section('content')
<div class="dash_all">
<div class="container">
      <div class="row">
      <div class="col-md-3">
	  @include('user.layouts.sidebar')
</div>

<div class="col-md-9">
     <div class="dash_res">
         <section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
   <h4>Update <span>Password</span></h4>
   </div>
  </section>
<div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								
								<div class="x_content">
									
                  <form method="POST" action="{{ route('users.updatepassword') }}" enctype="multipart/form-data">
              @csrf

			  @if(session('updatepassword'))
        <div class="alert alert-success">
            {{ session('updatepassword') }}
        </div>
        @endif
                                <div class="row">
                                    <div class="col-md-12">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Current Password <span class="required">*</span>
											</label>
											<div class="col-md-12 col-sm-12 ">
                                            <input type="password" class="form-control" name="current_password"  placeholder="Enter Current Password Here">
                                            <span class="text-danger">@error('current_password'){{ $message }} @enderror</span>	
                                            @if(Session::get('error'))<span class="text-danger">
                                             {{ Session::get('error') }}
                                            </span>	
                                           @endif
											</div>
										</div>
										</div>
                                    <div class="col-md-12">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">New Password<span class="required">*</span>
											</label>
											<div class="col-md-12 col-sm-12 ">
                                           <input type="password" class="form-control" name="password" placeholder="Enter  New Password Here">
                                           <span class="text-danger">@error('password'){{ $message }} @enderror</span>	
											</div>
										</div>
</div>
                                    <div class="col-md-12">
                                           <div class="item form-group">
											<label class="col-form-label col-md-12 col-sm-12 label-align" for="last-name">Conform Password<span class="required">*</span>
											</label>
											<div class="col-md-12 col-sm-12 ">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password">
                                            <span class="text-danger">@error('password_confirmation'){{ $message }} @enderror</span>
											</div>
										</div>
										</div>
                                    <div class="col-md-12">
                                        <br>
										<!--<div class="ln_solid"></div>-->
										<div class="item form-group">
											<div class="col-md-12 col-sm-12">
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
</div>
</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					
				
				</div>
			</div>
</div>
</div>
</div>
</div> 
</div>
<!-- /page content -->

@endsection
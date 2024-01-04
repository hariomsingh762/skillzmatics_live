@extends('admin.layouts.master')

@section('title', 'Profile Edit')

@section('content')
<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Profile</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Profile<small>Profile Edit</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
                  <form method="POST" action="{{ route('admin.updateprofile') }}" enctype="multipart/form-data">
              @csrf

              <div class="item form-group text-center" style="cursor: pointer;">
										<div class="content featured-image">
							     
							     @if($ADMIN_LOGIN['image'] !='')
                   <label for="file" style="cursor: pointer;">
							     <p><img id="output" width="100px" height="100px" src="{{asset('profile')}}/{{$ADMIN_LOGIN['image']}}"/></p>	
							     <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">
							       <p class="icon"><i class="fa fa-camera" aria-hidden="true"></i></p>
							     </label>
							     @else
                   <label for="file" style="cursor: pointer;">
							     <p><img id="output" width="100px" height="100px" /></p>	
							     <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">
                     <p class="icon"><i class="fa fa-camera" aria-hidden="true"></i></p>
                   </label>
							    @endif						
						      </div>
									</div>


                   
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" class="form-control " name="name" value="{{$ADMIN_LOGIN['name']}}">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>		
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="email"  class="form-control" value="{{$ADMIN_LOGIN['email']}}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>	
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
      <script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

  @if(Session::has('pass'))
  <script type="text/javascript">
  	toastr.success(' {{session('pass')}}');
  </script>
  
 @endif
 
  @endsection
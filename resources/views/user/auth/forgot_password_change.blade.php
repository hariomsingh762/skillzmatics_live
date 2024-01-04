
@extends('frontend.layouts.master')
@section('title', 'Chanage Password')
@section('content')

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Change Password</h4>
                 <form action="" class="aa-login-form" id="frmUpdatePassword">
                    
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password" required>
                    <div id="password_error" class="field_error"></div> 

                    
                    <button type="submit" class="aa-browse-btn" id="btnUpdatePassword">Update Password</button>    
                    @csrf                
                  </form>
                </div>
                <div id="thank_you_msg" class="field_error"></div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 <div class="loader-div">
    <img class="loader-img" src="{{ asset('front_assets/assets/images/Spinner-1s-200px.gif')}}" style="height: 120px;width: auto;" />
   </div>
   <style type="text/css">
		.loader-div {
			display: none;
			position: fixed;
			margin: 0px;
			padding: 0px;
			right: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			background-color: #fff;
			z-index: 30001;
			opacity: 0.8;
		}
		.loader-img {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
		}
	</style>

@endsection
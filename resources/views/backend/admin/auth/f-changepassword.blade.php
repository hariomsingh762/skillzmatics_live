<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Recoverpw | Veltrix - Admin & Dashboard Template</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico')}}">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/app.min.css')}}" rel="stylesheet">

    <link href="{{ asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    </head>
    <body>

        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary">
                                <div class="text-primary text-center p-4">
                                    <h5 class="text-white font-size-20 p-2">Reset Password</h5>
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="{{ asset('admin/assets/images/logo-sm.png')}}" height="24" alt="logo">
                                    </a>
                                </div>
                            </div>
    
                          <div class="card-body p-4">
                            
                            <div class="p-3">

                              @if(Session::get('message'))
                                <div class="alert alert-success mt-5" role="alert">
                                    Instructions has been sent to you!
                                </div>
                        
                              @else(Session::get('error'))
                                <div class="alert alert-info mt-5"  style="text-align: center;"role="alert">
                                    Reset Your Password
                                </div> 
                              @endif
                              <form method="POST" action="{{url('/forgot-password')}}/{{$email}}/{{$token}}" class=" mt-4">
                              @csrf
                                      <input type="hidden" name="email" value="{{ $email }}">
                                      <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">New Password</label>
                                        <input type="password" class="form-control" placeholder="New Password" name="password">
                                        @error('password')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Confirm New Password</label>
                                        <input type="password" class="form-control" placeholder="Confrim Password" name="password_confirmation">
                                        @error('password_confirmation')<span class="text-danger float left" role="alert">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="row  mb-0">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                          </div>
                        </div>
    
                        <div class="mt-5 text-center">
                            <p>Remember It ? <a href="{{ route('admin.login') }}" class="fw-medium text-primary"> Sign In here </a> </p>
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
      
                <!-- JAVASCRIPT -->
        <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>


        <script src="{{ asset('admin/assets/js/app.js')}}"></script>

    </body>
</html>


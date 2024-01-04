<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Login | SkillzMatics - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
        <!-- Bootstrap Css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{asset('admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

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
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to SkillzMatics Admin Plateform</p>
                                <a href="index.html" class="logo logo-admin">
                                    <img src="{{asset('admin/assets/images/logo-sm.png')}}" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

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
                     @php 
                     if(isset($_COOKIE['adminemail']) && isset($_COOKIE['adminpassword'])){
                       $adminemail=$_COOKIE['adminemail'];
                       $adminpassword=$_COOKIE['adminpassword'];
                       $is_remberme="checked='checked'";
                     }else{
                       $adminemail='';
                       $adminpassword='';
                       $is_remberme='';
                       
                     }
                     @endphp
                                <form class="mt-4" method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" name="username_or_email" id="username" placeholder="Enter username" value="{{$adminemail}}">
                                        @error('username_or_email')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Enter password" value="{{$adminpassword}}">
                                        @error('userpassword')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberme" {{$is_remberme}}>
                                                <label class="form-check-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="{{route('admin.ForgotPasswordPage')}}"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <!-- <p>Don't have an account ? <a href="pages-register.html" class="fw-medium text-primary"> Signup now </a> </p> -->
                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> SkillzMatics. Crafted with <i class="mdi mdi-heart text-danger"></i> by ...</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('admin/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/app.js')}}"></script>

</body>

</html>
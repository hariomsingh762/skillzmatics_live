


<!doctype html>
<html lang="en">
<head>
   <title>@yield('title')</title>
   
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/x-icon" href="{{ asset('front_assets/assets/images/favicon.ico') }}">
   <link rel="stylesheet" href="{{ asset('front_assets/assets/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{ asset('front_assets/assets/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{ asset('front_assets/assets/css/hover.css')}}">
   <link rel="stylesheet" href="{{ asset('front_assets/assets/css/owl.theme.default.min.css')}}">
   <link rel="stylesheet" href="{{ asset('front_assets/assets/css/owl.carousel.min.css')}}">
   <link rel="stylesheet" href="{{ asset('front_assets/assets/css/animate.css')}}">
   <link rel="stylesheet" href="{{ asset('front_assets/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('front_assets/assets/css/skillschecklists.css')}}">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,500;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  @stack('styles')
</head>
<body>
   <div class="wrapper">
   <div class="top-header">
      <div class="container">
         <div class="top-bar">
            <div class="left-top">
               <ul>
                  <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@clientilo.com"> info@skillzmatics.com</a></li>
                  <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:18885079177"> 1-888-507-9177</a></li>
               </ul>
            </div>
            <div class="right-top">
               <ul>
                  <li class="list1">
                     <a href="{{route('compnay.UserVerify')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Company Login
                     </a>
                  </li>
                  <li class="list1">
                     <a href="{{route('registration')}}"><i class="fa fa-user-o" aria-hidden="true"></i> User Login
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="header-part">
      <div class="container custum">
         <div class="header1">
            <div class="left-header">
               <div class="menu-btn">
                  <div class="img-header">
                   <a href="{{url('/')}}">  <img src="{{ asset('front_assets/assets/images/logo.png')}}"></a>
                  </div>
                  <div class="mobile-btn">
                     <button type="button" class="mob-btn"><i class="fa fa-bars" aria-hidden="true"></i>
                     </button>
                  </div>
               </div>
            </div>
            <div class="right-header">
               <div class="main-menu">
                  <ul>
                     <li><a href="{{url('/')}}">Home</a></li>
                     <li><a href="{{route('front.aboutus')}}">About Us</a></li>
                     <li><a href="#{{route('pricing')}}">Pricing</a></li>
                     <li><a href="{{route('training')}}">Training</a></li>
                     <li><a href="{{url('reach-at-us-fornt')}}">Contact Us</a></li>
                  </ul>
                  <div class="taeled-btn Started-btn text-center position-relative text-uppercase">
                     <a href="#">Get Started<i class="fa fa-arrow-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
  <!-----------------------header start---------------->
 
      <!-- page content -->
      @yield('content')
      <!-- /page content -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo-foter">
                        <a href="{{url('/')}}">   <img src="{{ asset('front_assets/assets/images/logo.png')}}"></a>
                              <div class="foter-list">
                             <!--    <h3>Links</h3> -->
                            <ul>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Training</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                                
                            </ul>
                        </div> 
                            <!-- <div class="socail-part">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                                    </a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a></li>
                                </ul/>
                            </div> -->    
                        </div>    
                    </div> 
                <!--     <div class="col-md-4 links1">
                        <div class="foter-list">
                            <h3>Links</h3>
                            <ul>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Training</a></li>
                                <li><a href="#">Contact</a></li>
                                
                            </ul>
                        </div>    
                    </div> --> 
               <!--      <div class="col-md-4">
                         <div class="foter-list">
                        <h3>Top-Tier Experiences</h3>
                        <ul>
                                <li><a href="#">High Success Rate</a></li>
                                <li><a href="#">Bespoke Solutions</a></li>
                                <li><a href="#">Your Tools</a></li>
                                <li><a href="#">Robust & Compliant</a></li>
                                
                            </ul>
                    </div> 
                </div> -->
                        
                </div>    
            </div> 
            <div class="copyrigth">
                <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>© 2023 Skillzmatics. All Rights Reserved.</p>
                    </div> 
                    <div class="col-md-6">
                        <div class="privacy-part">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                                    </a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a></li>
                        </ul>
                        </div>
                     </div>   
                    </div>    
                </div>    
            </div>   
        </footer>  
  <!--------------------Footer END------------------------------->
  





        <script type="text/javascript" src="{{ asset('front_assets/assets/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{ asset('front_assets/assets/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('front_assets/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('front_assets/assets/js/wow.min.js')}}"></script>
        <script src="{{ asset('front_assets/assets/js/custom.js')}}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            function openNav() {
                document.getElementById("myNav").style.width = "100%";
            }

            function closeNav() {
                document.getElementById("myNav").style.width = "0%";
            }
        </script>
        <script>
            var wow = new WOW({
                boxClass: 'wow',
                animateClass: 'animated',
                offset: 0,
                mobile: true,
                live: true,
                callback: function(box) {

                },
                scrollContainer: null,
                resetAnimation: true,
            });
            wow.init();
        </script>
        <script>
            AOS.init();
        </script>

     




        <script>
            $('#testi').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                dots: true,

                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items:2
                    }
                }
            })
        </script>
         


        <script>
            $(window).scroll(function() {
                if ($(window).scrollTop() > 100) {
                    $('.nav-part').addClass('fiexd');
                } else {
                    $('.nav-part').removeClass('fiexd');
                }

                if ($(window).width() < 768) {
                    $('.nav-part').css("position", "relative");
                }
            });
        </script>


        <script>
            $(document).ready(function() {
                $(".mob-btn").click(function() {
                    $(".main-menu").slideToggle();
                });
            });
        </script>



   <script>
    $(document).ready(function(){
     $(".btn12").click(function(){
      $(".nav").slideToggle();    
     });       
    });
   </script> 
  @stack('scripts')

    </body>
</html>

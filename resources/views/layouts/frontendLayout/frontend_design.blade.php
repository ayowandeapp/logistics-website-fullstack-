<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@if(!empty($meta_title))  {{ $meta_title }} @else Online Logistics Site @endif  </title>
    @if(!empty($meta_description))
     <meta name="description" content="{{ $meta_description }}">
    @endif
    @if(!empty($meta_keywords))
     <meta name="keywords" content="{{ $meta_keywords }}">
    @endif
<!--

Tooplate 2095 Level

https://www.tooplate.com/view/2095-level

-->

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('fonts/frontend_fonts/css/font-awesome.min.css') }}">                <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap.min.css') }}">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/slick/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/datepicker.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/frontend_css/tooplate-style.css') }}">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>
    <body>
        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>
            <div class="tm-top-bar" id="">
                <!-- Top Navbar -->
                <div class="container">
                    <div class="row">                        
                        <nav class="navbar navbar-expand-lg narbar-light">
                            <a class="navbar-brand" href="{{ route('index') }}">
                                <img src="{{ asset('images/frontend_images/'.$meta_logo) }}" alt="Site logo">
                                Wanamove
                            </a>
                            <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button> <?php 
                                use Illuminate\Support\Facades\Route;
                                $currentPath = Route::getFacadeRoot()->current()->uri();
                                ?>

                                 <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                                 <ul class="navbar-nav ml-auto">
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only"></span></a>
                                  </li>
                                  <?php 
                                  if($currentPath == '/'){
                                  ?>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#our-services">Our Services</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-4">About Us</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-6">Contact Us</a>
                                  </li>
                                  <?php } ?>
                                </ul>
                            </div>
                        </nav>            
                    </div>
                </div>
            </div>
            @yield('content')
            
            <footer class="tm-bg-dark-blue">
                <div class="container">
                    <div class="row">
                        <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                        Copyright &copy; <span class="tm-current-year"></span> {{ $footer->title }}</p>        
                    </div>
                </div>                
            </footer>
        </div>
        
        <!-- load JS files -->
        <script src="{{ asset('js/frontend_js/jquery-1.11.3.min.js') }}"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="{{ asset('js/frontend_js/popper.min.js') }}"></script>                    <!-- https://popper.js.org/ -->       
        <script src="{{ asset('js/frontend_js/bootstrap.min.js') }}"></script>                 <!-- https://getbootstrap.com/ -->
        <script src="{{ asset('js/frontend_js/datepicker.min.js') }}"></script>                <!-- https://github.com/qodesmith/datepicker -->
        <script src="{{ asset('js/frontend_js/jquery.singlePageNav.min.js') }}"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="{{ asset('css/frontend_css/slick/slick.min.js') }}"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
         <script>

            function setCarousel() {
                
                if ($('.tm-article-carousel').hasClass('slick-initialized')) {
                    $('.tm-article-carousel').slick('destroy');
                } 

                if($(window).width() < 438){
                    // Slick carousel
                    $('.tm-article-carousel').slick({
                        infinite: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    });
                }
                else {
                 $('.tm-article-carousel').slick({
                        infinite: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    });   
                }
            }

            function setPageNav(){
                if($(window).width() > 991) {
                    $('#tm-top-bar').singlePageNav({
                        currentClass:'active',
                        offset: 79
                    });   
                }
                else {
                    $('#tm-top-bar').singlePageNav({
                        currentClass:'active',
                        offset: 65
                    });   
                }
            }
            $(document).ready(function(){

                $(window).on("scroll", function() {
                    if($(window).scrollTop() > 100) {
                        $(".tm-top-bar").addClass("active");
                    } else {
                        //remove the background property so it comes transparent again (defined in your css)
                       $(".tm-top-bar").removeClass("active");
                    }
                });     
                
                // Slick carousel
                setCarousel();
                setPageNav();

                $(window).resize(function() {
                  setCarousel();
                  setPageNav();
                });

                // Close navbar after clicked
                //$('.nav-link').click(function(){
                //    $('#mainNav').removeClass('show');
                //});
                // Update the current year in copyright
                $('.tm-current-year').text(new Date().getFullYear());                           
            });

        </script>              

</body>
</html>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="John Doe">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Home</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/modernizr-2.8.3.min.js"></script>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target="#primary-menu">

    <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <!--Mainmenu-area-->
    <div class="mainmenu-area" data-spy="affix" data-offset-top="100">
        <div class="container">
            <!--Logo-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" >
                    <img src="images/fsmsyndicwelc.png" style="margin-top: -15%!important;width: 70%">
                </a>
            </div>
            <!--Logo/-->
            <nav class="collapse navbar-collapse" id="primary-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#home-page">Home</a></li>
                    <li><a href="#service-page">Service</a></li>
              
                    <li><a href="#team-page">Team</a></li>
                    <li><a href="#faq-page">FAQ</a></li>
                   
                    <li><a href="#contact-page">Contact</a></li>
                    @if(Auth::check() )
                    @if( Auth::user()->role == "Syndic" || Auth::user()->role == "Occupant" )
                        <li>
                        <div class=" dropdown " style="margin-top: 0%">
                            <button class="dropdown-toggle " data-toggle="dropdown" style="background: transparent;border:none" >
                                <img src="/images/amina.jpg" style="width:50px;height: 55px;border-radius: 50%;padding-top: 20% ">
                            </button>

                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/') }}">welcome</a></li>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('profile', [Auth::id()]) }}">My Profile</a></li>



                                <li class="divider"></li>
                                <li ><a href="#">Logout</a><li/>
                            </ul>
                        </div>
                        </li>
                    @elseif( Auth::user()->role == "admin" )
                        <li>
                            <div class=" dropdown " style="margin-top: 0%">
                                <button class="dropdown-toggle " data-toggle="dropdown" style="background: transparent;border:none" >
                                    <img src="/images/amina.jpg" style="width:50px;height: 55px;border-radius: 50%;padding-top: 20% ">
                                </button>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/') }}">welcome</a></li>
                                    <li><a href="{{ url('/admin/home') }}">site admin</a></li>
                                    <li><a href="{{ route('profile', [Auth::id()]) }}">My Profile</a></li>



                                    <li class="divider"></li>
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>  {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                         @endif
                        @else
                    <li><a href="{{ route('login') }}">Se Connecter</a></li>
                    <li><a href="{{ route('register') }}">S'inscrire</a></li>
                        @endif
                </ul>
            </nav>
        </div>
    </div>
    <!--Mainmenu-area/-->



    <!--Header-area-->
    <header class="header-area overlay full-height relative v-center" id="home-page">
        <div class="absolute anlge-bg"></div>
        <div class="container">
            <div class="row v-center">
                <div class="col-xs-12 col-md-7 header-text">
                    <h2>we provide the best services.</h2>
                    <p>Manage property and asset maintenance, reduce costs and improve operational efficiency with this fully integrated system of record for real estate and facilities.</p>

                </div>
                <div class="hidden-xs hidden-sm col-md-5 text-right">
                    <div class="screen-box screen-slider">
                        <div class="item" style="background: url('images/mobile2.png') no-repeat scroll center center / auto 100%;">
                            <img src="images/home4.png" alt="" style="width:220px; height: 400px;">
                     </div>
                        <div class="item"  style="background: url('images/mobile3.png') no-repeat scroll center center / auto 100%;width: 500px!important;">
                            <img src="images/home2.png" alt="" style="width:300px; height: 400px;margin-left: 17%">
                        </div>
                        <div class="item"  style="background: url('images/mobile4.png') no-repeat scroll center center / auto 60%;width: 423px!important;height: 500px!important;">
                            <img src="images/dash.jpg" alt=""  style="width:400px; height: 215px;margin-top: 21%">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header-area/-->



    <!--Feature-area-->
    <section class="gray-bg section-padding" id="service-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="images/service-icon-1.png" alt="">
                        </div>
                        <h4>EASY TO USE</h4>
                        <p>Real-Time Reporting: Identify and sort issues by type, region, or responsibility and take corrective action.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="images/service-icon-2.png" alt="">
                        </div>
                        <h4>Assess Facility Conditions</h4>
                        <p>Manage and prioritize all aspects of future repairs.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="images/service-icon-3.png" alt="">
                        </div>
                        <h4>EASY TO CUSTOMAIZE</h4>
                        <p>Lorem ipsum dolor sit amt, consectet adop adipisicing elit, sed do eiusmod tepo raraincididunt ugt labore.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Feature-area/-->

    <section class="angle-bg sky-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="caption_slide" class="carousel slide caption-slider" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>Easy to use</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="caption-photo one" data-animation="animated fadeInRight">
                                            <img src="images/Dashboard.png" alt="">
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="item row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>Easy to use</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="caption-photo one" data-animation="animated fadeInRight">
                                            <img src="images/depense.png" alt="">
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="item row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>Easy to use</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>
                                        </div>

                                    </div>
                                         <div class="col-md-6">
                                        <div class="caption-photo one" data-animation="animated fadeInRight">
                                            <img src="images/recette.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>Awesome design</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>
                                        </div>

                                    </div>
                                        <div class="col-md-6">
                                        <div class="caption-photo one" data-animation="animated fadeInRight">
                                            <img src="images/depense.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Indicators -->
                        <ol class="carousel-indicators caption-indector">
                            <li data-target="#caption_slide" data-slide-to="0" class="active">
                                <strong>Dashboard</strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="1">
                                <strong>page de depense </strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="2">
                                <strong>page de recette </strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="3">
                                <strong>reunion et messagerie </strong>consectetur adipisicing elit.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <section class="section-padding gray-bg" id="team-page" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>Special team</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptates, temporibus at, facere harum fugiat!</p>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-left: 5%">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="single-team">
                        <div class="team-photo">
                            <img src="/images/amina.jpg" alt="" style="height: 300px;width: 300px;">
                        </div>
                        <h4>Rais Amina</h4>

                        <ul class="social-menu">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li><a href="#"><i class="ti-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="single-team">
                        <div class="team-photo">
                            <img src="images/team-section-2.png" alt=""  style="height: 300px;width: 300px;">
                        </div>
                        <h4>BEl-Hassen Mazigh</h4>

                        <ul class="social-menu">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li><a href="#"><i class="ti-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <section class="testimonial-area section-padding gray-bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>Client says</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptates, temporibus at, facere harum fugiat!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <div class="testimonials">
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="images/avatar-small-1.png" alt="">
                            </div>
                            <h3>AR Rahman</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel vero dolore officiis, velit id libero illum harum hic magni, quae repellendus adipisci possimus saepe nostrum doloribus repudiandae asperiores commodi voluptate.</p>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="images/avatar-small-2.png" alt="">
                            </div>
                            <h3>AR Rahman</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel vero dolore officiis, velit id libero illum harum hic magni, quae repellendus adipisci possimus saepe nostrum doloribus repudiandae asperiores commodi voluptate.</p>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="images/avatar-small-3.png" alt="">
                            </div>
                            <h3>AR Rahman</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel vero dolore officiis, velit id libero illum harum hic magni, quae repellendus adipisci possimus saepe nostrum doloribus repudiandae asperiores commodi voluptate.</p>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="images/avatar-small-4.png" alt="">
                            </div>
                            <h3>AR Rahman</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel vero dolore officiis, velit id libero illum harum hic magni, quae repellendus adipisci possimus saepe nostrum doloribus repudiandae asperiores commodi voluptate.</p>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="images/avatar-small-5.png" alt="">
                            </div>
                            <h3>AR Rahman</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel vero dolore officiis, velit id libero illum harum hic magni, quae repellendus adipisci possimus saepe nostrum doloribus repudiandae asperiores commodi voluptate.</p>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="images/avatar-small-6.png" alt="">
                            </div>
                            <h3>AR Rahman</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel vero dolore officiis, velit id libero illum harum hic magni, quae repellendus adipisci possimus saepe nostrum doloribus repudiandae asperiores commodi voluptate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <section class="gray-bg section-padding" id="faq-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>Frequently Asked Questions</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptates, temporibus at, facere harum fugiat!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <div class="panel-group" id="accordion">
                        <div class="panel">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true">Sedeiusmod tempor inccsetetur aliquatraiy?</a>
                            </h4>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex comodo consequat. Duis aute dolor in reprehenderit.</p>
                            </div>
                        </div>
                        <div class="panel">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Tempor inccsetetur aliquatraiy?</a>
                            </h4>
                            <div id="collapse2" class="panel-collapse collapse">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex comodo consequat. Duis aute dolor in reprehenderit.</p>
                            </div>
                        </div>
                        <div class="panel">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Lorem ipsum dolor amet, consectetur adipisicing ?</a>
                            </h4>
                            <div id="collapse3" class="panel-collapse collapse">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex comodo consequat. Duis aute dolor in reprehenderit.</p>
                            </div>
                        </div>
                        <div class="panel">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Lorem ipsum dolor amet, consectetur adipisicing ?</a>
                            </h4>
                            <div id="collapse4" class="panel-collapse collapse">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodas temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrd exercitation ullamco laboris nisi ut aliquip ex comodo consequat. Duis aute dolor in reprehenderit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>










    <footer class="footer-area relative sky-bg" id="contact-page">
        <div class="absolute footer-bg"></div>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                        <div class="page-title">
                            <h2>Contact with us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptates, temporibus at, facere harum fugiat!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <address class="side-icon-boxes">
                            <div class="side-icon-box">
                                <div class="side-icon">
                                    <img src="images/location-arrow.png" alt="">
                                </div>
                                <p><strong>Address: </strong> Box 564, Disneyland <br />USA</p>
                            </div>
                            <div class="side-icon-box">
                                <div class="side-icon">
                                    <img src="images/phone-arrow.png" alt="">
                                </div>
                                <p><strong>Telephone: </strong>
                                    <a href="callto:8801812726495">+8801812726495</a> <br />
                                    <a href="callto:8801687420471">+8801687420471</a>
                                </p>
                            </div>
                            <div class="side-icon-box">
                                <div class="side-icon">
                                    <img src="images/mail-arrow.png" alt="">
                                </div>
                                <p><strong>E-mail: </strong>
                                    <a href="mailto:youremail@example.com">youremail@example.com</a> <br />
                                    <a href="mailto:youremail@example.com">example@mail.com</a>
                                </p>
                            </div>
                        </address>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <form action="process.php" id="contact-form" method="post" class="contact-form">
                            <div class="form-double">
                                <input type="text" id="form-name" name="form-name" placeholder="Your name" class="form-control" required="required">
                                <input type="email" id="form-email" name="form-email" class="form-control" placeholder="E-mail address" required="required">
                            </div>
                            <input type="text" id="form-subject" name="form-subject" class="form-control" placeholder="Message topic">
                            <textarea name="message" id="form-message" name="form-message" rows="5" class="form-control" placeholder="Your message" required="required"></textarea>
                            <button type="sibmit" class="button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 pull-right">
                        <ul class="social-menu text-right x-left">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-google"></i></a></li>
                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li><a href="#"><i class="ti-github"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id corrupti architecto consequuntur, laborum quaerat sed nemo temporibus unde, beatae vel.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <p>&copy;Copyright 2018 All right resurved.  This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>





    <!--Vendor-JS-->
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/scrollUp.min.js"></script>
    <script src="js/magnific-popup.min.js"></script>
    <script src="js/wow.min.js"></script>
    <!--Main-active-JS-->
    <script src="js/welcome.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

<!-- SITE TITLE -->
<title>Shopwise</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('Template/images/favicon.png') }}">
<!-- Animation CSS -->
<link rel="stylesheet" href="{{ asset('Template/css/animate.css') }}">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="{{ asset('Template/bootstrap/css/bootstrap.min.css') }}">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="{{ asset('Template/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('Template/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('Template/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('Template/css/linearicons.css') }}">
<link rel="stylesheet" href="{{ asset('Template/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('Template/css/simple-line-icons.css') }}">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="{{ asset('Template/owlcarousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('Template/owlcarousel/css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('Template/owlcarousel/css/owl.theme.default.min.css') }}">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{ asset('Template/css/magnific-popup.css') }}">
<!-- jquery-ui CSS -->
<link rel="stylesheet" href="{{ asset('Template/css/jquery-ui.css') }}">
<!-- Slick CSS -->
<link rel="stylesheet" href="{{ asset('Template/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('Template/css/slick-theme.css') }}">
<!-- Style CSS -->
<link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('Template/css/responsive.css') }}">

</head>

<body>

<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<div class="breadcrumb_section bg_dark3 page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<header class="header_wrap fixed-top dd_dark_skin transparent_header">
    <div class="light_skin main_menu_uppercase">
    	<div class="container">
            <nav class="navbar navbar-expand-lg"> 
                <a class="navbar-brand" href="{{ route('user.home') }}">
                    <img class="logo_light" src="{{ asset('Template/images/logo_light.png') }}" alt="logo" />
                    <img class="logo_dark" src="{{ asset('Template/images/logo_dark.png') }}" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> 
                    <span class="ion-android-menu"></span>
                </button>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->
<main class="py-4">
<!-- START MAIN CONTENT -->
<div class="main_content">
<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Create an Account</h3>
                        </div>
                        <form method="POST" action="{{ route('user.register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Username">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}">
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}">
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="register">Register</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> or</span>
                        </div>
                        <ul class="btn-login list_none text-center">
                            <li><a href="signup.html#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                            <li><a href="signup.html#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                        </ul>
                        <div class="form-note text-center">Already have an account? <a href="{{ route('user.login') }}">Log in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
</main>
<!-- START FOOTER -->
<footer class="footer_dark">
	<div class="footer_top pb_20">
        <div class="container">
            <div class="row border_bottom_tran pb-4 mb-4 mb-md-4">
                <div class="col-lg-4 col-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="{{ route('user.home') }}"><img src="{{ asset('Template/images/logo_light.png') }}" alt="logo"/></a>
                        </div>
                        <p>If you are going to use of Lorem Ipsum need to be sure there isn't hidden of text</p>
                    </div>
                    <div class="widget">
                        <ul class="social_icons rounded_social">
                            <li><a href="" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
        		</div>
                
				<div class="col-lg-8 col-12">
                	<div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="widget">
                                <h6 class="widget_title">Career</h6>
                                <ul class="widget_links">
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Contact</a></li>
                                    <li><a href="">FAQ</a></li>
                                    <li><a href="">Term Of Service</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="widget">
                                <h6 class="widget_title">My Account</h6>
                                <ul class="widget_links">
                                    <li><a href="">My Account</a></li>
                                    <li><a href="">Shopping Cart</a></li>
                                    <li><a href="">Wishlist</a></li>
                                    <li><a href="">Orders History</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle_footer mb-4 mb-md-5">
    	<div class="container">
        	<div class="row">
            	<div class="col-12">
                	<div class="contact_bottom_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style3 border-0 p-0">
                                    <div class="icon">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>Location</h5>
                                        <p>123 Street, Old Trafford,  NewYork, USA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style3 border-0 p-0">
                                    <div class="icon">
                                        <i class="ti-email"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>Email us</h5>
                                        <p><a href="../../cdn-cgi/l/email-protection.html#650c0b030a25160c11000b0408004b060a08"><span class="_cf_email_" data-cfemail="1e777078715e6d776a7b707f737b307d7173">[email&#160;protected]</span></a> </br> <a href="../../cdn-cgi/l/email-protection.html#b8daddcbcccfdddadbcaddd9ccd7ca96dbd7d5">bestwebcreator.com</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style3 border-0 p-0">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>27/4 Online Support</h5>
                                        <p>Call for styling advice on  <a href="">+123 1234 5678</a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer bg_dark4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-left">?? 2020 All Rights Reserved by Bestwebcreator</p>
                </div>
                <div class="col-md-6">
                    <ul class="footer_payment text-center text-md-right">
                        <li><a href=""><img src="{{ asset('Template/images/visa.png') }}" alt="visa"></a></li>
                        <li><a href=""><img src="{{ asset('Template/images/discover.png') }}" alt="discover"></a></li>
                        <li><a href=""><img src="{{ asset('Template/images/master_card.png') }}" alt="master_card"></a></li>
                        <li><a href=""><img src="{{ asset('Template/images/paypal.png') }}" alt="paypal"></a></li>
                        <li><a href=""><img src="{{ asset('Template/images/amarican_express.png') }}" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
@yield('up')
<script>
    function confirmation(form)
    {
        var answer;
        answer=confirm("Are you sure you want to delete this cart?");
        if(answer)
            $(form).parent().submit();
        return answer;
    }
</script> 
<!-- Latest jQuery --> 
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('Template/js/jquery-1.12.4.min.js') }}"></script> 
<!-- jquery-ui --> 
<script src="{{ asset('Template/js/jquery-ui.js') }}"></script>
<!-- popper min js -->
<script src="{{ asset('Template/js/popper.min.js') }}"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="{{ asset('Template/bootstrap/js/bootstrap.min.js') }}"></script> 
<!-- owl-carousel min js  --> 
<script src="{{ asset('Template/owlcarousel/js/owl.carousel.min.js') }}"></script> 
<!-- magnific-popup min js  --> 
<script src="{{ asset('Template/js/magnific-popup.min.js') }}"></script> 
<!-- waypoints min js  --> 
<script src="{{ asset('Template/js/waypoints.min.js') }}"></script> 
<!-- parallax js  --> 
<script src="{{ asset('Template/js/parallax.js') }}"></script> 
<!-- countdown js  --> 
<script src="{{ asset('Template/js/jquery.countdown.min.js') }}"></script> 
<!-- imagesloaded js --> 
<script src="{{ asset('Template/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- isotope min js --> 
<script src="{{ asset('Template/js/isotope.min.js') }}"></script>
<!-- jquery.dd.min js -->
<script src="{{ asset('Template/js/jquery.dd.min.js') }}"></script>
<!-- slick js -->
<script src="{{ asset('Template/js/slick.min.js') }}"></script>
<!-- elevatezoom js -->
<script src="{{ asset('Template/js/jquery.elevatezoom.js') }}"></script>
<!-- scripts js --> 
<script src="{{ asset('Template/js/scripts.js') }}"></script>

</body>
</html>





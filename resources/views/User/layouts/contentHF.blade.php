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
<!-- END LOADER -->
<!-- START HEADER -->
@if (Auth::check())
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
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item" href="{{ route('user.home') }}">Home</a></li>
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link" href="" data-toggle="dropdown">Products</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
                                    @foreach ($categories as $category )
                                    <li class="mega-menu-col col-lg-3">
                                        <ul> 
                                            <li class="dropdown-header">{{ $category->name }}</li>
                                            @if ($category->children)
                                                @foreach ($category->children as $children )
                                                    <li><a class="dropdown-item nav-link nav_item" href="{{ route('user.product.show',$children->id) }}">{{ $children->name }}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
						<li class="dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <ul> 
                                    <li><a class="dropdown-item nav-link nav_item" href="">About Us</a></li> 
                                    <li><a class="dropdown-item nav-link nav_item" href="">Contact Us</a></li> 
                                    <li><a class="dropdown-item nav-link nav_item" href="">Faq</a></li>
									<li><a class="dropdown-item nav-link nav_item" href="">Terms and Conditions</a></li>
                                </ul>
                            </div>
                        </li>
						<li class="dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown">My Account</a>
                            <div class="dropdown-menu">
                                <ul> 
                                    <li><a class="dropdown-item nav-link nav_item" href="{{ route('user.profile.edit', Auth('user')->user()->id) }}">Profile</a></li>
									<li>
                                        <a class="dropdown-item nav-link nav_item" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div><div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <?php $total = 0; ?>
                            @foreach ($carts as $key => $cart)
                            <ul class="cart_list">
                                <li>
                                    <a href="" class="item_remove"><i class="ion-close"></i></a>
                                    <a href=""><img src="{{ asset('Template/images/cart_thamb1.jpg') }}" alt="cart_thumb1">{{ $cart["name"] }}</a>
                                    <span class="cart_quantity"> {{ $cart["quantity"] }} x <span class="cart_amount"> <span class="price_symbole">$</span>{{ $cart["price"] }}</span>
                                </li>
                            </ul>
                            <?php $total += $cart["quantity"]*$cart["price"]; ?>
                            @endforeach
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>{{ number_format($total,2) }}</p>
                                <p class="cart_buttons">
                                    <a href="{{ route('user.cart.index') }}" class="btn btn-fill-line view-cart">View Cart</a>
                                    <a href="" class="btn btn-fill-out checkout">Checkout</a>
                                </p>
                            </div>
                            
                        </div>
                    </li>
                </ul>
				<ul class="navbar-nav attr-nav align-items-center">
					<li><a href="{{ route('user.favourite.index') }}" class="nav-link"><i class="ti-heart"></i></a></li>
				</ul>
            </nav>
        </div>
    </div>
</header>
@endif
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_dark3 page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                @yield('contents')
            </div>
        </div><!-- END CONTAINER-->
    </div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
    <main class="py-4">
        @yield('contenthf')
    </main>
<!-- END MAIN CONTENT -->

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
                                        <p><a href="../../cdn-cgi/l/email-protection.html#650c0b030a25160c11000b0408004b060a08"><span class="__cf_email__" data-cfemail="1e777078715e6d776a7b707f737b307d7173">[email&#160;protected]</span></a> </br> <a href="../../cdn-cgi/l/email-protection.html#b8daddcbcccfdddadbcaddd9ccd7ca96dbd7d5">bestwebcreator.com</a></p>
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
                    <p class="mb-md-0 text-center text-md-left">© 2020 All Rights Reserved by Bestwebcreator</p>
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

<!-- Latest jQuery --> 
@yield('script');
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
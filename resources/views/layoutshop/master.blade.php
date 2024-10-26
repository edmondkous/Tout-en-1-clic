
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Ecommerce</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{asset('assets/shop/images/favicon.png')}}">
	<!-- Web Font -->

	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{asset('assets/shop/jquery/jquery-ui.css') }}">
    {{-- <script src="{{ asset('assets/shop/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/shop/jquery/jquery-ui.js') }}"></script> --}}


	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/shop/css/bootstrap.css') }}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('assets/shop/css/magnific-popup.min.css') }}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/shop/css/font-awesome.css') }}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{asset('assets/shop/css/jquery.fancybox.min.css') }}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{asset('assets/shop/css/themify-icons.css') }}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('assets/shop/css/niceselect.css') }}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/shop/css/animate.css') }}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{asset('assets/shop/css/flex-slider.min.css') }}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('assets/shop/css/owl-carousel.css') }}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{asset('assets/shop/css/slicknav.min.css') }}">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{asset('assets/shop/css/reset.css') }}">
	<link rel="stylesheet" href="{{asset('assets/shop/style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/shop/css/responsive.css') }}">

    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>

    <!-- Include jQuery UI -->
    <link rel="stylesheet" href="{{ asset('node_modules/jquery-ui/themes/base/jquery-ui.css') }}">
    <script src="{{ asset('node_modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body class="js">


	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->


	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +225 0576866974</li>
								<li><i class="ti-email"></i> edmonkous123@gmail.com.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">

                                @if (Auth::check())
                                    <li><i class="ti-user"></i> <a href="#">Bonjour, {{ Auth::user()->nom }} {{ Auth::user()->prenom }}</a></li>
                                    @else
                                    <li><i class="ti-power-off"></i><a href="{{ route('login') }}">Login</a></li>
                                @endif
								{{-- <li><i class="ti-location-pin"></i> Store location</li> --}}
								{{-- <li><i class="ti-user"></i> <a href="#">Bonjour, {{ Auth::user()->nom }} {{ Auth::user()->prenom }}</a></li> --}}

								{{-- <li><i class="ti-power-off"></i><a href="{{route('login')}}">Login</a></li> --}}
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="{{asset('assets/shop/images/logo.png')}}" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						{{-- <div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Rechercher un produit" name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div> --}}
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								{{-- <select>
									<option selected="selected">Categories</option>
									<option>watch</option>
									<option>mobile</option>
									<option>kid’s item</option>
								</select> --}}
                                <form>
                                    <input type="search" name="nom_prod" placeholder="Rechercher un produit..." id="searchProd">
                                        <div id="product_list">
                                        </div>
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
						</div>

                            {{-- <script>
                                $(document).ready(function() {
                                    $( "#searchProd" ).autocomplete({

                                        source: function(request, response) {
                                            $.ajax({
                                            url: siteUrl + '/' +"autocomplete",
                                            data: {
                                                    term : request.term
                                            },
                                            dataType: "json",
                                            success: function(data){
                                            var resp = $.map(data,function(obj){
                                                    return obj.nom_prod;
                                            });

                                            response(resp);
                                            }
                                        });
                                    },
                                    minLength: 2
                                });
                                });

                            </script> --}}

					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="{{route('login')}}" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar shopping">
								<a href="{{route('cart.index')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Cart::instance('cart')->count()}}</span></a>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
													<li><a href="{{route('shops.pageShop')}}">Accueil</a></li>
													<li><a href="{{route('shops.boutique')}}">Boutique</a></li>
													<li><a href="#">Service</a></li>
													<li><a href="#">Contact </a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
    @if (Session::has('success_message'))
                    <script>
                        swal("Message","{{ Session::get('success')}}",'success',{
                            button:true,
                            button:"OK",
                            timer:5000,
                        });
                    </script>
    @endif

    @if (Session::has('error'))
                    <script>
                        swal("Message","{{ Session::get('error')}}",'La commande n\'est pas enregistrée ',{
                            button:true,
                            button:"OK",
                            timer:5000,
                        });
                    </script>
    @endif
	<!--/ End Header -->
    @yield('content')




	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="images/logo2.png" alt="#"></a>
							</div>
							<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>Abidjan, Plateau</li>
									<li>edmondkous@gmail.com</li>
									<li>+0225 0703911520</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->

	<!-- Jquery -->
    <script src="{{asset('assets/shop/js/jquery.min.js') }}"></script>
    <script src="{{asset('assets/shop/js/jquery-migrate-3.0.0.js') }}"></script>
	<script src="{{asset('assets/shop/js/jquery-ui.min.js') }}"></script>
	<!-- Popper JS -->
	<script src="{{asset('assets/shop/js/popper.min.js') }}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/shop/js/bootstrap.min.js') }}"></script>
	<!-- Color JS -->
	<script src="{{asset('assets/shop/js/colors.js') }}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('assets/shop/js/slicknav.min.js') }}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('assets/shop/js/owl-carousel.js') }}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('assets/shop/js/magnific-popup.js') }}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('assets/shop/js/waypoints.min.js') }}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('assets/shop/js/finalcountdown.min.js') }}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('assets/shop/js/nicesellect.js') }}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('assets/shop/js/flex-slider.js') }}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('assets/shop/js/scrollup.js') }}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('assets/shop/js/onepage-nav.min.js') }}"></script>
	<!-- Easing JS -->
	<script src="{{asset('assets/shop/js/easing.js') }}"></script>
	<!-- Active JS -->
	<script src="{{asset('assets/shop/js/active.js') }}"></script>
</body>
</html>

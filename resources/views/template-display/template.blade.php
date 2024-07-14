<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Display</title>

		{{-- Favicon --}}
		<link rel="icon" href="{{ asset('kaiadmin/assets/img/logo-wana.png') }}" type="image/x-icon" />

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="{{ asset('electro/css/bootstrap.min.css') }}"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="{{ asset('electro/css/slick.css') }}"/>
 		<link type="text/css" rel="stylesheet" href="{{ asset('electro/css/slick-theme.css') }}"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="{{ asset('electro/css/nouislider.min.css') }}"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="{{ asset('electro/css/font-awesome.min.cs') }}s">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="{{ asset('electro/css/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row align-items-center">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="{{ asset('kaiadmin/assets/img/logo-wana.png') }}" alt="" height="100px">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6 align-items-center">
               				<h1 class="text-light">WANA SATRIA KOMPUTER</h1>
						</div>
						<!-- /SEARCH BAR -->

					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		
		@yield('product-laptop-detail')

		<!-- Section product laptop-->
		<div class="section">
			<!-- container -->
			<div class="container">

				@yield('product-laptop')
				

			</div>
			<!-- /container -->
		</div>
		<!-- /Section product laptop -->

		<!-- NEWSLETTER -->
		{{-- @include('template-display.newslatter.newslatter') --}}
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		{{-- @include('template-display.footer.footer') --}}
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{ asset('electro/js/jquery.min.js') }}"></script>
		<script src="{{ asset('electro/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('electro/js/slick.min.js') }}"></script>
		<script src="{{ asset('electro/js/nouislider.min.js') }}"></script>
		<script src="{{ asset('electro/js/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('electro/js/main.js') }}"></script>

	</body>
</html>

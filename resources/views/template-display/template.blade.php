<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<meta name="author" content="Hamzah">
		<meta name="keywords" content="wana satria komputer, wana, laptop, laptop bekas, penyewaan, wana satria, garansi 6 bulan, enam, garansi, makassar">
		<meta name="description" content="pusat penjualan laptop bekas dengan garansi 6 bulan dan tempat penyewaan laptop terpercaya di kota makassar">

		<title>Display Laptop</title>

		{{-- bootstrap 5 --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bootstrap.min.css') }}">

		{{-- Favicon --}}
		<link rel="icon" href="{{ asset('assets/img/logo-wana.png') }}" type="image/x-icon" />

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
	<body class="bg-light">
		<!-- HEADER -->
		@include('template-display.header.header2')
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		{{-- @include('template-display.navigation.nav') --}}
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

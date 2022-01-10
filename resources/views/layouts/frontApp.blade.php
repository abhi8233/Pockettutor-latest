<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Pocket Tutor')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('assets/images/fevicon.png') }}" rel="shortcut icon">
	<meta name="description" content="Pocke Tutor">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- {{URL::asset('assets/icons/key.svg')}} -->
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/scss/bootstrap.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/scss/common.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/scss/front.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/fonts/font-awesome/all.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/fonts/md-icons/materialdesignicons.min.css')}}" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">


	<!-- scripts -->
	<script type="text/javascript" src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
	<script type="text/javascript" src="{{URL::asset('assets/js/front.js')}}"></script>



	<!-- Common script files -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Common Fonts files -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Common Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	@yield('css-hooks')
</head>

<body id="pt">
	<div class="front-main">
		<!-- start top bar -->
		@include('front.sidebar')
		@include('front.header')
		<!-- end top bar -->
		<!-- start side bar -->

		<!-- end side bar -->

		@yield('content')
		<!-- start bottom bar -->
		@include('front.footer')
		<!-- end bottom bar -->
	</div>
	@yield('js-hooks')
</body>

</html>
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
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/scss/booking.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/fonts/font-awesome/all.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/fonts/md-icons/materialdesignicons.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	{{-- <link rel="stylesheet" href="https://demos.creative-tim.com/paper-dashboard-pro/assets/css/themify-icons.css"> --}}
	<link rel="stylesheet" href="https://demos.creative-tim.com/paper-dashboard-pro/assets/css/paper-dashboard.css">
	<link rel="stylesheet" href="https://demos.creative-tim.com/paper-dashboard-pro/assets/css/demo.css">
	
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
	
	<!-- start top bar -->
	@include('booking.header')
	<!-- end top bar -->
	
	@yield('content')

	<!-- start bottom bar -->
	@include('booking.footer')
	<!-- end bottom bar -->
	
	@yield('js-hooks')
</body>

</html>
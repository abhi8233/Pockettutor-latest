<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>@yield('title', 'Pocket Tutor')</title>
		<meta charset="utf-8">
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	    <link href="{{ asset('assets/images/fevicon.png') }}" rel="shortcut icon">

	    <!-- Common script files -->
	    <script src="{{ asset('js/app.js') }}" defer></script>
		
	    <!-- Common Fonts files -->
	    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	    <!-- Common Styles -->
	    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  		@yield('css-hooks')
	</head>
	<body>
		<div id="app">
			<!-- start top bar -->
		    @include('admin.header')
		    <!-- end top bar --> 
		    <div class="wrapper">
			    <!-- start side bar -->
			    @include('admin.sidebar')
			    <!-- end side bar -->
		    
		        @yield('content')
		    </div>
		    <!-- start bottom bar -->
		    @include('admin.header')
		    <!-- end bottom bar --> 
		</div>
		@yield('js-hooks')
	</body>
</html>
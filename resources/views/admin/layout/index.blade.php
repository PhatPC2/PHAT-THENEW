<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<base href="{{asset('')}}">
	<!-- Google Fonts -->
	<link href="/https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
	
	<!-- Template Styles -->
	<link rel="stylesheet" href="{{asset('admin_assets/css/font-awesome.min.css')}}">
	
	<!-- CSS Reset -->
	<link rel="stylesheet" href="{{asset('admin_assets/css/normalize.css')}}">
	<link rel="stylesheet"  href="{{asset('admin_assets/css/bootstrap.min.css')}}">
	<!-- Milligram CSS minified -->
	<link rel="stylesheet" href="{{asset('admin_assets/css/milligram.min.css')}}">
	
	<!-- Main Styles -->
	<link rel="stylesheet" href="{{asset('admin_assets/css/styles.css')}}">
	
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
</head>

<body>
	@include('admin.layout.header')
	<div class="row">
	@include('admin.layout.menu')
	<section id="main-content" class="column column-offset-20">
	@yield('content')
	<p class="credit">HTML5 Admin Template by <a href="https://www.medialoot.com">Medialoot</a></p>
	</section>
	</div>
	
	
	
	<script src="admin_assets/js/chart.min.js"></script>
	<script src="admin_assets/js/chart-data.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

    @yield('script')
</body>
</html> 
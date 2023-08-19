<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>The News Reporter|@yield('title')</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="assets/font/font-awesome.min.css" />
@yield('css')
<link rel="stylesheet" type="text/css" href="assets/font/font.css" />
<link rel="stylesheet"  href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet"  href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />


	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<!--===============================================================================================-->
</head>
<body>
<div class="body_wrapper">
  <div class="center">
    @include('layout.header')
    @include('layout.menu')
    @yield('content')
     @include('layout.footer')
  </div>
</div>
<script type="text/javascript" src="assets/js/jquery-min.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.bxslider.js"></script> 
<script type="text/javascript" src="assets/js/selectnav.min.js"></script> 
@yield('script')
<script type="text/javascript">

selectnav('nav', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
selectnav('f_menu', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
$('.bxslider').bxSlider({
    mode: 'fade',
    captions: true
});
</script>
</body>
</html>

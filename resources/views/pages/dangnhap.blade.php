@extends('layout.index')
@section('content')


<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="loginadmin/images/img-01.png" alt="IMG">
				</div>

				<form action="dangnhap" method="post" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title">
						Login
					</span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" class ="pw" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>


					
					@if(count($errors)>0)
                               <div class="alert alert-danger">
								@foreach($errors->all() as $err)
                                   {{$err}} <br>
								@endforeach
							   </div>
							@endif


							@if(session('thongbao'))
                            <div class="alert alert-danger">
								{{session('thongbao')}}
                            </div>
 
							@endif

							@if(session('success'))
                            <div class="alert alert-success">
								{{session('success')}}
                            </div>
 
							@endif

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="{{route('user.forgetPass')}}">
							Quên mật khẩu?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	@endsection

    @section('css')
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginadmin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginadmin/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginadmin/css/main.css">

    <style>

    </style>

    @endsection

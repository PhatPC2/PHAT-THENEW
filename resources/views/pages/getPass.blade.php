@extends('layout.index')
@section('content')


<div class="limiter" style="margin-left:370px; margin-top:20px">
		<div class="container-login100">
			<div class="wrap-login100">

				<form action="" method="post" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title" style="font-size: 15px; font-weight: bold;">
						Đặt lại password
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" style="margin-top:10px; width:200px; height:30px">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="passwordAgain" placeholder="Nhập lại Password" style="margin-top:10px; width:200px; height:30px">
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
                            <div class="alert alert-success">
								{{session('thongbao')}}
                            </div>
 
							@endif

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="margin-top: 10px; width: 50px; height:30px; border-radius:3px; background-color:green; color:aliceblue">
							Submit
						</button>
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

    @endsection

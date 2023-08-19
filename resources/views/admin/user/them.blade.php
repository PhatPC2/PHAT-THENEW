<!--Forms-->
@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Users</h5><a class="anchor" name="forms"></a>

			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Thêm</h3>
						</div>
						<div class="card-block">
						
							<form action="admin/user/them" method="post">
								@csrf
								<fieldset>
									<label for="nameField">Họ tên</label>
									<input type="text" placeholder="Nhập tên người dùng" name="name">
									<label for="nameField">Email</label>
									<input type="email" placeholder="Nhập Email người dùng" name="email">
									<label for="nameField">Password</label>
									<input type="password" placeholder="Nhập mật khẩu" name="password">
									<label for="nameField">Nhập lại Password</label>
									<input type="password" placeholder="Nhập lại mật khẩu" name="passwordAgain">
									<label for="nameField">Quyền người dùng</label>
									<label class="radio-inline">
									<input type="radio" name="level" value="0" checked="">Thường                    
									</label>
									<label class="radio-inline">
									<input type="radio" name="level" value="1" checked="">Admin                         
									</label>
									
									<button class="button-primary" type="submit">Thêm</button>
									<button type="reset" class="button-primary">Làm mới</button>
                                    @csrf
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
@endsection
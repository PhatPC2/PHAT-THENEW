<!--Forms-->
@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Users</h5><a class="anchor" name="forms"></a>

			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Sửa</h3>
						</div>
						<div class="card-block">
						
							<form action="admin/user/sua/{{$user->id}}" method="post">
								@csrf
								<fieldset>
									<label for="nameField">Họ tên</label>
									<input type="text" placeholder="Nhập tên người dùng" value="{{$user->name}}" name="name">
									<label for="nameField">Email</label>
									<input type="email" placeholder="Nhập Email người dùng" value="{{$user->email}}" readonly="" name="email">
									
									<label for="nameField">Đổi mật khẩu
									<input type="checkbox" name="changepass" id="changepass">
									</label>
									<input type="password" class="password" disabled="" name="password">
									<label for="nameField">Nhập lại mật khẩu</label>
									<input type="password" class="password" disabled="" id="changepass"  name="passwordAgain">
									<label for="nameField">Quyền người dùng</label>
									<label class="radio-inline">
									<input type="radio" name="level" value="0"
									  @if($user->level == 0)
									  {{"checked"}}
									  @endif
									>Thường                    
									</label>
									<label class="radio-inline">
									<input type="radio" name="level" value="1"
									@if($user->level == 1)
									  {{"checked"}}
									  @endif
									
									
									>Admin                         
									</label>
									
									<button class="button-primary" type="submit">Sửa</button>
									<button type="reset" class="button-primary">Làm mới</button>
            
								</fieldset>
							</form>
						</div>
					</div>

				</div>
			</div>
@endsection

@section('script')
<script>
   $(document).ready(function(){
	$("#changepass").change(function(){
      if($(this).is(":checked")){
        $(".password").removeAttr('disabled');
	  }else{
        $(".password").attr('disabled','');
	  }
	});
   });
</script>



@endsection
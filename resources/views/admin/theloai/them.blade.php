<!--Forms-->
@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Thể Loại</h5><a class="anchor" name="forms"></a>

			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Thêm</h3>
						</div>
						<div class="card-block">
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
							<form action="admin/theloai/them" method="post">
								<fieldset>
									<label for="nameField">Tên Thể Loại</label>
									<input type="text" placeholder="Nhập tên thể loại" name="Ten">
							
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
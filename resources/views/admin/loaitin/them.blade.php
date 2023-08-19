<!--Forms-->
@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Loại tin</h5><a class="anchor" name="forms"></a>

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
							<form action="admin/loaitin/them" method="post">
								<fieldset>
									<label for="nameField">Tên</label>
									<input type="text" name="Ten" placeholder="Nhập tên loại tin" id="nameField">
									<label for="ageRangeField">Thể Loại</label>
									<select id="ageRangeField" name="TheLoai">
										@foreach($theloai as $tl)
										<option value="{{$tl->id}}">{{$tl->Ten}}</option>
										@endforeach
									</select>
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
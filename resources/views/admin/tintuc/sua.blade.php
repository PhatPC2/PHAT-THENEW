<!--Forms-->
@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Tin Tức</h5><a class="anchor" name="forms"></a>

			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Sửa</h3>
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
							<form action="admin/tintuc/sua/{{$tintuc->id}}" method="post" enctype="multipart/form-data">
								@csrf
								<fieldset>
									<label for="nameField">Tiêu Đề</label>
									<input type="text" name="TieuDe" value="{{$tintuc->TieuDe}}" placeholder="Nhập tiêu đề tin tức">
                                    <label for="nameField">Tóm Tắt</label>
									<textarea name="TomTat" placeholder="Tóm tắt tin tức">
										{{$tintuc->TomTat}}
									</textarea>
									<label for="nameField">Nội dung</label>
									<textarea name="NoiDung" placeholder="Nội dung tin tức">
										{{$tintuc->NoiDung}}
									</textarea>
                                    <label for="nameField">Hình Ảnh</label>
									<p>
									<img width="400px" src="images/{{$tintuc->Hinh}}" alt="">
									</p>
                                    <input type="file" name="Hinh">   
									<label for="nameField">Nổi Bật</label>
									<label class="radio-inline">
									<input type="radio" name="NoiBat" value="0" 
									
									 @if($tintuc->NoiBat==0)
									   {{"checked"}}
									 @endif
									 
									 >Không                              
									</label>
									<label class="radio-inline">
									<input type="radio" name="NoiBat" value="1"
									@if($tintuc->NoiBat==1)
									   {{"checked"}}
									 @endif
									
									>Có                                 
									</label>
									<label for="ageRangeField">Thể Loại</label>
									<select class="form-control" name="TheLoai" id="TheLoai">
										@foreach($theloai as $tl)
										<option 
										@if($tintuc->loaitin->theloai->id == $tl->id)
										{{"selected"}}
										@endif

										value="{{$tl->id}}">{{$tl->Ten}}</
										option>
										@endforeach
									</select>
									<label for="ageRangeField">Loại Tin</label>
									<select class="form-controller"  name="LoaiTin" id="LoaiTin">
										@foreach($loaitin as $lt)
										<option 
										@if($tintuc->loaitin->id == $lt->id)
										{{"selected"}}
										@endif
										
										value="{{$lt->id}}">{{$lt->Ten}}</option>
										@endforeach
									</select>
									<button class="button-primary" type="submit">Sửa</button>
									<button type="reset" class="button-primary">Làm mới</button>
                                    @csrf
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
		$("#TheLoai").change(function(){
           var idTheLoai = $(this).val();
		   $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
             $("#LoaiTin").html(data);
		   });

		});
	});
</script>

@endsection
<!--Tables-->
@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Tin Tức</h5><a class="anchor" name="tables"></a>
			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Danh sách</h3>
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
						<div class="card-block">
							<table>
								<thead>
									<tr>
										<th>ID</th>
										<th>Tiêu Đề</th>
										<th>Hình</th>
										<th>Tóm Tắt</th>
										<th>Thể Loại</th>
										<th>Loại Tin</th>
										<th>Xem</th>
										<th>Nổi Bật</th>

										<th>Xóa</th>
										<th>Sửa</th>

									</tr>
								</thead>
								<tbody>
									@foreach($tintuc as $tt)
									<tr>
										<td>{{$tt->id}}</td>
										<td>{{$tt->TieuDe}}</td>
										<td><img  src="images/{{$tt->Hinh}}" alt=""></td>
										<td>{{$tt->TomTat}}</td>
										<td>{{$tt->loaitin->theloai->Ten}}</td>
										<td>{{$tt->loaitin->Ten}}</td>
										<td>{{$tt->SoLuotXem}}</td>
										<td>{{$tt->NoiBat}}</td>
										<td><a href="admin/tintuc/xoa/{{$tt->id}}">Delete</a></td>
							             <td><a href="admin/tintuc/sua/{{$tt->id}}">Edit</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
            @endsection
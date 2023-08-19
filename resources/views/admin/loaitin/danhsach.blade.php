<!--Tables-->
@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Loại tin</h5><a class="anchor" name="tables"></a>
			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Danh sách</h3>
						</div>
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
										<th>Tên</th>
										<th>Thể Loại</th>
										<th>Xóa</th>
										<th>Sửa</th>

									</tr>
								</thead>
								<tbody>
									@foreach($loaitin as $lt)
									<tr>
										<td>{{$lt->id}}</td>
										<td>{{$lt->Ten}}</td>
										<td>{{$lt->theloai->Ten}}</td>
										<td><a href="admin/loaitin/xoa/{{$lt->id}}">Delete</a></td>
							             <td><a href="admin/loaitin/sua/{{$lt->id}}">Edit</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
            @endsection
<!--Tables-->
@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Người dùng</h5><a class="anchor" name="tables"></a>
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
							<th>Name</th>
							<th>Email</th>
							<th>Level</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user as $u)
						<tr>
							<td>{{$u->id}}</td>
							<td>{{$u->name}}</td>
							<td>{{$u->email}}</td>
							<td>
                            @if($u->level == 1)
                               {{"Admin"}}
							   @else
							   {{"Thường"}}
							   @endif
							</td>
							<td><a href="admin/user/xoa/{{$u->id}}">Delete</a></td>
							<td><a href="admin/user/sua/{{$u->id}}">Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
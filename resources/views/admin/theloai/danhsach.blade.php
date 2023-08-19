@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Tables</h5><a class="anchor" name="tables"></a>
<div class="row grid-responsive">
	<div class="column ">
		<div class="card">
			<div class="card-title">
				<h3>DANH SÁCH THỂ LOẠI</h3>
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
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody>
						@foreach($theloai as $tl)
						<tr>
							<td>{{$tl->id}}</td>
							<td>{{$tl->Ten}}</td>
							<td><a href="{{route('xoatl',['id'=>$tl->id])}}">Delete</a></td>
							<td><a href="admin/theloai/sua/{{$tl->id}}">Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
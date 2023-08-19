@extends('admin.layout.index')
@section('content')
<h5 class="mt-2">Thể Loại</h5><a class="anchor" name="forms"></a>

			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Sửa</h3>
						</div>
						<div class="card-block">
							<form action="admin/theloai/sua/{{$theloai->id}}" method="post">
								<fieldset>
									<label for="nameField">Tên Thể Loại</label>
									<input type="text" placeholder="Nhập tên thể loại" name="Ten" value="{{$theloai->Ten}}"/>
							
									<button class="button-primary" type="submit">Sửa</button>
									<button class="button-primary" type="submit">Reset</button>
                                    @csrf
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
@endsection
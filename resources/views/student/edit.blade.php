
@include('layouts.header')
<div class="wrap">
	<a class="btn btn-primary btn-sm" href="{{ route('student.index') }}">Back</a>
	<br>
	<br>
	<div class="card shadow">
		<div class="card-body">
			<h2>Edit Student Data</h2>
			@if (Session::has("success"))
				<p class="alert alert-success">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button></p>
			@endif
			<form action="{{ route("student.update",$edit_data -> id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="">Name</label>
					<input name="name" class="form-control" value="{{ $edit_data -> name }}" type="text">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input name="email" class="form-control" value="{{ $edit_data -> email }}" type="text">
				</div>
				<div class="form-group">
					<label for="">Cell</label>
					<input name="cell" class="form-control" value="{{ $edit_data -> cell }}" type="text">
				</div>
				<div class="form-group">
					<label for="">Username</label>
					<input name="uname" class="form-control" value="{{ $edit_data -> uname }}" type="text">
				</div>
				<div class="form-group">
					<label for="">Photo</label>
					<input name="photo" type="file"><br>
					<img style="width:300px;height:300px" src="{{ url('') }}/media/students/{{ $edit_data -> photo }}" alt="">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>

@include('layouts.footer')
@include('layouts.header')
	<div class="wrap">
		<a class="btn btn-primary btn-sm" href="{{ route("teacher.index") }}">Back</a>
		<br>
		<br>
		<div class="card">
			<div class="card-body shadow">
				<h2>Add New Teacher</h2>
				@if (Session::has("success"))
					<p class="alert alert-success">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				@if ($errors -> any())
				<p class="alert alert-success">{{ $errors -> first() }} <button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				<form action="{{ route("teacher.store") }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" type="file">
					</div>
					<div class="form-group">
						<label for="">Subject</label>
						<input name="subject" class="form-control" type="text">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
@include('layouts.footer')
@include('layouts.header')
	<div class="wrap">
		<a class="btn btn-primary btn-sm" href="{{ route("guardian.index") }}">Back</a><br><br>
		<div class="card">
			<div class="card-body shadow">
				<h2>Sign Up</h2>
				@if (Session::has("success"))
					<p class="alert alert-success">{{ Session::get("success") }}<button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				<form action="{{ route("guardian.store") }}" method="POST" enctype="multipart/form-data">
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
						<label for="">Location</label><br>
						<select name="location" style="width: 100%;height:35px">
							<option value=""> --Select-- </option>
							<option value="Uttara">Uttara</option>
							<option value="Badda">Badda</option>
							<option value="Gulshan">Gulshan</option>
							<option value="Dhanmondi">Dhanmondi</option>
							<option value="Mirpur">Mirpur</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" type="file">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
@include('layouts.footer')
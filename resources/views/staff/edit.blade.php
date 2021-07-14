@include('layouts.header')
	<div class="wrap">
		<a class="btn btn-primary btn-sm" href="{{ route("staff.index") }}">Back</a>
		<br>
		<br>
		<div class="card">
			<div class="card-body shadow">
				<h2>{{ $edit_data -> name }} Edit Your Data</h2>
				@if (Session::has("success"))
					<p class="alert alert-success">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				<form action="{{ route("staff.update",$edit_data -> id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{ $edit_data -> name }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" value="{{ $edit_data -> email }}" class="form-control" type="text">
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
						<input class="btn btn-primary" type="submit" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
@include('layouts.footer')
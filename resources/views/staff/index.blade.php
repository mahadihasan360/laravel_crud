@include('layouts.header')
	<div class="wrap-table">
		<a class="btn btn-primary btn-sm" href="{{ route("staff.create") }}">Add Staff</a>
		<br>
		<br>
		<div class="card">
			<div class="card-body shadow">
				<h2>All Staff</h2>
				@if (Session::has("success"))
					<p class="alert alert-danger">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
							<th>photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach ($all_staff as $data)
						<tr>
							<td>{{ $loop -> index + 1 }}</td>
							<td>{{ $data -> name }}</td>
							<td>{{ $data -> email }}</td>
							<td>{{ $data -> cell }}</td>
							<td>{{ $data -> uname }}</td>
							<td><img src="{{ url("") }}/media/staff/{{ $data -> photo }}" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="{{ route("staff.show",$data ->id) }}">View</a>
								<a class="btn btn-sm btn-warning" href="{{ route("staff.edit",$data -> id) }}">Edit</a>
								<a class="btn btn-sm btn-danger" href="{{ route("staff.destroy",$data -> id) }}">Delete</a>
							</td>
						</tr>
						@endforeach
						

					</tbody>
				</table>
				<a class="btn btn-primary btn-sm" href="{{ route("student.index") }}">Back</a>
			</div>
		</div>
	</div>
@include('layouts.footer')
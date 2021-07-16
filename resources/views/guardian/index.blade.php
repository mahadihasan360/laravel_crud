@include('layouts.header')
	<div class="wrap-table">
		<a class="btn btn-primary btn-sm" href="{{ route("guardian.create") }}">Add Guardian</a><br><br>
		<div class="card">
			<div class="card-body shadow">
				<h2>All Guardian</h2>
				@if (Session::has("success"))
					<p class="alert alert-danger">{{ Session::get("success") }}<button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
							<th>Location</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach ($guardian as $all_guardian)
						<tr>
							<td>{{ $loop -> index + 1 }}</td>
							<td>{{ $all_guardian -> name }}</td>
							<td>{{ $all_guardian -> email }}</td>
							<td>{{ $all_guardian -> cell }}</td>
							<td>{{ $all_guardian -> uname }}</td>
							<td>{{ $all_guardian -> location }}</td>
							<td><img src="{{ url("") }}/media/guardians/{{ $all_guardian -> photo }}" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="{{ route("guardian.destroy", $all_guardian -> id) }}">Delete</a>
							</td>
						</tr>
						@endforeach
						

					</tbody>
				</table>
				<a class="btn btn-primary btn-sm" href="{{ route("student.index") }}">Back</a><br><br>
			</div>
		</div>
	</div>
@include('layouts.footer')
  @include('layouts.header')

	<div class="wrap-table">
		<a class="btn btn-primary btn-sm" href="{{ route('student.create') }}">Add New Student</a>
		<a class="btn btn-primary btn-sm" href="{{ route('teacher.create') }}">Add New Teacher</a>
		<a class="btn btn-primary btn-sm" href="{{ route('teacher.index') }}">View All Teachers</a>
		<br>
		<br>
		<div class="card">
			<div class="card-body shadow">
				<h2>All Students</h2>
				@if (Session::has("success"))
					<p class="alert alert-success">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($all_data as $data)
						<tr>
							<td>{{ $loop -> index + 1 }}</td>
							<td>{{ $data -> name }}</td>
							<td>{{ $data -> email }}</td>
							<td>{{ $data -> cell }}</td>
							<td><img src="{{ url("") }}/media/students/{{ $data -> photo }}" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="{{ route('student.show',$data -> id) }}">View</a>
								<a class="btn btn-sm btn-warning" href="{{ route('student.edit',$data -> id) }}">Edit</a>
								<a class="btn btn-sm btn-danger" href="{{ route('student.destroy',$data -> id) }}">Delete</a>
							</td>
						</tr>
						@endforeach
						

					</tbody>
				</table>
			</div>
		</div>
	</div>

	@include('layouts.footer')
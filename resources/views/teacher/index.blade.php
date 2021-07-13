@include('layouts.header')
	<div class="wrap-table">
		<a class="btn btn-primary btn-sm" href="{{ route("teacher.create") }}">Add New Teacher</a>
		<br>
		<br>
		<div class="card">
			<div class="card-body shadow">
				<h2>All Teachers</h2>
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
							<th>Subject</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($all_teacher as $teacher)
						<tr>
							<td>{{ $loop -> index + 1 }}</td>
							<td>{{ $teacher -> name }}</td>
							<td>{{ $teacher -> email }}</td>
							<td>{{ $teacher -> cell }}</td>
							<td><img src="{{ url("") }}/media/teachers/{{ $teacher -> photo }}" alt=""></td>
							<td>{{ $teacher -> subject }}</td>
							<td>
								<a class="btn btn-sm btn-info" href="{{ route("teacher.show",$teacher -> id) }}">View</a>
								<a class="btn btn-sm btn-warning" href="{{ route("teacher.edit", $teacher -> id) }}">Edit</a>
								<a class="btn btn-sm btn-danger" href="{{ route("teacher.destroy", $teacher -> id) }}">Delete</a>
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
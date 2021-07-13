
@include('layouts.header')

<div class="container">
	<div class="row">
		<div class="col-lg-7 mx-auto mt-5">
			<div class="card">
				<img style="max-height: 200px;max-width:200px;display:block;margin:30px auto;border-radius:50%" src="{{ url("") }}/media/students/{{ $student_data -> photo }}" alt="">
				<h2 class="text-center">{{ $student_data -> name }}</h2>
				<p class="text-center">{{ $student_data -> cell }}</p>
				<div class="card-body">
					<table class="table">
						<tr>
							<td>Name</td>
							<td>{{ $student_data -> name }}</td>
						</tr>

						<tr>
							<td>Email</td>
							<td>{{ $student_data -> email }}</td>
						</tr>

						<tr>
							<td>Cell</td>
							<td>{{ $student_data -> cell }}</td>
						</tr>

						<tr>
							<td>Username</td>
							<td>{{ $student_data -> uname }}</td>
						</tr>
					</table>
					<a class="btn btn-primary btn-sm" href="{{ route('student.index') }}">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')
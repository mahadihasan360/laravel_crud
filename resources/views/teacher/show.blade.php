
@include('layouts.header')

<div class="container">
	<div class="row">
		<div class="col-lg-7 mx-auto mt-5">
			<div class="card">
				<img style="max-height: 300px;max-width:300px;display:block;margin:30px auto;border-radius:50%" src="{{ url("") }}/media/teachers/{{ $single_teacher -> photo }}" alt="">
				<h2 class="text-center"></h2>
				<p class="text-center"></p>
				<div class="card-body">
					<table class="table">
						<tr>
							<td>Name</td>
							<td>{{ $single_teacher -> name }}</td>
						</tr>

						<tr>
							<td>Email</td>
							<td>{{ $single_teacher -> email }}</td>
						</tr>

						<tr>
							<td>Cell</td>
							<td>{{ $single_teacher -> cell }}</td>
						</tr>

						<tr>
							<td>Username</td>
							<td>{{ $single_teacher -> uname }}</td>
						</tr>

						<tr>
							<td>Subject</td>
							<td>{{ $single_teacher -> subject }}</td>
						</tr>
					</table>
					<a class="btn btn-primary btn-sm" href="{{ route('teacher.index') }}">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')
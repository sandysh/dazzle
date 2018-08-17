@extends('layouts.app')
<style type="text/css">
	.tbody,tr,td{
		border: 1px solid;
	}
</style>
@section('content')
<a href="{{route('student.create')}}" class="btn btn-info">Add New Student</a>
<div class="container">
	<div class="row">
		<table>
			<thead>
				<th>Name</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($students as $student)
					<tr>
						<td>{{$student->name}}</td>
						<td>{{$student->email}}</td>
						<td>{{$student->contact}}</td>
						<td>
							<a href="{{route('student.show',$student->id)}}" class="btn btn-success">view</a>
							<a href="{{route('student.edit',$student->id)}}" class="btn btn-info">Edit</a>
							<form method="POST" action="{{route('student.destroy',$student->id)}}">
								@csrf
								@method('DELETE')
								<input type="submit" name="delete" value="delete" class="btn btn-danger">
							</form>
							
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{{ $students->links() }}
</div>


@endsection
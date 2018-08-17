@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<label>Name:</label> {{$student->name}} 
			<label>email:</label> {{$student->email}}
			<label>contact:</label> {{$student->contact}}
		</div>
	</div>
@endsection
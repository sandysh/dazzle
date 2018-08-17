@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	<form method="POST" role="form" action="{{route('post.store')}}" class="col-md-5">
		@csrf
	  <div class="form-group">
	    <label for="exampleInputEmail1">Title</label>
	    <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Title">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Body</label>
	  <textarea name="body" class="form-control" rows="3"></textarea>
	</div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	</div>
</div>


@endsection
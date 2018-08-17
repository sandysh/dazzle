@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	<form method="POST" role="form" action="{{route('post.update',$post->id)}}" class="col-md-5">
		@csrf
	  <div class="form-group">
	    <label for="exampleInputEmail1">Title</label>
	    <input value="{{$post->title}}" name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Title">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Body</label>
	  <textarea name="body" class="form-control" rows="3">{{$post->body}}</textarea>
	</div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	</div>
</div>


@endsection
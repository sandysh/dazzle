@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <a type="button" href="{{route('post.create')}}" class="btn btn-default">Add New Post</a>
          <div></div>
          <table class="table table-bordered">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>User</th>
                  <th width="20%">Actions</th>
              </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->user->name}}</td>
                <td>
                  <a type="button" class="btn btn-info" href="{{route('post.edit',$post->id)}}">Edit</a>
                    <a type="button" class="btn btn-danger" href="{{route('post.delete',$post->id)}}">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>        
      </div>
    </div>
  </div>


@endsection
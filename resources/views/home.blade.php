@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('success-status'))
                <div class="alert alert-success">
                        {{session('success-status')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('post.store')}}">
                        @csrf
                        <textarea name="body" class="form-control"> </textarea>   
                        <input type="submit" name="submit" value="submit">
                    </form>

                </div>
            </div>
            <br>
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-body">
                        {{$post->body}}
                    </div>
                        <span class="badge">
                         {{count($post->likes)}} Likes
                         </span>
                     <div class="card-header">
                        @if(count($post->likes) === 0)
                             <a type="button" href="{{route('post.like',$post->id)}}"> 
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                              </a>
                        @endif
                         <a href="{{route('post.dislike',$post->id)}}" type="button">
                             <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                         </a>
                     </div>
                     <div class="card-header">
                        <form method = "POST" action="{{route('comment.store')}}">
                            @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                         <label>Place your comments here</label>
                         <textarea name="body" cols="70"> </textarea>
                         <input type="submit" name="submit" value="Add your comment">
                        </form>
                        <ul style="padding:20px">
                            @foreach($post->comments as $key => $comment)
                                <li>{{$comment->body}} <span class="pull-right">{{$comment->user->name}}</span>
                                </li>
                            @endforeach
                        </ul>

                     </div>
                </div>
            <br>
            @endforeach

        </div>
    </div>
</div>
@endsection

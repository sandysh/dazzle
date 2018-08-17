<?php

namespace App\Http\Controllers;
use App\Post;
use App\Like;
// use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::with('user')->latest()->get();
    	return view('post.index',compact('posts'));
    }

    public function create()
    {
    	return view('post.create');
    }

    public function store(Request $request)
    {
    	$data = [
    		'body' 		=> $request->body,
    		'user_id' 	=> auth()->user()->id,
    	];
    	Post::create($data);

    	return redirect()->route('home');

    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('post.edit',compact('post'));
    }

    public function update($id, Request $request)
    {
        $data = [
            'title' => $request->title,
            'body'  => $request->body,
        ];

        $post = Post::where('id',$id)->update($data);
        return redirect()->route('posts.index');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if($post)
        {
            $post->delete();
            return redirect()->route('posts.index');
        }
    }

    public function likePost($id,Request $request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'post_id' => $id
        ];

        $status = Like::where('user_id',auth()->user()->id)->where('post_id',$id)->exists();
        if(!$status)
        {
            $like = Like::create($data);
            return redirect()->route('home')->with('success-status','You liked this post');
        } else {
            return redirect()->route('home')->with('success-status','You have already liked this post');
        }

        
    }

    public function dislikePost($id)
    {
        $like = Like::where('user_id',auth()->user()->id)->where('post_id',$id)->delete();
        return redirect()->route('home')->with('success-status','You disliked this post');
    }


}

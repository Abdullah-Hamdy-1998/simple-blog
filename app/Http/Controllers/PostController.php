<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{

    public function index()
    { 
        if (Gate::allows('viewAny', new Post())) {
            $posts = Post::all();
        } else {
            $posts = auth()->user()->posts;
        }

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        auth()->user()->posts()->create(['title' => $request->title, 'body' => $request->body]);
        
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        if (Gate::allows('update', $post)) {
            return view('posts.edit', ['post' => $post]);
        }

        return abort(Response::HTTP_UNAUTHORIZED);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        if (Gate::allows('update', $post)) {

            $post->update(['title' => $request->title, 'body' => $request->body]);
            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        }

        return abort(Response::HTTP_UNAUTHORIZED);
    }

    public function destroy(Post $post)
    {
        if (Gate::allows('delete', $post)) {

            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        }

        return abort(Response::HTTP_UNAUTHORIZED);
    }
}

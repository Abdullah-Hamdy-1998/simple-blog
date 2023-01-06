<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class APIPostController
{

    public function index()
    {

        if (Gate::allows('viewAny', new Post())) {
            $posts = Post::all();
        } else {
            $posts = auth()->user()->posts;
        }

        return $posts;
    }
}

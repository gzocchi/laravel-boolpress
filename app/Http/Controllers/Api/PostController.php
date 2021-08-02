<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(6);
        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->with(['category', 'tags'])
            ->first();

        return response()->json($post);
    }
}

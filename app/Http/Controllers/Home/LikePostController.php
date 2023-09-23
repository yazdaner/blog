<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->toggle(auth()->user()->id);

        return response(['ok',200]);
    }

    public function bookMarkStore(Post $post)
    {
        $post->bookmarks()->toggle(auth()->user()->id);

        return response(['bookmarks_ok',200]);
    }
}

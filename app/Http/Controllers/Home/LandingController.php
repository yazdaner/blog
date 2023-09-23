<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class LandingController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(20);
        return view('home.index',compact('posts'));
    }

    public function contactUsShow()
    {
        return view('home.contact_us');
    }

    public function postShow(Post $post)
    {
        $comments_count = $post->getCommentsCount();
        $post->load(['user','category']);
        $comments = Comment::where('post_id',$post->id)->where('comment_id',null)->where('is_approved',true)->latest()->paginate(20);
        return view('home.post',compact('post','comments_count','comments'));
    }

    public function CategoryPostShow(Category $category)
    {
        $posts= $category->posts()->with('user')->latest()->paginate(20);
        return view('home.category',compact('posts','category'));
    }

    public function search(Request $request)
    {
        $posts = Post::where('title','LIKE',"%{$request->search}%")->latest()->paginate(20);
        return view('home.search',compact('posts'));

    }
}

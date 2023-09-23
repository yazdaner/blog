<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $posts_count = Post::count();
        $comments_count = Comment::count();
        $categories_count = Comment::count();
        return view('admin.index',compact('users_count','posts_count','comments_count','categories_count'));
    }
}

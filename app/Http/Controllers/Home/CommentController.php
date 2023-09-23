<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
            'comment_id' => 'nullable|exists:comments,id',
        ]);
        Comment::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id,
        ]);
        $request->session()->flash('success','نظر شما ارسال شد !');
        return redirect()->back();
    }
}

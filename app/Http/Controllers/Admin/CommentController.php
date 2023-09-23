<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hamcrest\Type\IsBoolean;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->status)){
            $comments = Comment::where('is_approved', !! $request->status)->with(['user','post'])->withCount('replies')->latest()->paginate(20);
        }else{
            $comments = Comment::with(['user','post'])->withCount('replies')->latest()->paginate(20);
        }
        return view('admin.comments.index',compact('comments'));
    }

    public function destroy(Request $request,Comment $comment)
    {
        $comment->delete();
        $request->session()->flash('success','کامنت مورد نظر حذف شد');
        return redirect()->route('admin.comments.index');
    }

    public function update(Comment $comment)
    {
        $approved =!($comment->getRawOriginal('is_approved'));
        $comment->update([
            'is_approved' => $approved
        ]);
        return redirect()->route('admin.comments.index');
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function postsLikedShow()
    {
        $likes = auth()->user()->likes()->latest()->paginate(20);
        return view('home.dashboard.posts_liked',compact('likes'));
    }

    public function profileShow()
    {
        return view('dashboard');
    }

    public function commentsShow()
    {
        $comments = Comment::where('user_id',auth()->user()->id)->where('is_approved',true)->latest()->paginate(20);
        return view('home.dashboard.comments',compact('comments'));
    }

    public function bookmarksShow()
    {
        $bookmarks = auth()->user()->bookmarks()->latest()->paginate(20);
        return view('home.dashboard.bookmarks',compact('bookmarks'));
    }


    public function profileUpdate(Request $request ,User $user)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'profile' => ['nullable','image','max:2024'],
            'user_name' => ['nullable',Rule::unique('users','user_name')->ignore($user->id)],
        ]);

        $data = [
            'name' => $request->name,
            'user_name' => $request->user_name,
        ];

        if($request->hasFile('profile')){

            if(isset($user->profile)){
                $profile = public_path(env('USER_IMAGES_PATH') . $user->profile);
                if (File::exists($profile)) {
                    File::delete($profile);
                }
            }


            $file = $request->file('profile');
            $ext = $file->getClientOriginalExtension();
            $file_name = $user->id . '-' . time() . '.' . $ext;
            $file->storeAs('images/users',$file_name,'public_files');
            $data['profile'] = $file_name;

        }

        $user->update($data);

        $request->session()->flash('success','اطلاعات کاربری شما ویرایش شد !');
        return redirect()->route('dashboard');
    }
}

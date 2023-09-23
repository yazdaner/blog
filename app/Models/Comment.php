<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $guarded = [];
    protected $with = ['approvedReplies'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class,'comment_id');
    }
    public function approvedReplies()
    {
        return $this->hasMany(Comment::class,'comment_id')->where('is_approved',true);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class,'comment_id');
    }

    public function getIsApprovedAttribute($is_approved){
        return $is_approved ? 'تایید شده' : 'تایید نشده';
    }

    

}

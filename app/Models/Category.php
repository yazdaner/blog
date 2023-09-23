<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use HasFactory ,Sluggable;
    protected $table = "categories";
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function getParentName()
    {
        return $this->parent_id == 0 ? 'ندارد' : $this->parent->name;
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'category_id');
    }
}

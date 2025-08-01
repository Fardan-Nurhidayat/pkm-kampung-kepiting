<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogsLikes extends Model
{
    protected $fillable = ['blog_id', 'user_id'];

    public function blog()
    {
        return $this->belongsTo(Blogs::class, 'blog_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

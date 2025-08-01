<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'category',
        'slug',
        'excerpt', 
        'content',
        'image',
        'author_id',
        'published_at',
    ];
    protected $appends = ['likes_count', 'excerpt_text'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function likes()
    {
        return $this->hasMany(BlogsLikes::class, 'blog_id');
    }

    public function isLikedByUser($userId = null)
    {
        if (!$userId) {
            $userId = auth()->id();
        }

        return $this->likes()->where('user_id', $userId)->exists();
    }


    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
}

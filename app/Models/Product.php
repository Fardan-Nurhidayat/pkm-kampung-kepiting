<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'images', // ganti dari image ke images
        'excerpt',
        'price',
        'stock',
    ];

    protected $casts = [
        'images' => 'array', // supaya otomatis jadi array
    ];


    /**
     * Boot method untuk generate slug otomatis saat membuat atau update product.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function product_likes()
    {
        return $this->hasMany(ProductLike::class);
    }

    public function product_ratings()
    {
        return $this->hasMany(ProductRating::class);
    }

    public function averageProductRating()
    {
        return $this->product_ratings()->avg('rating');
    }

    public function ProductisLikedBy($userId)
    {
        return $this->product_likes()->where('user_id', $userId)->exists();
    }

    public function isLikedByUser($userId = null)
    {
        if (!$userId) {
            $userId = auth()->id();
        }

        return $this->product_likes()->where('user_id', $userId)->exists();
    }


    public function getLikesCountAttribute()
    {
        return $this->product_likes()->count();
    }

}

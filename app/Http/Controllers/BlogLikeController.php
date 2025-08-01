<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\BlogsLikes;
use Illuminate\Http\Request;

class BlogLikeController extends Controller
{
    public function toggle(Request $request, $blogId)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }

        $blog = Blogs::findOrFail($blogId);
        $userId = auth()->id();

        $existingLike = BlogsLikes::where('blog_id', $blogId)
            ->where('user_id', $userId)
            ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $liked = false;
        } else {
            // Like
            BlogsLikes::create([
                'blog_id' => $blogId,
                'user_id' => $userId
            ]);
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'likes_count' => $blog->fresh()->likes_count
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Cache::remember('blogs', 600, function () {
            return Blogs::with('author')->latest()->get();
        });

        return view('blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $blog = Cache::remember("blog_{$slug}", 600, function () use ($slug) {
            return Blogs::where('slug', $slug)->with('author')->firstOrFail();
        });

        $relatedBlogs = Cache::remember("related_blogs_{$blog->id}", 600, function () use ($blog) {
            return Blogs::where('category', $blog->category)
                ->where('id', '!=', $blog->id)
                ->with('author')
                ->latest()
                ->take(3)
                ->get();
        });

        return view('blogs.show', [
            'blog' => $blog,
            'relatedBlogs' => $relatedBlogs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

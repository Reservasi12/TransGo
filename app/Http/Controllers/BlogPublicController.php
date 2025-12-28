<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogPublicController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index()
    {
        $blogs = Blog::where('is_published', true)
                    ->orderBy('published_at', 'desc')
                    ->paginate(10);

        return view('blog.index', compact('blogs'));
    }

    /**
     * Display the specified blog.
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
                   ->where('is_published', true)
                   ->firstOrFail();

        // Increment view count
        $blog->increment('views_count');

        return view('blog.show', compact('blog'));
    }
}

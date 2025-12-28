<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index()
    {
        $blogs = Blog::with('author')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image_url' => 'nullable|url',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|array',
            'is_published' => 'boolean',
        ]);

        // Handle featured image upload
        $imagePath = $request->featured_image_url;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blogs', 'public');
        }

        // Create slug from title
        $slug = Str::slug($request->title) . '-' . time();

        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'featured_image' => $imagePath,
            'author_id' => Auth::id(),
            'category' => $request->category,
            'tags' => $request->tags,
            'is_published' => $request->is_published ?? false,
            'published_at' => $request->is_published ? now() : null,
        ]);

        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog created successfully!');
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image_url' => 'nullable|url',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|array',
            'is_published' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old local image if exists
            if ($blog->featured_image && !str_starts_with($blog->featured_image, 'http')) {
                \Storage::disk('public')->delete($blog->featured_image);
            }

            $imagePath = $request->file('featured_image')->store('blogs', 'public');
            $blog->featured_image = $imagePath;
        } elseif ($request->filled('featured_image_url')) {
            // Use external URL if provided and no file uploaded
            // Delete old local image if exists
            if ($blog->featured_image && !str_starts_with($blog->featured_image, 'http')) {
                \Storage::disk('public')->delete($blog->featured_image);
            }
            $blog->featured_image = $request->featured_image_url;
        }

        // Update slug if title changed
        if ($request->title !== $blog->title) {
            $blog->slug = Str::slug($request->title) . '-' . time();
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'author_id' => Auth::id(),
            'category' => $request->category,
            'tags' => $request->tags,
            'is_published' => $request->is_published ?? false,
            'published_at' => $request->is_published ? now() : null,
        ]);

        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete image if local
        if ($blog->featured_image && !str_starts_with($blog->featured_image, 'http')) {
            \Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog deleted successfully!');
    }
}

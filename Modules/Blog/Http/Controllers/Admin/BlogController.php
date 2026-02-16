<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Blog\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index()
    {

        $blogs = Blog::latest()->paginate(10);

        return view('blog::admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        return view('blog::admin.blogs.create');
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'categories'    => 'required|array',
            'description' => 'nullable|string',
            'content'     => 'nullable|string',
            'cover_image' => 'nullable|string',
            'tags'        => 'nullable|string',
            'status'      => 'required|in:draft,published',
            'author'      => 'nullable',
            'author_image'      => 'nullable',
            'author_about'      => 'nullable',
            'reading_time' => 'required|integer',
        ]);

        $data['user_id'] = auth()->user()->id;

        $blog = Blog::create($data);
        $blog->categories()->sync($data['categories']);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        return view('blog::admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        return view('blog::admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, Blog $blog)
    {

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'categories'    => 'required|array',
            'description' => 'nullable|string',
            'content'     => 'nullable|string',
            'cover_image' => 'nullable|string',
            'tags'        => 'nullable|string',
            'status'      => 'required|in:draft,published',
            'author'      => 'nullable',
            'author_image'      => 'nullable',
            'author_about'      => 'nullable',
            'reading_time' => 'required|integer',
        ]);
        $blog->categories()->sync($data['categories']);
        $data['user_id'] = auth()->user()->id;

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}

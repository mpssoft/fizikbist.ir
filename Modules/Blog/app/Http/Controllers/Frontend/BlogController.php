<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->take(6)->get();
        return view('blog::frontend.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {

        return view('blog::frontend.show', compact('blog'));
    }

}

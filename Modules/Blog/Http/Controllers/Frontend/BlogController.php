<?php

namespace Modules\Blog\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $sort = $request->sort ?? 'newest'; // default sort
        $this->seo()
            ->setTitle("مقالات")
            ->setDescription(" مجموعه‌ای از بهترین مقالات علمی، تکنولوژی، آموزش و سلامت ")
        ;
        $query = Blog::query();
        if($request->has('category')){
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('name',$request->category);
            });
            $blogs = $query->get();
        }else
            $blogs = Blog::latest()->paginate(10);

        /* switch ($sort) {
             case 'price_low':
                 $query->orderBy('price', 'asc');
                 break;
             case 'price_high':
                 $query->orderBy('price', 'desc');
                 break;

             default: // newest
                 $query->orderBy('created_at', 'desc');
         }*/

        return view('blog::frontend.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $this->seo()
            ->setTitle($blog->title)
            ->setDescription($blog->description)
        ;
        SEOMeta::addMeta('title', $blog->title, 'name');
        SEOMeta::addMeta('author', $blog->author ?? $blog->user->name, 'name');
        SEOMeta::addMeta('created_at', $blog->created_at, 'name');

        SEOMeta::addMeta('keywords', $blog->tags, 'name');

        // Open Graph for social sharing
        OpenGraph::setTitle($blog->name)
            ->setDescription($blog->description)
            ->addImage(asset($blog->cover_image)); // <-- Here you add the product image
        // Check if this lesson has already been viewed in this session
        $viewedArticles = session()->get('viewed_atricles', []);

        if (!in_array($blog->id, $viewedArticles)) {
            // Increment only once per session
            $blog->increment('view');

            // Store lesson id in session
            session()->push('viewed_atricles', $blog->id);
        }

        // Get category IDs of current blog
        $categoryIds = $blog->categories->pluck('id')->toArray();

        // Get related blogs that share at least one category
        $relatedBlogs = Blog::whereHas('categories', function ($q) use ($categoryIds) {
            $q->whereIn('categories.id', $categoryIds);
        })
            ->where('id', '<>', $blog->id) // exclude current blog
            ->take(2)
            ->get();

        return view('blog::frontend.show', compact('blog','relatedBlogs'));
    }

}

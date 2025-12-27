<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Blog\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::all();
        return view('blog::admin.categories.index', compact('categories'));
    }

    // Show form to create category
    public function create()
    {
        return view('blog::admin.categories.create');
    }

    // Save new category
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:30',
            'color' => 'required|string|max:30',
            'description' => 'string',
        ]);
        $data['status'] = $request->has('status') ? 'active':'inactive';
        Category::create($data);
        toast('دسته جدید اضافه شد','success')->position('bottom-right');
        return redirect()->route('admin.categories.index');
    }


    // Show form to edit category
    public function edit(Category $category)
    {

        return view('blog::admin.categories.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:30',
            'color' => 'required|string|max:30',
            'description' => 'nullable|string',
        ]);
        $data['status'] = $request->has('status') ? 'active':'inactive';
        $category->update($data);
        toast('دسته بروز رسانی شد','success')->position('bottom-right');
        return redirect()->route('admin.categories.index');
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}

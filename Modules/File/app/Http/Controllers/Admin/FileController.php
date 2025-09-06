<?php

namespace Modules\File\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\File\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        $files = File::withCount('users')->paginate(20);
        $freeCount = File::where('access_type', 'free')->count();
        $paidCount = count($files) - $freeCount;
        return view('file::admin.index', compact('files', 'freeCount', 'paidCount'));
    }

    public function create()
    {
        return view('file::admin.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'required|string',
            'description' => 'nullable|string',
            'file_type' => 'required',
            'access_type' => 'required|in:free,paid',
            'price' => 'required_if:access_type,paid|nullable|numeric|min:0',
            'state' => 'required|in:active,inactive',
            'category' => 'nullable|string|max:255',
            'icon' => 'required'
        ]);

        File::create($validated);

        return redirect()->route('admin.files.index')->with('success', 'File created successfully.');
    }

    public function show(File $file)
    {
        return view('file::admin.show', compact('file'));
    }

    public function edit(File $file)
    {
        return view('file::admin.edit', compact('file'));
    }

    public function update(Request $request, File $file)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'required|string',
            'description' => 'nullable|string',
            'file_type' => 'required',
            'access_type' => 'required|in:free,paid',
            'price' => 'required_if:access_type,paid|nullable|numeric|min:0',
            'state' => 'required|in:active,inactive',
            'category' => 'nullable|string|max:255',
            'icon' => 'required'
        ]);

        $file->update($validated);

        return redirect()->route('admin.files.index')->with('success', 'File updated successfully.');
    }

    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('admin.files.index')->with('success', 'File deleted successfully.');
    }
}

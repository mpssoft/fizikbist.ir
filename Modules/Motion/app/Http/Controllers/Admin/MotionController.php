<?php

namespace Modules\Motion\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Motion\Models\Motion;
use Illuminate\Http\Request;

class MotionController extends Controller
{
    /**
     * Display a listing of the motions.
     */
    public function index()
    {
        $motions = Motion::latest()->paginate(10);
        return view('motion::admin.index', compact('motions'));
    }

    /**
     * Show the form for creating a new motion.
     */
    public function create()
    {
        return view('motion::admin.create');
    }

    /**
     * Store a newly created motion in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'video_url'   => 'required|string',
            'description' => 'nullable|string',
            'active'      => 'boolean',
        ]);

        Motion::create($request->all());

        return redirect()->route('admin.motions.index')
            ->with('success', 'Motion created successfully.');
    }

    /**
     * Show the form for editing the specified motion.
     */
    public function edit(Motion $motion)
    {
        return view('motion::admin.edit', compact('motion'));
    }

    /**
     * Update the specified motion in storage.
     */
    public function update(Request $request, Motion $motion)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'video_url'   => 'required|string',
            'description' => 'nullable|string',
            'active'      => 'boolean',
        ]);

        $motion->update($request->all());

        return redirect()->route('admin.motions.index')
            ->with('success', 'Motion updated successfully.');
    }

    /**
     * Remove the specified motion from storage.
     */
    public function destroy(Motion $motion)
    {
        $motion->delete();

        return redirect()->route('admin.motions.index')
            ->with('success', 'Motion deleted successfully.');
    }
}

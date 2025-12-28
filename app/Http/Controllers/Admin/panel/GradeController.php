<?php

namespace App\Http\Controllers\Admin\panel;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        return view('admin.grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:grades,name|max:255',
            'description' => 'nullable|string',
        ]);

        Grade::create($request->only('name', 'description'));

        return redirect()->route('admin.grades.index')
            ->with('success', 'Grade created successfully.');
    }

    public function edit(Grade $grade)
    {
        return view('admin.grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name' => 'required|max:255|unique:grades,name,' . $grade->id,
            'description' => 'nullable|string',
        ]);

        $grade->update($request->only('name', 'description'));

        return redirect()->route('admin.grades.index')
            ->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('admin.grades.index')
            ->with('success', 'Grade deleted successfully.');
    }
}

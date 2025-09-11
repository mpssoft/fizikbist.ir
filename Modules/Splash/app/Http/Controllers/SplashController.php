<?php

namespace Modules\Splash\Http\Controllers;


use App\Http\Controllers\Controller;
use Modules\Splash\Models\Splash;
use Illuminate\Http\Request;

class SplashController extends Controller
{
    public function index()
    {
        $splashes = Splash::latest()->paginate(10);
        return view('splash::admin.index', compact('splashes'));
    }

    public function create()
    {
        return view('splash::admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'image'   => 'required',
            'link'   => 'nullable',
            'active'  => 'boolean',
        ]);


        Splash::create($validated);

        return redirect()->route('admin.splashes.index')->with('success', 'Splash created successfully.');
    }

    public function edit(Splash $splash)
    {
        return view('splash::admin.edit', compact('splash'));
    }

    public function update(Request $request, Splash $splash)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'link' => 'nullable',
            'image'   => 'required',
            'active'  => 'boolean',
        ]);


        $splash->update($validated);

        return redirect()->route('admin.splashes.index')->with('success', 'Splash updated successfully.');
    }

    public function destroy(Splash $splash)
    {
        $splash->delete();
        return redirect()->route('admin.splashes.index')->with('success', 'Splash deleted successfully.');
    }


    public function getSplash()
    {
        $splash = Splash::where('active', true)->latest()->first();

        return response()->json([
            'splash' => $splash,
        ]);
    }

}

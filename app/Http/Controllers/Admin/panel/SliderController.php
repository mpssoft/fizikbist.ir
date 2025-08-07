<?php

namespace App\Http\Controllers\Admin\panel;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index() {
        $sliders = Slider::latest()->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create() {
        return view('admin.sliders.create');
    }

    public function store(Request $request) {

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'link' => 'nullable|url',
            'image' => 'required|image|max:2048',
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }

        Slider::create($data);
        toast('اسلاید جدید با موفقیت ایحاد  شد','success','center');
        return redirect()->route('admin.sliders.index')->with('success', 'اسلایدر ایجاد شد.');
    }

    public function edit(Slider $slider) {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider) {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Optionally: delete old image
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($data);
        return redirect()->route('admin.sliders.index')->with('success', 'اسلایدر ویرایش شد.');
    }

    public function destroy(Slider $slider) {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'اسلایدر حذف شد.');
    }

}

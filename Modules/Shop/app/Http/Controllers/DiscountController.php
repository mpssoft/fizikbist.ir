<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shop\Models\Discount;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    /**
     * Display a listing of discounts.
     */
    public function index()
    {
        $discounts = Discount::latest()->paginate(15);
        return view('shop::admin.discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new discount.
     */
    public function create()
    {
        return view('shop::admin.discounts.create');
    }

    /**
     * Store a newly created discount in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code'       => ['nullable', 'string', 'max:50', Rule::unique('discounts')],
            'type'       => ['required', 'in:percent,fixed'],
            'value'      => ['required', 'numeric', 'min:0'],
            'start_at'   => ['nullable', 'date'],
            'courses'   => ['nullable', 'exists:courses,id'],
            'end_at'     => ['nullable', 'date'],
        ]);

        if(isset($request->is_active)){
            $data['is_active'] = 1;
        }else
            $data['is_active'] = 0;
        $discount = Discount::create($data);

        if(isset($request->courses)) {
            $discount->courses()->attach($data['courses']);
        }



        return redirect()->route('shop.admin.discounts.index')
            ->with('success', 'کد تخفیف با موفقیت ایجاد شد.');
    }

    /**
     * Show the form for editing the specified discount.
     */
    public function edit(Discount $discount)
    {
        return view('shop::admin.discounts.edit', compact('discount'));
    }

    /**
     * Update the specified discount in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $data = $request->validate([
            'code'       => ['nullable', 'string', 'max:50', Rule::unique('discounts')->ignore($discount->id)],
            'type'       => ['required', 'in:percent,fixed'],
            'value'      => ['required', 'numeric', 'min:0'],
            'courses'   => ['nullable', 'exists:courses,id'],
            'start_at'   => ['nullable', 'date'],
            'end_at'     => ['nullable', 'date'],
        ]);
        if(isset($request->is_active)){
            $data['is_active'] = 1;
        }else
            $data['is_active'] = 0;
        $discount->update($data);

        isset($data['courses'])
            ? $discount->courses()->sync($data['courses'])
            : $discount->courses()->detach();

        toast('تخفیف با موفقیت ویرایش شد.','success','center');
        return redirect()->route('shop.admin.discounts.index')
            ->with('success', 'تخفیف با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified discount from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('shop.admin.discounts.index')
            ->with('success', 'تخفیف حذف شد.');
    }
}

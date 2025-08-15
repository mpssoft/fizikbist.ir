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
            'applies_to' => ['required', 'string'], // course, lesson, product...
            'item_id'    => ['nullable', 'integer'],
            'is_active'  => ['required', 'boolean'],
            'start_at'   => ['nullable', 'date'],
            'end_at'     => ['nullable', 'date'],
        ]);

        Discount::create($data);

        return redirect()->route('admin.shop.discounts.index')
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
            'applies_to' => ['required', 'string'],
            'item_id'    => ['nullable', 'integer'],
            'is_active'  => ['required', 'boolean'],
            'start_at'   => ['nullable', 'date'],
            'end_at'     => ['nullable', 'date'],
        ]);

        $discount->update($data);

        return redirect()->route('admin.shop.discounts.index')
            ->with('success', 'تخفیف با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified discount from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('admin.shop.discounts.index')
            ->with('success', 'تخفیف حذف شد.');
    }
}

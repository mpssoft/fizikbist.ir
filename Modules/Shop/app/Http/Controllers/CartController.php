<?php

namespace Modules\Shop\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Modules\File\Models\File;
use Modules\LessonPlan\Models\LessonPlan;
use Modules\Shop\Services\CartService;
use Modules\Shop\Models\Discount;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Show cart items
     */
    public function index()
    {
        $cart = $this->cartService->getCart();

        $cart =  collect($cart)->map(function ($item) {

            if (isset($item['item_type'], $item['item_id'])) {
                $modelClass = $item['item_type'];

                if (class_exists($modelClass)) {
                    $item['model'] = $modelClass::find($item['item_id']); // Eloquent model
                    // If model not found → return null
                    if (!$item['model']) {
                        $this->cartService->removeItem($item['item_type'], $item['item_id']);
                        return null;

                    }
                }else
                    return null;
            }
            return $item;
        })->filter();
        //dd($cart);
        return view('shop::cart.index', compact('cart'));
    }

    /**
     * Add item to cart
     */
    public function add($model, $id)
    {
        // Map model name to actual class
        $modelClasses = [
            'course'  => Course::class,
            'lesson'  => Lesson::class,
            'file'  => File::class,
            'lessonplan'  => LessonPlan::class,
        ];

        if (!isset($modelClasses[$model])) {
            return response()->json(['success' => false, 'message' => 'نوع آیتم نامعتبر است']);
        }

        $itemClass = $modelClasses[$model];
        $item = $itemClass::findOrFail($id);

        $type  = get_class($item); // e.g., "Course", "Lesson"
        $id    = $item->id;
        $price = $item->price ?? 0;

        $msg = $this->cartService->addItem($type, $id, 1, $price);

        return response()->json([
            'success' => true,
            'count' => count($this->cartService->getCart()),
            'message' => $msg,
        ]);
    }

    /**
     * Remove item from cart
     */
    public function remove(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'id'   => 'required|integer'
        ]);

        $this->cartService->removeItem($request->type, $request->id);
        if ($request->isJson()) {
            return response()->json([
                'success' => true,
                'count' => count($this->cartService->getCart()),
                'message' => 'محصول از سبد حذف شد'
            ]);
        }
        return back();
    }
    public function removeDiscount(Request $request)
    {

        $this->cartService->removeDiscount($request->code);
        return redirect('/cart');
    }
    /**
     * Apply discount code manually
     */
    public function applyDiscount(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $result = $this->cartService->applyDiscountCode($request->code);
        if(!$result['success'])
            return response()->redirectTo('/cart')->withErrors($result['message']);
        else
            return redirect('/cart')->with('result',$result);
    }

    /**
     * Clear entire cart
     */
    public function clear()
    {
        $this->cartService->clearCart();

        return response()->json([
            'success' => true,
            'message' => 'سبد خرید خالی شد'
        ]);
    }

    /**
     * Auto-apply available discounts
     */
    public function autoDiscounts()
    {
        $this->cartService->autoApplyDiscounts();

        return response()->json([
            'success' => true,
            'message' => 'تخفیف‌های خودکار اعمال شد'
        ]);
    }

    public function cartItems()
    {
        $cart = $this->cartService->getCart();
        $count = count($cart);
        $cart =  collect($cart)->map(function ($item) {

            if (isset($item['item_type'], $item['item_id'])) {
                $modelClass = $item['item_type'];

                if (class_exists($modelClass)) {
                    $item['model'] = $modelClass::find($item['item_id']); // Eloquent model
                    // If model not found → return null
                    if (!$item['model']) {
                        $this->cartService->removeItem($item['item_type'], $item['item_id']);
                        return null;
                    }

                }else
                    return null;
            }
            return $item;
        })->filter();
        return view('shop::cart.cart-items', compact('cart','count'));

    }
}

<?php

namespace Modules\Shop\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Modules\Shop\Models\Discount;
use Modules\Shop\Models\CartItem;

class CartService
{
    protected $cookieName = 'shop_cart';
    protected $cookieMinutes = 60 * 24 * 7; // 7 days

    /**
     * Add an item to the cart
     */
    public function addItem($type, $id, $qty = 1, $price = 0)
    {
        $discount = $this->getDiscountForItem($type, $id);

        if (Auth::check()) {
            $existing = CartItem::where('user_id', Auth::id())
                ->where('item_type', $type)
                ->where('item_id', $id)
                ->first();

            if ($existing) {
                return "قبلا به سبد خرید اضافه شده !";
                $existing->qty += $qty;
                $existing->code = $discount->code??'';
                $existing->discount = $discount ? $discount : null;
                $existing->save();
            } else {
                CartItem::create([
                    'user_id' => Auth::id(),
                    'item_type'    => $type,
                    'item_id' => $id,
                    'qty'     => $qty,
                    'code'     => $discount->code??'',
                    'price'   => $price,
                    'discount'   => $discount ? $discount : null
                ]);
            }
        } else {
            $cart = $this->getCart();

            $key = $type . '-' . $id;

            if ($cart->has($key)) {
                return "قبلا به سبد خرید اضافه شده !";
                $item = $cart->get($key);
                $item['qty'] += $qty;
                $item['discount'] = $discount ? $discount : null;
                $cart->put($key, $item);
            } else {
                $cart->put($key, [
                    'item_type'  => $type,
                    'item_id'    => $id,
                    'qty'   => $qty,
                    'price' => $price,
                    'discount' => $discount ? $discount : null                ]);
            }

            Cookie::queue($this->cookieName, json_encode($cart->toArray()), $this->cookieMinutes);


        }
        return "به سبد خرید اضافه شد";

    }
    protected function getDiscountForItem($type, $id)
    {
        $now = now();
        if (class_exists($type)) {
            $tableName = (new $type)->getTable();
        }else
            return null;
        return Discount::where('is_active', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('start_at')->orWhere('start_at', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('end_at')->orWhere('end_at', '>=', $now);
            })
            ->whereHas($tableName, function ($q) use ($type, $id) {
                $q->where('discountable_type', $type)
                    ->where('discountable_id', $id);
            })
            ->first();

    }


    /**
     * Get cart items (guest from cookie, auth from DB)
     */
    public function getCart()
    {
        if (Auth::check()) {
            $cart = Auth::user()->cartItems()->get()->toArray();
           // $this->autoApplyDiscounts($cart);

            $cart = collect($cart)->map(function ($item) {
                if (isset($item['item_type'], $item['item_id'])) {
                    $item = $this->withRelationshipIfExist($item);
                }
                return $item;
            });

            // key the cart by type-id for consistency
            $cart = $cart->keyBy(function ($item) {
                return $item['item_type'] . '-' . $item['item_id'];
            });

            return $cart;
        } else {
            $cart = json_decode(Cookie::get($this->cookieName, '[]'), true) ?: [];
           // $this->autoApplyDiscounts($cart);

            // key the cart by type-id
            $cart = collect($cart)->keyBy(function ($item) {
                return $item['item_type'] . '-' . $item['item_id'];
            });

            return $cart;
        }
    }
    protected function checkDiscountValidate(mixed $item, mixed $discount)
    {

        $discount = Discount::where('code', $discount)->first();
        if ($discount)
            if (
                (!$discount->courses->count() && !$discount->lessons->count()) ||
                (in_array($item['model']->id, $discount->courses->pluck('id')->toArray())) ||
                (in_array($item['model']->id, $discount->lessons->pluck('id')->toArray()))

            ) {
                $item['discount'] = $discount->value ;
            }
        return $item;
    }
    private function withRelationshipIfExist($item)
    {

        $modelClass = $item['item_type'];

        if (class_exists($modelClass)) {
            $item['model'] = $modelClass::find($item['id']); // Eloquent model
        }

        return $item;

    }

    /**
     * Remove an item from the cart
     */
    public function removeItem($type, $id)
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('item_type', $type)
                ->where('item_id', $id)
                ->delete();
        } else {
            $cart = $this->getCart();
            $key = $type . '-' . $id;
            unset($cart[$key]);
            Cookie::queue($this->cookieName, json_encode($cart), $this->cookieMinutes);

        }
    }
    public function removeDiscount($code)
    {
        if(Auth::check()) {
            Auth::user()->cartItems()->where('code',$code)->update(['discount'=>null]);


        }else{
            $cart = $this->getCart();
            $cart = $cart->map(function ($item) use ($code) {
                    if(isset($item['discount']['code']))
                        if($item['discount']['code']== $code){
                            $item['discount'] = null;
                        }
                return $item;
            });
            Cookie::queue($this->cookieName, json_encode($cart), $this->cookieMinutes);

        }
    }
    /**
     * Apply discount code manually
     */
    public function applyDiscountCode($code)
    {
        $cart = $this->getCart();
        $find = 0;
        $discount = Discount::where('code', $code)
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('start_at')->orWhere('start_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_at')->orWhere('end_at', '>=', now());
            })
            ->first();

        if (!$discount) {
            return ['success' => false, 'message' => 'کد تخفیف معتبر نیست'];
        }

        foreach ($discount->allItems() as $dis )  {

            $cart = $cart->map(function ($item) use ($discount, $dis ,&$find) {

                $itemClass = $item['item_type'];

                if ($itemClass === get_class($dis) && $item['item_id'] === $dis->id) {
                    $item['discount'] = $discount;

                    $find = 1;
                }/*else
                    $item['discount'] = null;*/
                return $item;
            });
        }

        if (!Auth::check()) {

            Cookie::queue($this->cookieName, json_encode($cart), $this->cookieMinutes);

        } else {

            $cart = Auth::user()->cartItems()->get();

            foreach ($discount->allItems() as $dis) {
                foreach ($cart as $item) {

                    if (get_class($dis) === $item->item_type && $dis->id == $item->item_id) {
                        $item->discount = $discount;
                        $item->code = $discount->code;
                        $item->update();
                        $find = 1;
                    }/*else{
                        $item->discount = null;
                        $item->update();
                    }*/
           }
            }
        }
        if($find)
            return ['success' => true, 'message' => 'تخفیف اعمال شد', 'discount' => $discount];
        else
            return ['success' => false, 'message' => ' کد معتبر است اما برای هیچ یک از محصولات این سبد تعیین نشده', 'discount' => $discount];

    }
    /**
     * Auto-apply discounts without code
     */
    public function autoApplyDiscounts($cart)
    {
        $cart = collect($cart);
        $discounts = Discount::where('is_active', true)
            ->where('start_at', '<=', now())
            ->where('end_at', '>=', now())
                ->get();

        $cart = $cart->map(function ($item) use ($discounts) {
            foreach ($discounts as $discount) {
                if (
                    $discount->applies_to === $item['item_type'] &&
                    ($discount->item_id === null || $discount->item_id == $item['item_id'])
                ) {
                    $item['discount'] = $discount->type === 'percent'
                        ? ($discount->value . '%')
                        : ($discount->value . ' تومان');
                }
            }
            return $item;
        });


        if (!Auth::check()) {
            Cookie::queue($this->cookieName, json_encode($cart), $this->cookieMinutes);
        }
    }

    /**
     * Merge guest cart with authenticated user cart after login
     */
    public function mergeGuestCartWithUser($user)
    {
        $guestCart = json_decode(Cookie::get($this->cookieName, '[]'), true);

        if (empty($guestCart)) {
            return;
        }

        foreach ($guestCart as $item) {
            $existing = $user->cartItems()
                ->where('item_type', $item['item_type'])
                ->where('item_id', $item['item_id'])
                ->first();
            $discount = $this->getDiscountForItem($item['item_type'], $item['item_id']);
            if ($existing) {
                $existing->qty += $item['qty'];
                $existing->discount = $discount ?? null ;
                $existing->save();
            } else {

                $user->cartItems()->create([
                    'item_type'    => $item['item_type'],
                    'item_id' => $item['item_id'],
                    'qty'     => $item['qty'],
                    'price'   => $item['price'] ?? 0,
                    'discount' => $discount ?? null
                ]);
            }
        }

        $this->clearCart();
    }

    /**
     * Clear guest cart from cookies
     */
    public function clearCart()
    {
        Cookie::queue(Cookie::forget($this->cookieName));
    }
}

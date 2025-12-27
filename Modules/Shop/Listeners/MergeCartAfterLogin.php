<?php

namespace Modules\Shop\Listeners;

use Illuminate\Auth\Events\Login;
use Modules\Shop\Services\CartService;

class MergeCartAfterLogin
{
    protected $cart;

    public function __construct(CartService $cartService)
    {
        $this->cart = $cartService;
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $this->cart->mergeGuestCartWithUser($event->user);
    }
}

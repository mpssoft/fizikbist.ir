<input type="hidden" id="count" value="{{$count}}" />
    @if( count($cart))
        @php
            $wholePrice = 0;
            $wholeDiscount = 0;
        @endphp
        @foreach($cart as $item)
        <!-- Cart Item 1 -->
        <div class="cart-item flex items-center gap-3 p-3 border border-gray-600 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-shopping-bag  text-lg"></i>

            </div>
            <div class="flex-1 min-w-0">
                <h4 class="font-medium text-sm truncate">{{$item['model']['title']}}</h4>
                @if(!is_null($item['discount']))
                    @php

                        if(!is_array($item['discount']))
                            $discount = collect(json_decode($item['discount']));
                        else
                            $discount = collect($item['discount']);

                        if($discount['type'] == 'percent'){

                            $dis = ($item['price'] * ($discount['value']  / 100 ));
                            }
                        else{
                            $dis = $discount['value'];
                            }
                        $discounted = $item['price'] - $dis;
                        $wholePrice += $discounted;
                        $wholeDiscount += $dis;
                    @endphp

                    <div class="flex items-center gap-2 mt-1">
                    <span class="text-xs line-through dark:text-gray-400">{{number_format($item['price'])}} </span>
                    <span class="text-xs bg-red-100 text-red-600 px-1.5 py-0.5 rounded-full">

                            {{$discount['type'] == 'percent' ? $discount['value'].'٪':$discount['value'].' تومان '}}
                         </span>
                </div>
                    <p class="font-bold  text-purple-400">{{number_format($discounted) }} تومان</p>
                @else
                    @php
                        $wholePrice += $item['price'];

     @endphp
                <p class="font-bold text-purple-400">{{number_format($item['price'])}}  تومان</p>
                    @endif
            </div>

            <button onclick="removeItem('{{addslashes($item['item_type'])}}',{{$item['item_id']}})" class="text-red-400 hover:text-red-600 transition-colors flex-shrink-0" >
                <i class="fas fa-trash text-base"></i>
                <i id="spin-{{$item['item_id']}}" class=" !hidden fas fa-spinner fa-spin-pulse"></i>
            </button>

        </div>

        @endforeach
    <!-- Divider -->
    <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>

    <!-- Cart Summary -->
    <div class=" rounded-xl p-3">

        <div class="flex justify-between items-center text-green-600 dark:text-green-400">
            <span>تخفیف:</span>
            <span>{{ number_format($wholeDiscount) }} تومان</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-bold text-sm dark:text-gray-100">مجموع کل:</span>
            <span id="total" class="font-bold text-base text-purple-300 text-lg">{{ number_format($wholePrice) }} تومان</span>
        </div>
    </div>

    <!-- Checkout Button -->
        <a href="/cart" id="checkoutButton" class="w-full btn btn-primary dark:w-full mt-2 dark:mt-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 rounded-xl font-bold text-sm hover:shadow-lg transition-all duration-200 hover:scale-105 block text-center">
            <i class="fas fa-credit-card ml-2"></i>
             تسویه حساب
        </a>
    @else
        <div id="emptyCart" class=" text-center py-8">
            <div class="w-20 h-20 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-shopping-cart text-gray-400 text-2xl"></i>
            </div>
            <h4 class="font-medium text-gray-100 mb-2">سبد خرید شما خالی است</h4>
            <p class="text-xs text-gray-400">محصولات مورد نظر خود را به سبد خرید اضافه کنید</p>
        </div>

    @endif


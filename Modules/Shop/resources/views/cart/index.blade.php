@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">

        <div class="min-h-screen py-8">
            <div class="container mx-auto px-4 max-w-6xl">
                <!-- Header Section -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6m0 0h15M17 21a2 2 0 100-4 2 2 0 000 4zM9 21a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-gray-100 dark:to-gray-300 bg-clip-text text-transparent mb-2">
                        سبد خرید شما
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400">محصولات انتخابی شما برای خرید</p>
                </div>

                @if( count($cart))

                    <!-- Sample Cart Data -->
                    <div id="cart-content">
                        <!-- Cart Items -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-8">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 flex items-center">
                                    <svg class="w-5 h-5 ml-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    آیتم‌های سبد خرید
                                </h2>
                            </div>

                            <!-- Desktop Table View -->
                            <div class="hidden md:block overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                    <tr class="bg-gray-50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-200">
                                        <th class="py-4 px-6 text-right font-medium">نوع محصول</th>
                                        <th class="py-4 px-6 text-right font-medium">قیمت</th>
                                        <th class="py-4 px-6 text-right font-medium">زبان</th>
                                        <th class="py-4 px-6 text-right font-medium">تخفیف</th>
                                        <th class="py-4 px-6 text-right font-medium">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @php
                                        $wholePrice = 0;
                                        $wholeDiscount = 0;
                                    @endphp
                                    @foreach($cart as $item)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors duration-200">
                                            <td class="py-4 px-6">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center ml-3">
                                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                        </svg>
                                                    </div>
                                                    <span class="font-medium text-gray-800 dark:text-gray-100">{{$item['model']['title']}}</span>
                                                </div>
                                            </td>


                                            <td class="py-4 px-6">
                                                @if(!is_null($item['discount']))
                                                    @php

                                                        if(!is_array($item['discount']))
                                                            $discount = collect(json_decode($item['discount']));
                                                        else
                                                            $discount = collect($item['discount']);

                                                        if($discount['type'] == 'percent')
                                                            $discounted = $item['price'] - ($item['price'] * ($discount['value']  / 100 ));
                                                        else
                                                            $discounted = $item['price'] - $discount['value'] ;

                                                    @endphp
                                                    <del class="text-red-600 text-sm "> {{number_format($item['price'])}} تومان</del>
                                                    <span class="font-semibold text-gray-800 dark:text-gray-100">{{number_format($discounted) }} تومان</span>

                                                @else

                                                    <span class="font-semibold text-gray-800 dark:text-gray-100">{{number_format($item['price'])}} تومان</span>
                                                @endif
                                            </td>
                                            <td class="py-4 px-6"> {{$item['model']->lang == 'tr' ? 'زبان ترکی':'زبان فارسی'}}</td>
                                            <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                              @if(!is_null($item['discount']))
                                                {{$discount['type'] == 'percent' ? $discount['value'].'٪':$discount['value'].' تومان '}}
                                            @endif
                                        </span>
                                            </td>
                                            <td class="py-4 px-6">
                                                <button onclick="removeItem('{{addslashes($item['item_type'])}}',{{$item['item_id']}})" class="flex  items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800 transition-all duration-200 hover:shadow-lg">
                                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        حذف
                                                    </button>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile Card View -->
                            <div class="md:hidden space-y-4 p-4">
                                @foreach($cart as $item)

                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4 border border-gray-200 dark:border-gray-600 transition-colors duration-300">
                                        <div class="flex items-start justify-between mb-3">
                                            <div class="flex items-center">
                                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-lg flex items-center justify-center ml-3 transition-colors duration-300">
                                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-800 dark:text-gray-100 transition-colors duration-300">{{$item['model']['title']}}</h3>

                                                </div>
                                            </div>
                                            @if(!is_null($item['discount']))
                                            @php
                                                $hasDiscount = true;
                                                if(!is_array($item['discount']))
                                                    $discount = collect(json_decode($item['discount']));
                                                else
                                                    $discount = collect($item['discount']);
                                                 $discountCode[] = $discount['code'];
                                                 $discountPrice[] = $discount['value'];
                                                 $discountType[] = $discount['type'] == 'percent' ? '%':'تومان';
                                                if($discount['type'] == 'percent'){
                                                    $discounted = $item['price'] - ($item['price'] * ($discount['value']  / 100 ));
                                                    $sign = "%";
                                                }
                                                else{
                                                    $discounted = $item['price'] - $discount['value'] ;
                                                    $sign = "تومان";
                                                    }
                                                $wholePrice += $item['price'];
                                                $wholeDiscount += $item['price'] - $discounted;
                                            @endphp
                                        @endif
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/50 text-green-800 dark:text-green-300 transition-colors duration-300">
                                      @if(!is_null($item['discount']))
                                                {{$discount['value']??''}}{{$sign??'' }}
                                          @endif
                                </span>
                                        </div>
                                        <div class="flex items-center justify-between">

                                            <div class="text-left">
                                                @if(!is_null($item['discount']))

                                                    <del class="font-semibold text-red-800 dark:text-red-800 transition-colors text-sm  duration-300">
                                                        {{number_format($item['price'])}} تومان</del>
                                                    <p class="font-semibold text-gray-800 dark:text-gray-100 transition-colors duration-300">{{$discounted}} تومان</p>
                                                @else
                                                    @php  $wholePrice += $item['price']; @endphp
                                                    <p class="font-semibold text-gray-800 dark:text-gray-100 transition-colors duration-300">
                                                        {{number_format($item['price'])}} تومان</p>
                                                @endif

                                            </div>
                                            <button onclick="removeItem('{{addslashes($item['item_type'])}}',{{$item['item_id']}})" class="flex  items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800 transition-all duration-200 hover:shadow-lg">
                                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                حذف
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                            <div class="lg:col-span-1">
                                <!-- Coupon Section -->
                                <!-- Alerts (validation errors) -->
                                @if(session('result'))

                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 text-emerald-700 px-2.5 py-1 text-xs font-medium">
                              <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm-1 14-4-4 1.414-1.414L11 12.172l5.586-5.586L18 8l-7 8Z"/>
                              </svg>
                              {{ session('result')['message'] }}
                            </span>


                                @else
                                    @if ($errors->any())
                                        <div class="mb-6 rounded-xl border border-rose-300/60 bg-rose-50/80 text-rose-700 dark:border-rose-500/40 dark:bg-rose-900/30 dark:text-rose-200 p-4">

                                            <ul class="list-disc pr-5 text-sm space-y-1">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endif
                                @if(isset($hasDiscount))
                                    <div class=" mb-4">
                                        <div class="flex items-start justify-between rounded-xl border border-green-300 bg-green-50 dark:bg-green-900/30 dark:border-green-700 p-4">
                                            <div class="flex items-center gap-3">
                                                <!-- Success icon -->
                                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-green-500 text-white">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
      </span>

                                                <div class="leading-relaxed">
                                                    <p class="text-sm font-semibold text-green-800 dark:text-green-200">
                                                        کد تخفیف اعمال شده
                                                    </p>
                                                    @php

                                                        $discounts = array_map(null,$discountCode,$discountPrice,$discountType);

                                                    @endphp
                                                    @foreach($discounts as [$code,$price,$type])
                                                        <p class="mt-1 text-sm text-green-700 dark:text-green-300 inline-flex">
                                                            کد: <span class="font-bold tracking-wide text-green-900 dark:text-green-100">{{$code ?? ''}}</span>
                                                            <span class="mx-2 text-green-600/60">|</span>
                                                            مقدار تخفیف:
                                                            <span class="font-bold text-green-900 dark:text-green-100">{{$price ?? ''}} {{$type ?? ''}}</span>
                                                        </p>
                                                        <form action="{{route('shop.cart.removeDiscount')}}" method="post" class="inline-block ">
                                                            <input type="hidden" value="{{$code??''}}" name="code">
                                                            @csrf
                                                            <button class="p-2 sm:p-3 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-colors duration-200" title="حذف">
                                                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <br>
                                                    @endforeach
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                @endif
                                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-6">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                                        <svg class="w-5 h-5 ml-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        کد تخفیف
                                    </h3>
                                    <div class="flex space-x-3 space-x-reverse">
                                        <form action="{{route('shop.cart.applyDiscount')}}" method="post" class="w-full flex flex-col  space-x-3 space-x-reverse">
                                            @csrf
                                            <input type="text" name="code" placeholder="کد تخفیف خود را وارد کنید" class="flex-1 mb-2 px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-400 placeholder-gray-500 dark:placeholder-gray-400">
                                            <button class="px-10 h-12 py-0  bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg transition-colors duration-200 hover:shadow-lg">
                                                اعمال
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Order Summary Card -->
                            <div class="lg:col-span-2">
                                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 sticky top-8">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-6 flex items-center">
                                        <svg class="w-5 h-5 ml-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        خلاصه سفارش
                                    </h3>

                                    <div class="space-y-4 mb-6">
                                        <div class="flex justify-between text-gray-600 dark:text-gray-300">
                                            <span>جمع کل محصولات:</span>
                                            <span>{{ number_format($wholePrice) }} تومان</span>
                                        </div>
                                        <div class="flex justify-between text-green-600 dark:text-green-400">
                                            <span>تخفیف:</span>
                                            <span>{{ number_format($wholeDiscount) }} تومان</span>
                                        </div>

                                        <hr class="border-gray-200 dark:border-gray-600">
                                        <div class="flex justify-between text-lg font-bold text-gray-800 dark:text-gray-100">
                                            <span>مبلغ نهایی:</span>
                                            <span class="text-blue-600 dark:text-blue-400">{{ number_format($wholePrice-$wholeDiscount) }} تومان</span>
                                        </div>
                                    </div>
                                    <button
                                        id="paymentButton"
                                        disabled
                                        class="w-full bg-gray-400 text-white py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 cursor-not-allowed opacity-50"
                                    >
                                        <i class="fas fa-lock ml-2"></i>
                                        ابتدا شرایط و ضوابط را بپذیرید
                                    </button>
                                    <a id="enabledPaymentButton" href="{{route('user.cart.checkout')}}" class="hidden w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                        </svg>
                                        ادامه  پرداخت
                                    </a>
                                    <a href="{{route('all.courses')}}" class="mt-5 w-full bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-950 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center justify-center">
                                        <span class="fas fa-plus ml-3"> </span>
                                        افزودن محصولات بیشتر
                                    </a>

                                    <div class="mt-4 text-center">
                                        <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center justify-center">
                                            <svg class="w-4 h-4 ml-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                            پرداخت امن و محفوظ
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Terms of Service Section -->
                        <div class="mb-8 mt-8">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">
                                <i class="fas fa-file-contract ml-2"></i>
                                شرایط و ضوابط
                            </h2>

                            <!-- Terms Container -->
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg">
                                <!-- Terms Header -->
                                <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center justify-between">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">قوانین و مقررات فیزیک بیست</h3>
                                        <button id="toggleTerms" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                                            <i class="fas fa-chevron-down" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Terms Content (Collapsible) -->
                                <div id="termsContent" class="hidden">
                                    <div class="p-6 max-h-96 overflow-y-auto">



                                            <div>
                                                <h4 class="font-semibold text-gray-900 dark:text-white mb-3">۱. استفاده از محتوای آموزشی</h4>
                                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-3">
                                                    محتوای آموزشی شامل ویدیوها، جزوات و فایل‌های تمرینی صرفاً برای استفاده شخصی شما در نظر گرفته شده است. اشتراک‌گذاری، کپی‌برداری یا توزیع این محتوا ممنوع است.
                                                </p>
                                            </div>

                                            <div>
                                                <h4 class="font-semibold text-gray-900 dark:text-white mb-3">۲. حقوق مالکیت معنوی</h4>
                                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-3">
                                                    تمامی محتویات تحت حمایت قوانین کپی‌رایت قرار دارند. نقض این حقوق منجر به پیگرد قانونی خواهد شد.
                                                </p>
                                            </div>


                                            <div>
                                                <h4 class="font-semibold text-gray-900 dark:text-white mb-3">۴. پشتیبانی و خدمات</h4>
                                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-3">
                                                    تیم پشتیبانی ما از طریق شماره ۰۹۱۴۱۸۷۹۷۶۷ آماده پاسخگویی به سوالات فنی و آموزشی شما است.
                                                </p>
                                            </div>

                                            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
                                                <div class="flex items-start gap-3">
                                                    <i class="fas fa-exclamation-triangle text-yellow-500 mt-1"></i>
                                                    <div>
                                                        <h5 class="font-semibold text-yellow-800 dark:text-yellow-200 mb-1">توجه مهم</h5>
                                                        <p class="text-yellow-700 dark:text-yellow-300 text-sm">
                                                            با تکمیل خرید، شما تأیید می‌کنید که تمامی شرایط و ضوابط را مطالعه کرده و با آن‌ها موافق هستید.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Terms Acceptance Checkbox -->
                            <div class="mt-6">
                                <label class="flex items-start gap-3 cursor-pointer group">
                                    <input
                                        type="checkbox"
                                        id="acceptTerms"
                                        class="mt-1 w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    >
                                    <div class="text-sm">
                  <span class="text-gray-700 dark:text-gray-300">
                    شرایط و ضوابط استفاده از سایت فیزیک بیست را مطالعه کرده و با آن‌ها
                  </span>
                                        <span class="font-semibold text-blue-600 dark:text-blue-400">موافق هستم</span>
                                        <span class="text-red-500">*</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                    </div>
                @else
                    <!-- Empty Cart State -->
                    <div id="empty-cart" class="hidden text-center py-16">
                        <div class="max-w-md mx-auto">
                            <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6m0 0h15M17 21a2 2 0 100-4 2 2 0 000 4zM9 21a2 2 0 100-4 2 2 0 000 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">سبد خرید شما خالی است</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">هنوز محصولی به سبد خرید خود اضافه نکرده‌اید</p>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200">
                                مشاهده محصولات
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <script>
        // Terms toggle functionality
        const toggleTerms = document.getElementById('toggleTerms');
        const termsContent = document.getElementById('termsContent');
        const toggleIcon = document.getElementById('toggleIcon');

        toggleTerms.addEventListener('click', function() {
            if (termsContent.classList.contains('hidden')) {
                termsContent.classList.remove('hidden');
                toggleIcon.classList.remove('fa-chevron-down');
                toggleIcon.classList.add('fa-chevron-up');
            } else {
                termsContent.classList.add('hidden');
                toggleIcon.classList.remove('fa-chevron-up');
                toggleIcon.classList.add('fa-chevron-down');
            }
        });

        // Terms acceptance and payment button functionality
        const acceptTerms = document.getElementById('acceptTerms');
        const paymentButton = document.getElementById('paymentButton');
        const enabledPaymentButton = document.getElementById('enabledPaymentButton');

        acceptTerms.addEventListener('change', function() {
            if (this.checked) {
                // Hide disabled button, show enabled button
                paymentButton.classList.add('hidden');
                enabledPaymentButton.classList.remove('hidden');
            } else {
                // Show disabled button, hide enabled button
                paymentButton.classList.remove('hidden');
                enabledPaymentButton.classList.add('hidden');
            }
        });

        // Payment button click handler
        enabledPaymentButton.addEventListener('click', function() {
            // Show loading state
            this.innerHTML = '<i class="fas fa-spinner fa-spin ml-2"></i>در حال پردازش...';
            this.disabled = true;

            // Simulate payment processing
            setTimeout(function() {
                document.getElementById('successModal').classList.remove('hidden');
                enabledPaymentButton.innerHTML = '<i class="fas fa-credit-card ml-2"></i>پرداخت ۴۰۳,۲۰۰ تومان';
                enabledPaymentButton.disabled = false;
            }, 2000);
        });

        // Close success modal
        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('successModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSuccessModal();
            }
        });
    </script>

@endpush

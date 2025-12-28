@extends('layouts.admin.master')

@section('content')

<div class="bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
<div class="min-h-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-5 py-5">
        <!-- Header card -->
        <header class="mb-8">
            <div class="w-full rounded-2xl border border-gray-200 dark:border-slate-700 bg-white/70 dark:bg-slate-700/60 backdrop-blur p-4 sm:p-5">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">

                    <div class="flex items-center gap-4">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full shadow-lg">
                            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <!-- Discount tag shape -->
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M3 10.5l6.8 6.8a2 2 0 0 0 2.83 0L21 9.93V3H14.07L3 10.5z"/>
                                <!-- Percent sign -->
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15l6-6"/>
                                <circle cx="8" cy="8" r="1.1" fill="currentColor"/>
                                <circle cx="16" cy="16" r="1.1" fill="currentColor"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">تخفیف‌ها</h1>
                            <p class="mt-1 text-slate-600 dark:text-slate-300">همه کدهای تخفیف را در یک جا مدیریت کنید.</p>
                        </div>
                    </div>
                    <a href="{{route('shop.admin.discounts.create')}}"
                       class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                        </svg>
                        افزودن تخفیف
                    </a>
                </div>
            </div>

            <!-- Filters (static) -->
         {{--   <div class="mt-6">
                <div class="w-full rounded-2xl border border-gray-200 dark:border-slate-800 bg-white/70 dark:bg-slate-700/60 backdrop-blur p-4 sm:p-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">جستجو</label>
                            <input type="text" placeholder="جستجو بر اساس کد…"
                                   class="w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 placeholder:text-slate-400 dark:placeholder:text-slate-500 px-3 py-2 focus-ring">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">نوع</label>
                            <select class="w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 px-3 py-2 focus-ring">
                                <option value="">همه</option>
                                <option value="percent">درصدی</option>
                                <option value="fixed">ثابت</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">وضعیت</label>
                            <select class="w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 px-3 py-2 focus-ring">
                                <option value="">همه</option>
                                <option value="active">فعال</option>
                                <option value="inactive">غیرفعال</option>
                            </select>
                        </div>
                    </div>
                    <p class="mt-3 text-xs text-slate-500 dark:text-slate-400">این فیلترها صرفاً ظاهری هستند و رفتار تعاملی ندارند.</p>
                </div>
            </div>--}}
        </header>

        <!-- List header -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
          <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-brand-600/10 text-brand-600" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l3.09 6.26L22 10.27l-5 4.87L18.18 22 12 18.77 5.82 22 7 15.14l-5-4.87 6.91-1.01L12 3z"/>
            </svg>
          </span>
                <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100">همه تخفیف‌ها</h2>
            </div>
            <div class="text-sm text-slate-500 dark:text-slate-400">نمایش داده‌های نمونه</div>
        </div>

        <!-- Cards list (replaces table) -->
        <section class="space-y-4">
            @foreach($discounts as $discount)
                <!-- Card 1 -->
                <article class="rounded-2xl border border-gray-200 dark:border-slate-800 bg-white/80 dark:bg-slate-700/60 backdrop-blur shadow-soft p-4 sm:p-5 transition card-hover">
                    <div class="flex flex-col gap-4">
                        <!-- Top row: code, type, value, status -->
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-xs text-slate-500 dark:text-slate-400">شناسه:</span>
                                <span class="text-sm font-semibold">{{$discount->id}}</span>

                                <span class="mx-2 hidden lg:inline text-slate-300 dark:text-slate-700">|</span>

                                <span class="text-xs text-slate-500 dark:text-slate-400">کد:</span>
                                <span class="text-sm font-semibold">{{$discount->code}}</span>

                                <span class="mx-2 hidden lg:inline text-slate-300 dark:text-slate-700">|</span>

                                <span class="text-xs text-slate-500 dark:text-slate-400">نوع:</span>
                                <span class="inline-flex items-center rounded-full bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300 px-2 py-0.5 text-xs font-semibold">
                      {{ $discount->type == 'percent' ? 'درصد':'مبلغ ثابت' }}
                    </span>

                                <span class="mx-2 hidden lg:inline text-slate-300 dark:text-slate-700">|</span>

                                <span class="text-xs text-slate-500 dark:text-slate-400">مقدار:</span>
                                <span class="text-sm font-semibold">{{ $discount->type == 'percent' ? $discount->value.'%':$discount->value.' تومان' }}</span>

                                <span class="mx-2 hidden lg:inline text-slate-300 dark:text-slate-700">|</span>

                                <span class="text-xs text-slate-500 dark:text-slate-400">وضعیت:</span>
                                @php
                                    $discount->is_active ? $class="emerald":$class="rose";
                                 @endphp

                                <span class="inline-flex items-center rounded-full bg-{{$class}}-100 text-{{$class}}-800 dark:bg-{{$class}}-900 dark:text-{{$class}}-300  px-2 py-0.5 text-xs font-semibold">
                                        {{ $discount->is_active ? 'فعال' : 'غیر فعال' }}
                                </span>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center gap-2 self-start lg:self-auto">
                                <a href="{{ route('shop.admin.discounts.edit',$discount->id) }}" class="p-2 sm:p-3 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-colors duration-200" title="ویرایش">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('shop.admin.discounts.destroy',$discount->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$discount->id}}">@csrf @method('delete')
                                    <button  class="p-2 sm:p-3 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-colors duration-200" title="حذف">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </div>

                        <!-- Dates row -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                            <div class="rounded-lg border border-gray-200 dark:border-slate-800 p-3">
                                <div class="text-xs text-slate-500 dark:text-slate-400 mb-1">شروع</div>
                                <div class="text-sm">{{ !is_null($discount->start_at) ? \Morilog\Jalali\Jalalian::forge($discount->start_at)->ago():'' }}</div>
                            </div>
                            <div class="rounded-lg border border-gray-200 dark:border-slate-800 p-3">
                                <div class="text-xs text-slate-500 dark:text-slate-400 mb-1">پایان</div>
                                <div class="text-sm">{{ !is_null($discount->end_at) ? \Morilog\Jalali\Jalalian::forge($discount->end_at):'' }}</div>
                            </div>
                            <div class="rounded-lg border border-gray-200 dark:border-slate-800 p-3">
                                <div class="text-xs text-slate-500 dark:text-slate-400 mb-1">ایجاد</div>
                                <div class="text-sm">{{ \Morilog\Jalali\Jalalian::forge($discount->created_at) }}</div>
                            </div>
                            <div class="rounded-lg border border-gray-200 dark:border-slate-800 p-3">
                                <div class="text-xs text-slate-500 dark:text-slate-400 mb-1">به‌روزرسانی</div>
                                <div class="text-sm">{{ \Morilog\Jalali\Jalalian::forge($discount->updated_at) }}</div>
                            </div>
                        </div>
                    </div>
                </article>

            @endforeach
     </section>


    </div>
</div>
</div>
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script>

        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'حذف تخفیف',
                text: 'آیا مطمئن هستید که می‌خواهید این تخفیف را حذف کنید؟',
                icon: 'warning',
                showCancelButton: true,

                confirmButtonText: 'بله، حذف کن',
                cancelButtonText: 'لغو'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
            return false;
        }
    </script>
@endpush
@endsection

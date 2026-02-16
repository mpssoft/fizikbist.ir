@extends('layouts.admin.master')
@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-6xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <a href="/admin/licenses" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">لایسنس ها</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">نمایش لایسنس</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-violet-600 to-purple-600 shadow-lg flex items-center justify-center">
                        <i class="fas fa-key text-white text-2xl"></i>
                    </div>
                    <div class="min-w-0">
                        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-white truncate">اطلاعات لایسنس</h1>
                        <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">
                            <span class="px-2.5 py-1 rounded-full font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-200">فعال</span>
                            <span class="px-2.5 py-1 rounded-full font-medium bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200">SpotPlayer</span>
                            <time class="text-gray-500 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($license->created_at)->format(' Y/m/d H:i')}}</time>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{route('admin.licenses.index')}}"
                       class="px-4 py-2 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        بازگشت
                    </a>
                    <a href="{{route('admin.licenses.edit',$license->id)}}"
                       class="px-4 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold hover:from-blue-700 hover:to-indigo-700 transition">
                        ویرایش
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- License Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- User Information -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="p-6 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center font-bold">👤</div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">اطلاعات کاربر</h2>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-4">

                        <div>
                            <div class="text-lg font-semibold text-gray-900 dark:text-white">{{$license->user->name}}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 ltr:font-mono">{{$license->user->mobile}}</div>

                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">اطلاعات تماس</div>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-300">تلفن:</span>
                                <span class="text-gray-900 dark:text-white ltr:font-mono">{{$license->user->mobile}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-300">تاریخ عضویت:</span>
                                <span class="text-gray-900 dark:text-white">{{ $license->user->created_at ? \Morilog\Jalali\Jalalian::forge($license->user->created_at)->ago():'?' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Information -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="p-6 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center font-bold">🛒</div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">اطلاعات سفارش</h2>
                </div>

                <div class="space-y-4">
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">شماره سفارش</div>
                        <div class="text-lg font-semibold text-gray-900 dark:text-white">{{$license->order->payments()->where('status','paid')->first()->transaction_id ?? ""}}</div>
                    </div>

                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-300">وضعیت سفارش:</span>
                            <span class="px-2 py-1 rounded-full bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-200 text-xs font-medium">تکمیل شده</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-300">مبلغ:</span>
                            <span class="text-gray-900 dark:text-white font-semibold">{{number_format($license->order->price)}} تومان</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-300">تاریخ سفارش:</span>
                            <span class="text-gray-900 dark:text-white">{{\Morilog\Jalali\Jalalian::forge($license->order->created_at)}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-300">روش پرداخت:</span>
                            <span class="text-gray-900 dark:text-white">{{$license->order->payments()->where('status','paid')->first()->gateway ?? ""}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Information -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
            <div class="p-6 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 text-white flex items-center justify-center font-bold">📚</div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">اطلاعات دوره</h2>
                </div>

                <div class="space-y-4">
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                        <div class="text-lg font-semibold text-gray-900 dark:text-white mb-2"> {{$license->course->title}}</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">   پایه : {{$license->course->grade->name}}</div>
                    </div>

                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-300">مدرس:</span>
                            <span class="text-gray-900 dark:text-white"> {{ $license->course->teacher->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-300">مدت دوره:</span>
                            <span class="text-gray-900 dark:text-white">{{$license->course->time}} ساعت</span>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SpotPlayer Information -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8 space-y-8">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 to-pink-600 text-white flex items-center justify-center font-bold">🎬</div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">اطلاعات SpotPlayer</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">جزئیات مجوز و دسترسی ویدیو</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- SpotPlayer Details -->
                <div class="space-y-6 col-span-2">
                    <div class="space-y-4">
                        <div dir="ltr" class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">SpotPlayer ID</div>
                            <div class="text-lg font-mono text-gray-900 dark:text-white">{{$license->spotplayer_id}}</div>
                        </div>

                        <div dir="ltr" class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">License Key</div>
                            <div class="text-sm font-mono text-gray-900 dark:text-white break-all">
                                {{$license->spotplayer_key}}</div>
                            <button onclick="copyToClipboard('{{$license->spotplayer_key}}')"
                                    class="mt-2 px-3 py-1 text-xs rounded-lg border-2 border-indigo-200 text-indigo-700 hover:bg-indigo-50 transition">
                                <i class="fas fa-copy ml-1"></i>
                                کپی
                            </button>
                        </div>

                        <div dir="ltr" class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Video URL</div>
                            <div class="text-sm text-blue-600 dark:text-blue-400 break-all">
                                {{$license->spotplayer_url}}
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


</div>


</div>
@endsection
@push('scripts')
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Show a temporary success message
                const button = event.target.closest('button');
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check ml-1"></i>کپی شد!';
                button.classList.add('bg-emerald-50', 'border-emerald-200', 'text-emerald-700');

                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('bg-emerald-50', 'border-emerald-200', 'text-emerald-700');
                }, 2000);
            });
        }

        function toggleJsonView() {
            const viewer = document.getElementById('jsonViewer');
            if (viewer.style.display === 'none') {
                viewer.style.display = 'block';
            } else {
                viewer.style.display = 'none';
            }
        }
    </script>
@endpush

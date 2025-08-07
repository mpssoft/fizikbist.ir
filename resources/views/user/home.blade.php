@extends('layouts.user.master')

@section('content')
    <!-- Stats Section -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
        <div class="p-4 bg-white dark:bg-slate-800 rounded-lg shadow">۰ امتیاز</div>
        <div class="p-4 bg-white dark:bg-slate-800 rounded-lg shadow">۸ دوره در حال یادگیری</div>
        <div class="p-4 bg-white dark:bg-slate-800 rounded-lg shadow">۰ دوره کامل شده</div>
        <div class="p-4 bg-white dark:bg-slate-800 rounded-lg shadow">مجموع کل: ۲۷:۳۹:۵۰</div>
    </section>

    <!-- Filter Tabs -->
    <section class="px-4">
        <div class="flex flex-wrap gap-2 mb-4">
            <button class="bg-white shadow dark:bg-slate-800 bg-slate-800 px-4 py-2 rounded-xl">دوره جاری</button>
            <button class="bg-white shadow dark:bg-slate-800 bg-slate-800 px-4 py-2 rounded-xl">خریداری شده</button>
            <button class="bg-white shadow dark:bg-slate-800 bg-slate-800 px-4 py-2 rounded-xl">گذرانده شده</button>
            <button class="bg-white shadow dark:bg-slate-800 bg-slate-800 px-4 py-2 rounded-xl">غیرفعال</button>
        </div>
    </section>

    <!-- Course Cards -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 px-4 pb-6">
        <div class="p-4 bg-white dark:bg-slate-800 rounded-lg shadow">
            <div class="bg-white w-full h-40 dark:bg-slate-800  bg-slate-600 rounded mb-2"></div>
            <p class="text-sm">آشنایی با پکیج scout</p>
        </div>
        <div class="p-4 bg-white dark:bg-slate-800 rounded-lg shadow">
            <div class="bg-white w-full h-40 dark:bg-slate-800  bg-slate-600 rounded mb-2"></div>
            <p class="text-sm">آموزش Livewire</p>
        </div>
        <div class="p-4 bg-white dark:bg-slate-800 rounded-lg shadow">
            <div class="bg-white w-full h-40 dark:bg-slate-800  bg-slate-600 rounded mb-2"></div>
            <p class="text-sm">ساخت API با GraphQL</p>
        </div>
    </section>
@endsection

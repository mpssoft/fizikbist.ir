@extends('layouts.admin.master')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-sky-50 to-indigo-50 dark:from-slate-900 dark:to-slate-950 text-slate-900 dark:text-slate-100">
<!-- Header in a box -->
<header class="max-w-6xl mx-auto px-4 sm:px-6 pt-8">
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 p-5 sm:p-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-xl bg-sky-600 text-white flex items-center justify-center shadow-md">
            <i class="fa-solid fa-images"></i>
          </span>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">فهرست اسپلش‌ها</h1>
                    <p class="text-sm text-slate-600 dark:text-slate-400">مدیریت: عنوان، تصویر، لینک، و وضعیت فعال (0/1)</p>
                </div>
            </div>
            <a href="#create-splash" id="addNewBtn"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl font-bold bg-sky-600 hover:bg-sky-700 text-white shadow transition">
                <i class="fa-solid fa-plus"></i>
                افزودن اسپلش
            </a>
        </div>


    </div>
</header>

<main class="max-w-6xl mx-auto px-4 sm:px-6 py-8">
    <!-- Grid -->
    <section class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($splashes as $splash)
            <div class="rounded-2xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-sm overflow-hidden">
                <div class="relative">
                    @php
                        $bg = $splash->image ? "background-image: url('".e($splash->image)."');" : '';
                    @endphp
                    <div class="w-full h-40 bg-slate-200 dark:bg-slate-800 bg-center bg-cover" style="{{ $bg }}"></div>
                </div>

                <div class="p-4 space-y-3">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-bold leading-snug line-clamp-2">
                            {{ $splash->title }}
                        </h3>
                        @php $isActive = (int)($splash->active) === 1; @endphp
                        <span class="inline-flex items-center gap-2 px-2.5 py-1.5 rounded-lg font-bold text-xs
                       {{ $isActive ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/20 dark:text-emerald-200' : 'bg-rose-100 text-rose-800 dark:bg-rose-900/20 dark:text-rose-200' }}">
            <span class="w-2 h-2 rounded-full {{ $isActive ? 'bg-emerald-600' : 'bg-rose-600' }}"></span>
            {{ $isActive ? 'فعال' : 'غیر فعال' }}
          </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-link text-slate-500"></i>
                        @if(!empty($splash->link))
                            <a href="{{ $splash->link }}" target="_blank" rel="noopener"
                               class="text-sky-700 dark:text-sky-300 hover:underline truncate">
                                {{ $splash->link }}
                            </a>
                        @else
                            <span class="text-slate-400">بدون لینک</span>
                        @endif
                    </div>

                    <div class="flex items-center gap-2 pt-1">

                        <a href="{{ route('admin.splashes.edit', $splash) }}"
                           class="inline-flex items-center gap-2 px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                            <i class="fa-solid fa-pen"></i>
                            ویرایش
                        </a>

                        <form action="{{ route('admin.splashes.destroy',$splash->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$splash->id}}">@csrf @method('delete')
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-2 px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                                <i class="fa-solid fa-trash text-rose-600"></i>
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="rounded-2xl border border-dashed border-slate-300 dark:border-slate-700 p-10 text-center">
                    <p class="text-slate-600 dark:text-slate-400">هیچ اسپلشی ثبت نشده است.</p>
                    <a href="{{ route('splashes.create') }}" class="mt-3 inline-flex items-center gap-2 px-4 py-2 rounded-xl font-bold bg-sky-600 hover:bg-sky-700 text-white shadow transition">
                        <i class="fa-solid fa-plus"></i>
                        ایجاد اولین اسپلش
                    </a>
                </div>
            </div>
        @endforelse
    </section>
    <!-- Toast -->
    <div id="toast" class="fixed bottom-5 right-5 z-50 hidden px-4 py-3 rounded-xl border text-sm shadow-lg"></div>
</main>
</div>

@endsection
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script>

        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'حذف اسپلش',
                text: 'آیا مطمئن هستید که می‌خواهید این اسپلش را حذف کنید؟',
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

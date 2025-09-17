@extends('layouts.admin.master')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-sky-50 via-indigo-50 to-fuchsia-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 text-slate-900 dark:text-slate-100">

<!-- Header in a box -->
<header class="max-w-6xl mx-auto px-4 sm:px-6 pt-8">
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 p-5 sm:p-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center shadow-md">
            <!-- Film icon -->
            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current" aria-hidden="true"><path d="M4 4h4v4H4V4zm6 0h4v4h-4V4zm6 0h4v4h-4V4zM4 10h16v10H4V10z"/></svg>
          </span>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">فهرست موشن‌ها</h1>
                    <p class="text-sm text-slate-600 dark:text-slate-400">بدون جدول و بدون جاوااسکریپت</p>
                </div>
            </div>
            <a href="{{route('admin.motions.create')}}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl font-bold bg-indigo-600 hover:bg-indigo-700 text-white shadow transition">
                <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current" aria-hidden="true"><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
                افزودن موشن
            </a>
        </div>
    </div>
</header>

<main class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

    <!-- Card Grid (no table) -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
@foreach($motions as $motion)
        <!-- Motion Card 1 (Sample) -->
        <article class="rounded-2xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-sm overflow-hidden">
            <!-- Visual placeholder for video -->
            <div class="relative aspect-video bg-gradient-to-br from-indigo-600 to-sky-600">
                <!-- Decorative film strip -->

                <video
                    class=" inset-0 w-full h-full object-contain"
                    muted
                    loop
                    playsinline
                    aria-label="Background motion graphics video"
                    controls
                >
                    <!-- Replace with your preferred Vecteezy video if desired -->
                    <source src="{{$motion->video_url}}" type="video/mp4">

                </video>

            </div>

            <div class="p-4 space-y-3">
                <div class="flex items-start justify-between gap-3">
                    <h3 class="font-bold leading-snug line-clamp-2">{{$motion->title}}</h3>
                    @if($motion->active)
                    <span class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg text-sm font-bold bg-emerald-100 text-emerald-800 dark:bg-emerald-900/20 dark:text-emerald-200">
              <span class="w-2 h-2 rounded-full bg-emerald-600"></span> فعال
            </span>
                    @else
                        <span class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg text-sm font-bold bg-rose-100 text-rose-800 dark:bg-rose-900/20 dark:text-rose-200">
              <span class="w-2 h-2 rounded-full bg-rose-600"></span> غیر فعال
            </span>
                    @endif
                </div>

                <p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-3">
                    {{$motion->description}}
                </p>

                <div class="flex items-center gap-2">
                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-slate-500 fill-current" aria-hidden="true"><path d="M3.9 12a8.1 8.1 0 1 0 16.2 0 8.1 8.1 0 0 0-16.2 0zm9.6-3.6v7.2L8.7 12l4.8-3.6z"/></svg>
                    <a href="{{$motion->video_url}}" target="_blank" rel="noopener"
                       class="text-indigo-700 dark:text-indigo-300 hover:underline truncate">{{$motion->video_url}}</a>
                </div>
                <div class="flex items-center gap-2 pt-1">

                    <a href="{{ route('admin.motions.edit', $motion) }}"
                       class="inline-flex items-center gap-2 px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        <i class="fa-solid fa-pen"></i>
                        ویرایش
                    </a>

                    <form action="{{ route('admin.motions.destroy',$motion->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$motion->id}}">@csrf @method('delete')
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
        </article>
        @endforeach
        <!-- Empty state example (show this when you have no items) -->
        <!--
        <div class="col-span-full">
          <div class="rounded-2xl border border-dashed border-slate-300 dark:border-slate-700 p-10 text-center">
            <p class="text-slate-600 dark:text-slate-400">هیچ موشنی ثبت نشده است.</p>
            <a href="create-motion.html" class="mt-3 inline-flex items-center gap-2 px-4 py-2 rounded-xl font-bold bg-indigo-600 hover:bg-indigo-700 text-white shadow transition">
              <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current"><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg>
              ایجاد اولین موشن
            </a>
          </div>
        </div>
        -->

    </section>
</main>
</div>
@endsection
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script>

        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'حذف موشن گرافیک',
                text: 'آیا مطمئن هستید که می‌خواهید این موشن گرافیک را حذف کنید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor:'red',
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

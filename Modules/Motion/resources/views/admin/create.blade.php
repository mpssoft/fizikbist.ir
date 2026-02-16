@extends('layouts.admin.master')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-sky-50 to-cyan-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 text-slate-900 dark:text-slate-100">

<!-- Header in a box -->
<header class="max-w-5xl mx-auto px-4 sm:px-6 pt-8">
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 p-5 sm:p-6">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center shadow-md">
            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M8 5v14l11-7z"/></svg>
          </span>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">افزودن موشن گرافیک </h1>
                    <p class="text-xs text-slate-600 dark:text-slate-400 mt-1">در صفحه اصلی و بالاتر از اسلایدر دیده خواهد شد</p>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    @include('layouts.errors')
    <div class=" gap-8 items-start">
        <!-- Form Card -->
        <section class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-800">
                <h2 class="text-xl font-bold flex items-center gap-2">
            <span class="inline-flex w-8 h-8 items-center justify-center rounded-lg bg-indigo-600 text-white">
              <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current"><path d="M3 5h18v2H3V5zm0 6h18v2H3v-2zm0 6h18v2H3v-2z"/></svg>
            </span>
                    اطلاعات ویدئو
                </h2>

            </div>

            <form id="filmForm" class="px-6 py-6 space-y-6" action="{{route('admin.motions.store')}}" method="post">
                @csrf
                <!-- Title -->
                <div>
                    <label for="title" class="block font-semibold mb-2">عنوان </label>
                    <input id="title" name="title" type="text" required
                           placeholder="مثلاً: حرکت آهسته آبشار"
                           class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 px-4 py-3 text-slate-800 dark:text-slate-100 placeholder-slate-400">
                </div>

                <!-- video  Upload -->
                <div class="group">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                آدرس ویدیو
                            </span>
                    </label>
                    <!-- Image Upload -->
                    <div class="space-y-2">

                        <div id="dropZone"
                             class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center hover:border-purple-500 transition-colors duration-200 cursor-pointer">

                            <div class="flex items-stretch space-x-2 gap-2">
                                <input type="text" id="image_label" name="video_url" dir="ltr"
                                       class="flex-1 px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600
                  bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100
                  focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                                       placeholder="http://fizikbist/">

                                <button type="button" id="button-image"
                                        class=" py-2 rounded-md border  border-gray-300 dark:border-gray-600
                   bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100
                   hover:bg-gray-200 dark:hover:bg-gray-700
                   focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
                                    Select
                                </button>
                            </div>

                        </div>

                    </div>
                    @error('video_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="block font-semibold mb-2">توضیحات</label>
                    <textarea id="description" name="description" rows="4"
                              placeholder="توضیح کوتاهی درباره ویدئو بنویسید..."
                              class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 px-4 py-3 text-slate-800 dark:text-slate-100 placeholder-slate-400"></textarea>
                </div>

                <!-- Active as Select -->
                <div>
                    <label for="active" class="block font-semibold mb-2">وضعیت</label>
                    <select id="active" name="active" class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 px-4 py-3">
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl font-bold bg-indigo-600 hover:bg-indigo-700 text-white shadow-md transition">
                       <span class="fas fa-check"></span>
                        ذخیره
                    </button>
                </div>


            </form>
        </section>


    </div>
</main>
</div>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }


    </script>
@endpush

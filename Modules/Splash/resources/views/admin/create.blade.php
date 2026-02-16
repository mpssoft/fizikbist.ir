@extends('layouts.admin.master')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-950 text-slate-900 dark:text-slate-100">



<main class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    <header class="bg-white mb-5 dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-5 flex items-center justify-between">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">ایجاد اسپلش جدید </h1>

        </div>
    </header>
    @include('layouts.errors')
    <div class="grid  gap-8 items-start">
        <!-- Form Card -->
        <section class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-800">
                <h2 class="text-xl font-bold flex items-center gap-2">
                    <i class="fa-solid fa-image text-blue-600"></i>
                    اطلاعات اسپلش
                </h2>
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">فقط تصویر و لینک نیاز است. متن در اسپلش نمایش داده نمی‌شود.</p>
            </div>

            <form id="splashForm" class="px-6 py-6 space-y-6" action="{{route('admin.splashes.store')}}" method="post">
                @csrf
                <!-- Splash Title -->
                <div class="group">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                عنوان اسپلش
                            </span>
                    </label>
                    <input type="text" name="title"
                           class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                      bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                      focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600
                                      focus:ring-4 focus:ring-blue-500/20 transition-all duration-200
                                      placeholder-gray-400 dark:placeholder-gray-500"
                           value="{{ old('title') }}"
                           placeholder="نام را وارد کنید..."
                           required>
                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <i class="fas w-5 h-5 fa-image"></i>
                                تصویر اسپلش
                            </span>
                    </label>
                    <div id="dropZone"
                         class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center hover:border-purple-500 transition-colors duration-200 cursor-pointer">

                        <div class="flex items-stretch space-x-2 gap-2">
                            <input type="text" id="image_label" name="image" dir="ltr"
                                   class="flex-1 px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600
                  bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100
                  focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                                   placeholder="Image">

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
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <!-- Link URL -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                     <span class="flex items-center gap-2">
                                <i class="fas fa-link w-5 h-5"></i>
                                لینک مقصد
                            </span>
                    </label>
                    <input id="linkUrl" name="link" type="text" dir="ltr"
                           placeholder="https://example.com/campaign"
                           class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 px-4 py-3 text-slate-800 dark:text-slate-100 placeholder-slate-400">
                    <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">با کلیک روی تصویر، کاربر به این آدرس هدایت می‌شود.</p>
                </div>
                <!-- Status  -->

                <div class="group">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center gap-2">
                                <i class="fas fa-charging-station w-5 h-5"></i>
                                وضعیت
                            </span>
                    </label>
                    <select name="active"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                       bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                       focus:border-purple-500 focus:bg-white dark:focus:bg-gray-600
                                       focus:ring-4 focus:ring-purple-500/20 transition-all duration-200">
                        <option value="">-- انتخاب وضعیت --</option>

                        <option value="1" >فعال</option>
                        <option value="0">غیر فعال</option>
                    </select>
                    @error('teacher_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl font-bold bg-blue-600 hover:bg-blue-700 text-white shadow-md transition">
                        <i class="fa-solid fa-floppy-disk"></i>
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

        function removeCamas() {
            $('.format_number').each(function (index, element) {
                $(this).val($(this).val().replace(/,/g, "")); // Remove existing commas
            });
        }
    </script>
@endpush


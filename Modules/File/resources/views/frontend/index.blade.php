@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<!-- Full Width Header -->
<div class="bg-gray-500 dark:bg-gray-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center text-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    <i class="fas fa-file-archive ml-4"></i>
                        فایل ها و جزوات آموزشی
                </h1>

                <p class="text-lg opacity-75">دانلود رایگان و خرید فایل‌های حرفه‌ای</p>
            </div>
            </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

  {{--  <!-- Categories Section -->
    <div class="mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-folder text-purple-600 dark:text-purple-400 ml-2"></i>
                دسته‌بندی فایل‌ها
            </h2>
            <div class="flex flex-wrap gap-3">
                <button class="bg-gradient-to-r from-purple-600 to-purple-700 text-white px-6 py-3 rounded-xl text-sm font-medium hover:from-purple-700 hover:to-purple-800 transition-all duration-300 shadow-lg">
                    <i class="fas fa-th-large ml-2 text-purple-200"></i>
                    همه فایل‌ها (156)
                </button>
                <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl text-sm font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-md">
                    <i class="fas fa-book ml-2 text-blue-200"></i>
                    کتاب‌های الکترونیکی (45)
                </button>
                <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-xl text-sm font-medium hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-md">
                    <i class="fas fa-file-alt ml-2 text-green-200"></i>
                    قالب‌ها (32)
                </button>
                <button class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-xl text-sm font-medium hover:from-orange-600 hover:to-orange-700 transition-all duration-300 shadow-md">
                    <i class="fas fa-map ml-2 text-orange-200"></i>
                    راهنماها (28)
                </button>
                <button class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-xl text-sm font-medium hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-md">
                    <i class="fas fa-graduation-cap ml-2 text-red-200"></i>
                    دوره‌ها (21)
                </button>
                <button class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white px-6 py-3 rounded-xl text-sm font-medium hover:from-indigo-600 hover:to-indigo-700 transition-all duration-300 shadow-md">
                    <i class="fas fa-tools ml-2 text-indigo-200"></i>
                    ابزارها (18)
                </button>
                <button class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-3 rounded-xl text-sm font-medium hover:from-teal-600 hover:to-teal-700 transition-all duration-300 shadow-md">
                    <i class="fas fa-laptop-code ml-2 text-teal-200"></i>
                    نرم‌افزار (12)
                </button>
            </div>
        </div>
    </div>--}}

    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Essential Software Sidebar -->
        <div class="lg:w-64">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 sticky top-8">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">
                    <i class="fas fa-tools text-blue-600 dark:text-blue-400 ml-2"></i>
                    نرم‌افزارهای ضروری
                </h3>
                <div class="space-y-3">
                    <a href="https://spotplayer.ir/#download" class="block bg-gray-50 dark:bg-gray-700 rounded-lg p-3 hover:shadow-md transition-all duration-300 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center ml-3">
                                <i class="fas fa-play text-white text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-sm text-gray-900 dark:text-white">Spot Player</h4>
                            </div>
                        </div>
                    </a>
                    <a href="https://www.google.com/chrome/" class="block bg-gray-50 dark:bg-gray-700 rounded-lg p-3 hover:shadow-md transition-all duration-300 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center ml-3">
                                <i class="fab fa-chrome text-white text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-sm text-gray-900 dark:text-white">Chrome</h4>
                            </div>
                        </div>
                    </a>
                    <a href="ttps://www.google.com/chrome/" class="block bg-gray-50 dark:bg-gray-700 rounded-lg p-3 hover:shadow-md transition-all duration-300 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-pink-500 rounded-lg flex items-center justify-center ml-3">
                                <i class="fas fa-file-pdf text-white text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-sm text-gray-900 dark:text-white">Adobe Reader</h4>
                            </div>
                        </div>
                    </a>
                    <a href="https://www.win-rar.com/download.html" class="block bg-gray-50 dark:bg-gray-700 rounded-lg p-3 hover:shadow-md transition-all duration-300 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center ml-3">
                                <i class="fas fa-file-archive text-white text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-sm text-gray-900 dark:text-white">WinRAR</h4>
                            </div>
                        </div>
                    </a>
                    <a href="ttps://www.google.com/chrome/" class="block bg-gray-50 dark:bg-gray-700 rounded-lg p-3 hover:shadow-md transition-all duration-300 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center ml-3">
                                <i class="fas fa-video text-white text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-sm text-gray-900 dark:text-white">VLC Player</h4>
                            </div>
                        </div>
                    </a>
                    <a href="ttps://www.google.com/chrome/" class="block bg-gray-50 dark:bg-gray-700 rounded-lg p-3 hover:shadow-md transition-all duration-300 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center ml-3">
                                <i class="fas fa-code text-white text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-sm text-gray-900 dark:text-white">Notepad++</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
{{--

        <!-- Filters Sidebar -->
        <div class="lg:w-80">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 sticky top-8">

                <!-- File Type -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        <i class="fas fa-file text-purple-600 dark:text-purple-400 ml-2"></i>
                        نوع فایل
                    </label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">PDF (67)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">Word (34)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">Excel (23)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">PowerPoint (18)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">ویدیو (14)</span>
                        </label>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        <i class="fas fa-dollar-sign text-purple-600 dark:text-purple-400 ml-2"></i>
                        محدوده قیمت
                    </label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="price_range" class="text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">رایگان (42)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="price_range" class="text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">تا 50,000 تومان (38)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="price_range" class="text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">50,000 - 100,000 تومان (45)</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="price_range" class="text-purple-600 focus:ring-purple-500 dark:bg-gray-700">
                            <span class="mr-3 text-sm">بیش از 100,000 تومان (31)</span>
                        </label>
                    </div>
                </div>

                <!-- Sort -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        <i class="fas fa-sort text-purple-600 dark:text-purple-400 ml-2"></i>
                        مرتب‌سازی
                    </label>
                    <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option>جدیدترین</option>
                        <option>محبوب‌ترین</option>
                        <option>پرفروش‌ترین</option>
                        <option>ارزان‌ترین</option>
                        <option>گران‌ترین</option>
                        <option>بیشترین دانلود</option>
                    </select>
                </div>

            </div>
        </div>
--}}

        <!-- Main Content -->
        <div class="flex-1">



            <!-- Files Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3  gap-6">
                @if(count($files) > 0)
                @foreach($files as $file)
                <!-- File Card 2 - Free -->
                <div class="bg-white flex flex-col dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-16 h-16   rounded-xl flex items-center overflow-hidden justify-center">
                            <i class="bg-gradient-to-br {{$file->icon}}  w-full h-full items-center p-5 text-white text-2xl"></i>
                        </div>
                        @if($file->access_type == 'free')
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                            رایگان
                        </div>
                        @else
                            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                {{number_format($file->price)}} تومان
                            </div>
                        @endif
                    </div>

                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2 line-clamp-2">
                        {{$file->title}}
                    </h3>

                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3">
                        {{$file->description}}
                    </p>
                    <div class="flex-1"></div>
                    <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400 mb-4">
                        <span><i class="fas fa-download ml-1"></i>{{$file->downloads}} دانلود</span>
                       {{-- <span><i class="fas fa-star ml-1 text-yellow-500"></i>4.6</span>
                        <span><i class="fas fa-hdd ml-1"></i>1.2 مگابایت</span>--}}
                    </div>
                    @if($file->access_type == 'free')
                    <div class="flex items-center gap-3">
                        <a href="{{URL::temporarySignedRoute('user.files.download',now()->addMinutes(30),['file' => $file->id])}}" class="flex-1 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-4 py-3 rounded-lg font-medium text-center transition-all duration-300 hover:-translate-y-0.5">
                            <i class="fas fa-download ml-2"></i>
                            دانلود رایگان
                        </a>

                    </div>
                    @else
                        <div class="flex items-center gap-3">
                            <button  id="btn-{{$file->id}}" onclick="addToCart('file','{{$file->id}}')"  class="flex-1 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-4 py-3 rounded-lg font-medium text-center transition-all duration-300 hover:-translate-y-0.5">
                                <i class="fas fa-cart-plus ml-2"></i>
                                افزودن به سبد
                                <span class="spinner-{{$file->id}}  hidden"><i class="fas fa-spinner fa-spin-pulse"></i></span>
                            </button>

                        </div>
                    @endif
                </div>
                @endforeach
                @else

                    <!-- No Files Found Section -->
                    <div id="no-files-section" class="col-span-3 h-full text-center  ">
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border  border-gray-200 dark:border-gray-700 p-12">
                            <div class="w-24 h-24 bg-gradient-to-br from-gray-400 to-gray-500 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-search text-white text-3xl"></i>
                            </div>
                            <h3 class=" font-bold text-gray-900 dark:text-white mb-4">
                                هیچ فایلی یافت نشد
                            </h3>

                        </div>
                    </div>

                @endif
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-center mt-12">
                {{$files->render()}}
            </div>

        </div>

    </div>
</div>

</div>
@endsection

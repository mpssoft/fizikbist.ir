@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<!-- Header -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="form-section text-white py-6 px-8 rounded-2xl shadow-lg mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">
                    <i class="fas fa-plus-circle ml-3"></i>
                    ویرایش فایل
                </h1>
                <p class="text-lg opacity-90">فایل خود را آپلود کرده و اطلاعات آن را تکمیل کنید</p>
            </div>
            <a href="/files" class="bg-white/20 text-white px-6 py-3 rounded-lg hover:bg-white/30 transition">
                <i class="fas fa-arrow-right ml-2"></i>
                بازگشت به لیست
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form id="file-form" class="space-y-8" action="{{route('admin.files.update',$file->id)}}" method="post">
        @csrf
        @method('put')
        <!-- File Upload Section -->
        <div class="form-section p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                    <i class="fas fa-cloud-upload-alt text-purple-600 ml-3"></i>
                    آپلود فایل
                </h2>
                <p class="text-gray-600 dark:text-gray-400">فایل مورد نظر خود را انتخاب کنید</p>
            </div>
            <div class="flex items-stretch space-x-2">
                <input type="text" id="image_label" name="file_path" value="{{old('file_path',$file->file_path)}}"
                       class="flex-1 px-4 py-2 rounded-l-md border border-gray-300 dark:border-gray-600
                  bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100
                  focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                       placeholder="File">

                <button type="button" id="button-image"
                        class="px-4 py-2 rounded-r-md border border-l-0 border-gray-300 dark:border-gray-600
                   bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100
                   hover:bg-gray-200 dark:hover:bg-gray-700
                   focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
                    Select
                </button>
            </div>
            <!-- File Type Selection (Auto-detected but editable) -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-file-alt text-purple-600 ml-2"></i>
                    نوع فایل
                </label>
                <select name="file_type" id="file-type" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-lg">
                    <option value="">انتخاب نوع فایل</option>
                    <option value="pdf"  {{$file->file_type=='pdf' ? 'selected':''}}>PDF</option>
                    <option value="word" {{$file->file_type=='word' ? 'selected':''}}>Word Document</option>
                    <option value="excel" {{$file->file_type=='excel' ? 'selected':''}}>Excel Spreadsheet</option>
                    <option value="powerpoint" {{$file->file_type=='powerpoint' ? 'selected':''}}>PowerPoint Presentation</option>
                    <option value="image" {{$file->file_type=='image' ? 'selected':''}}>تصویر</option>
                    <option value="video" {{$file->file_type=='video' ? 'selected':''}}>ویدیو</option>
                    <option value="audio" {{$file->file_type=='audio' ? 'selected':''}}>فایل صوتی</option>
                    <option value="archive" {{$file->file_type=='archive' ? 'selected':''}}>فایل فشرده</option>
                    <option value="other" {{$file->file_type=='other' ? 'selected':''}}>سایر</option>
                </select>
                <div class="error-message hidden text-red-500 text-sm mt-2"></div>
            </div>
        </div>
        <!-- Icon Selection Section -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">
                <i class="fas fa-icons text-purple-600 ml-2"></i>
                انتخاب آیکون فایل
            </label>

            <!-- Selected Icon Preview -->
            <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl">
                <div class="flex items-center gap-3">
                    <div id="selected-icon-preview" class="w-8 h-8 bg-gradient-to-br from-gray-400 to-gray-500 rounded-lg flex items-center justify-center">
                        <i class="{{$file->icon}} text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="text-sm  text-gray-600 dark:text-gray-400">آیکون انتخاب شده:</span>
                        <span id="selected-icon-name" class="font-medium text-gray-900 dark:text-white mr-2"> </span>
                    </div>
                </div>
            </div>

            <!-- Icon Grid -->
            <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 gap-3">

                <!-- PDF Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-pdf" data-color="from-red-500 to-red-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-pdf text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">PDF</span>
                </div>

                <!-- Word Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-word" data-color="from-blue-500 to-blue-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-word text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">Word</span>
                </div>

                <!-- Excel Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-excel" data-color="from-green-500 to-green-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-excel text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">Excel</span>
                </div>

                <!-- PowerPoint Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-powerpoint" data-color="from-orange-500 to-red-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-powerpoint text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">PowerPoint</span>
                </div>

                <!-- Image Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-image" data-color="from-purple-500 to-pink-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-image text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">تصویر</span>
                </div>

                <!-- Video Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-video" data-color="from-indigo-500 to-purple-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-video text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">ویدیو</span>
                </div>

                <!-- Audio Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-audio" data-color="from-pink-500 to-rose-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-audio text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">صوتی</span>
                </div>

                <!-- Archive Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-archive" data-color="from-gray-500 to-gray-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-archive text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">آرشیو</span>
                </div>

                <!-- Code Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-code" data-color="from-teal-500 to-cyan-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-code text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">کد</span>
                </div>

                <!-- Text Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file-alt" data-color="from-yellow-500 to-orange-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-alt text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">متن</span>
                </div>

                <!-- Book Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-book" data-color="from-amber-500 to-orange-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-amber-500 to-orange-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-book text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">کتاب</span>
                </div>

                <!-- Music Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-music" data-color="from-rose-500 to-pink-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-rose-500 to-pink-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-music text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">موسیقی</span>
                </div>

                <!-- Camera Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-camera" data-color="from-violet-500 to-purple-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-camera text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">دوربین</span>
                </div>

                <!-- Play Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-play-circle" data-color="from-emerald-500 to-teal-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-play-circle text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">پخش</span>
                </div>

                <!-- Download Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-download" data-color="from-sky-500 to-blue-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-sky-500 to-blue-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-download text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">دانلود</span>
                </div>

                <!-- Tools Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-tools" data-color="from-slate-500 to-gray-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-slate-500 to-gray-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-tools text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">ابزار</span>
                </div>

                <!-- Cog Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-cog" data-color="from-neutral-500 to-stone-600">
                    <div class="w-8 h-8 bg-gradient-to-br from-neutral-500 to-stone-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-cog text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">تنظیمات</span>
                </div>

                <!-- Star Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-star" data-color="from-yellow-400 to-amber-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-star text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">ستاره</span>
                </div>

                <!-- Heart Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-heart" data-color="from-red-400 to-rose-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-red-400 to-rose-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-heart text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">قلب</span>
                </div>

                <!-- Default File Icons -->
                <div class="icon-option border-2 border-gray-200 dark:border-gray-600 rounded-lg p-3 text-center cursor-pointer hover:border-purple-300 transition" data-icon="fas fa-file" data-color="from-gray-400 to-gray-500">
                    <div class="w-8 h-8 bg-gradient-to-br from-gray-400 to-gray-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file text-white text-sm"></i>
                    </div>
                    <span class="text-xs text-gray-600 dark:text-gray-400">فایل عمومی</span>
                </div>

            </div>

            <!-- Hidden inputs for icon data -->
            <input type="hidden" name="icon" id="file-icon-input" value="{{$file->icon}}">
            <input type="hidden" name="color" id="icon-color-input" value="from-gray-400 to-gray-500">

            <div class="error-message hidden text-red-500 text-sm mt-2"></div>
            <p class="text-gray-500 text-sm mt-3">آیکون انتخاب شده در کنار فایل شما نمایش داده می‌شود</p>
        </div>
        <!-- Basic Information Section -->
        <div class="form-section p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                    <i class="fas fa-info-circle text-purple-600 ml-3"></i>
                    اطلاعات پایه
                </h2>
                <p class="text-gray-600 dark:text-gray-400">عنوان و توضیحات فایل را وارد کنید</p>
            </div>

            <div class="grid grid-cols-1 gap-6">

                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        <i class="fas fa-heading text-purple-600 ml-2"></i>
                        عنوان فایل <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="title" value="{{old('title',$file->title)}}"
                           id="title"
                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-lg"
                           placeholder="عنوان جذاب و توصیفی برای فایل خود وارد کنید"
                           required>
                    <div class="error-message hidden text-red-500 text-sm mt-2"></div>
                    <p class="text-gray-500 text-sm mt-2">این عنوان برای کاربران نمایش داده می‌شود</p>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                        <i class="fas fa-align-left text-purple-600 ml-2"></i>
                        توضیحات <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description"
                              id="description"
                              rows="5"
                              class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-lg resize-none"
                              placeholder="توضیحات کاملی از محتوای فایل، کاربرد آن و مزایایی که برای کاربران دارد ارائه دهید..."
                              required>{{old('description',$file->description)}}</textarea>
                    <div class="error-message hidden text-red-500 text-sm mt-2"></div>
                    <div class="flex justify-between items-center mt-2">
                        <p class="text-gray-500 text-sm">حداقل 50 کاراکتر توضیح وارد کنید</p>
                        <span id="char-count" class="text-sm text-gray-400">0 کاراکتر</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Category Selection -->
        <div class="form-section p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                    <i class="fas fa-folder text-purple-600 ml-3"></i>
                    دسته‌بندی
                </h2>
                <p class="text-gray-600 dark:text-gray-400">دسته‌بندی مناسب برای فایل خود انتخاب کنید</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                <div class="category-card border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 text-center" data-category="ebooks">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-book text-white"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-white text-sm">کتاب‌های الکترونیکی</h4>
                </div>

                <div class="category-card border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 text-center" data-category="templates">
                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-white text-sm">قالب‌ها</h4>
                </div>

                <div class="category-card border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 text-center" data-category="guides">
                    <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-map text-white"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-white text-sm">راهنماها</h4>
                </div>

                <div class="category-card border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 text-center" data-category="courses">
                    <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-white text-sm">دوره‌ها</h4>
                </div>

                <div class="category-card border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 text-center" data-category="tools">
                    <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-tools text-white"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-white text-sm">ابزارها</h4>
                </div>

                <div class="category-card border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 text-center" data-category="resources">
                    <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-database text-white"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-white text-sm">منابع</h4>
                </div>

                <div class="category-card border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 text-center" data-category="software">
                    <div class="w-12 h-12 bg-pink-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-laptop-code text-white"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-white text-sm">نرم‌افزار</h4>
                </div>

                <div class="category-card border-2 border-gray-200 dark:border-gray-600 rounded-xl p-4 text-center" data-category="other">
                    <div class="w-12 h-12 bg-gray-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-ellipsis-h text-white"></i>
                    </div>
                    <h4 class="font-medium text-gray-900 dark:text-white text-sm">سایر</h4>
                </div>

            </div>

            <input type="hidden" name="category" id="category-input" value="{{old('category',$file->category)}}">
            <div class="error-message hidden text-red-500 text-sm mt-4"></div>
        </div>

        <!-- Access & Pricing Section -->
        <div class="form-section p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                    <i class="fas fa-dollar-sign text-purple-600 ml-3"></i>
                    دسترسی و قیمت‌گذاری
                </h2>
                <p class="text-gray-600 dark:text-gray-400">نوع دسترسی و قیمت فایل را تعیین کنید</p>
            </div>

            <!-- Access Type -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">
                    <i class="fas fa-key text-purple-600 ml-2"></i>
                    نوع دسترسی <span class="text-red-500">*</span>
                </label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Free Access -->
                    <label class="access-option relative flex items-center p-6 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer hover:border-purple-300 transition">
                        <input type="radio" name="access_type" value="free" {{$file->access_type == 'free'? 'checked':''}} class="sr-only" required>
                        <div class="flex items-center w-full">
                            <div class="w-6 h-6 border-2 border-purple-600 rounded-full ml-4 flex items-center justify-center">
                                <div class="w-3 h-3 bg-transparent rounded-full transition"></div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fas fa-gift text-2xl text-green-500"></i>
                                    <div>
                                        <div class="font-bold text-lg text-gray-900 dark:text-white">رایگان</div>
                                        <div class="text-sm text-gray-500">دسترسی آزاد برای همه کاربران</div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                    <li><i class="fas fa-check text-green-500 ml-2"></i>دانلود بدون محدودیت</li>
                                    <li><i class="fas fa-check text-green-500 ml-2"></i>افزایش محبوبیت</li>
                                    <li><i class="fas fa-check text-green-500 ml-2"></i>جذب مخاطب بیشتر</li>
                                </ul>
                            </div>
                        </div>
                    </label>

                    <!-- Paid Access -->
                    <label class="access-option relative flex items-center p-6 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer hover:border-purple-300 transition">
                        <input type="radio" name="access_type" {{$file->access_type == 'paid'? 'checked':''}} value="paid" class="sr-only" required>
                        <div class="flex items-center w-full">
                            <div class="w-6 h-6 border-2 border-purple-600 rounded-full ml-4 flex items-center justify-center">
                                <div class="w-3 h-3 bg-transparent rounded-full transition"></div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fas fa-dollar-sign text-2xl text-purple-500"></i>
                                    <div>
                                        <div class="font-bold text-lg text-gray-900 dark:text-white">پولی</div>
                                        <div class="text-sm text-gray-500">نیاز به خرید برای دسترسی</div>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                    <li><i class="fas fa-check text-green-500 ml-2"></i>کسب درآمد</li>
                                    <li><i class="fas fa-check text-green-500 ml-2"></i>کنترل دسترسی</li>
                                    <li><i class="fas fa-check text-green-500 ml-2"></i>ارزش بیشتر محتوا</li>
                                </ul>
                            </div>
                        </div>
                    </label>

                </div>
                <div class="error-message hidden text-red-500 text-sm mt-2"></div>
            </div>

            <!-- Price Input (Hidden by default) -->
            <div id="price-section" class="{{$file->access_type=="free" ? 'hidden':''}}">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-tag text-purple-600 ml-2"></i>
                    قیمت (تومان) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="text"
                           name="price" value="{{old('price',$file->price)}}"
                           id="price"
                           min="1000"
                           step="1000"
                           class="w-full px-4 py-3 pr-16 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-lg"
                           placeholder="مثال: 50000">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 text-lg">تومان</span>
                    </div>
                </div>
                <div class="error-message hidden text-red-500 text-sm mt-2"></div>

            </div>
        </div>

        <!-- Status Section -->
        <div class="form-section p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                    <i class="fas fa-toggle-on text-purple-600 ml-3"></i>
                    وضعیت انتشار
                </h2>
                <p class="text-gray-600 dark:text-gray-400">وضعیت فایل پس از ایجاد را تعیین کنید</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Active Status -->
                <label class="status-option relative flex items-center p-6 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer hover:border-purple-300 transition">
                    <input type="radio" name="state" value="active" class="sr-only" {{$file->state == 'active'? 'checked':''}} required>
                    <div class="flex items-center w-full">
                        <div class="w-6 h-6 border-2 border-purple-600 rounded-full ml-4 flex items-center justify-center">
                            <div class="w-3 h-3 bg-purple-600 rounded-full transition"></div>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fas fa-eye text-3xl text-green-500"></i>
                            <div>
                                <div class="font-bold text-lg text-gray-900 dark:text-white">فعال</div>
                                <div class="text-sm text-gray-500">فایل بلافاصله برای کاربران قابل مشاهده باشد</div>
                            </div>
                        </div>
                    </div>
                </label>

                <!-- Inactive Status -->
                <label class="status-option relative flex items-center p-6 border-2 border-gray-200 dark:border-gray-600 rounded-xl cursor-pointer hover:border-purple-300 transition">
                    <input type="radio" name="state" value="inactive" class="sr-only" {{$file->state == 'inactive'? 'checked':''}} required>
                    <div class="flex items-center w-full">
                        <div class="w-6 h-6 border-2 border-purple-600 rounded-full ml-4 flex items-center justify-center">
                            <div class="w-3 h-3 bg-transparent rounded-full transition"></div>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fas fa-eye-slash text-3xl text-orange-500"></i>
                            <div>
                                <div class="font-bold text-lg text-gray-900 dark:text-white">غیرفعال</div>
                                <div class="text-sm text-gray-500">فایل پنهان باشد و بعداً فعال شود</div>
                            </div>
                        </div>
                    </div>
                </label>

            </div>
            <div class="error-message hidden text-red-500 text-sm mt-2"></div>
        </div>

        <!-- Form Actions -->
        <div class="form-section p-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6">


                <div class="flex items-center gap-4">
                    <a href="{{route('admin.files.index')}}" class="px-8 py-4 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition font-medium text-lg">
                        <i class="fas fa-times ml-2"></i>
                        انصراف
                    </a>

                    <button type="submit" class="px-8 py-4 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition font-medium text-lg">
                        <i class="fas fa-check ml-2"></i>
                        ثبت تغییرات
                    </button>
                </div>

            </div>
        </div>

    </form>
</div>

</div>

<style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .drag-drop-area {
            border: 2px dashed #d1d5db;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #f9fafb 25%, transparent 25%),
            linear-gradient(-45deg, #f9fafb 25%, transparent 25%),
            linear-gradient(45deg, transparent 75%, #f9fafb 75%),
            linear-gradient(-45deg, transparent 75%, #f9fafb 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }
        .drag-drop-area.dragover {
            border-color: #8b5cf6;
            background-color: #f3f4f6;
            transform: scale(1.02);
        }
        .file-preview {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .form-section {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }
        .dark .form-section {
            background: #1f2937;
            border-color: #374151;
        }
        .field-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }
        .success-animation {
            animation: successPulse 0.6s ease-in-out;
        }
        @keyframes successPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .upload-progress {
            transition: width 0.3s ease;
        }
        .file-type-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        .category-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .category-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .category-card.selected {
            border-color: #8b5cf6;
            background-color: #f3f4f6;
        }
    </style>
@endsection
@push('scripts')
<script>
    // Form elements



    const uploadPlaceholder = document.getElementById('upload-placeholder');
    const filePreview = document.getElementById('file-preview');
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const charCount = document.getElementById('char-count');
    const categoryInput = document.getElementById('category-input');
    const priceSection = document.getElementById('price-section');

    // File type icons mapping
    const fileTypeIcons = {
        'pdf': { icon: 'fas fa-file-pdf', color: 'from-red-500 to-red-600' },
        'word': { icon: 'fas fa-file-word', color: 'from-blue-500 to-blue-600' },
        'excel': { icon: 'fas fa-file-excel', color: 'from-green-500 to-green-600' },
        'powerpoint': { icon: 'fas fa-file-powerpoint', color: 'from-orange-500 to-red-500' },
        'image': { icon: 'fas fa-file-image', color: 'from-purple-500 to-pink-500' },
        'video': { icon: 'fas fa-file-video', color: 'from-indigo-500 to-purple-500' },
        'audio': { icon: 'fas fa-file-audio', color: 'from-pink-500 to-rose-500' },
        'archive': { icon: 'fas fa-file-archive', color: 'from-gray-500 to-gray-600' },
        'other': { icon: 'fas fa-file', color: 'from-gray-400 to-gray-500' }
    };


    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight(e) {
        dropArea.classList.add('dragover');
    }

    function unhighlight(e) {
        dropArea.classList.remove('dragover');
    }




    // Character count for description
    descriptionInput.addEventListener('input', function() {
        const count = this.value.length;
        charCount.textContent = count + ' کاراکتر';

        if (count < 50) {
            charCount.classList.add('text-red-500');
            charCount.classList.remove('text-gray-400');
        } else {
            charCount.classList.remove('text-red-500');
            charCount.classList.add('text-gray-400');
        }
    });

    // Category selection
    document.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('click', function() {
            // Remove selection from all cards
            document.querySelectorAll('.category-card').forEach(c => c.classList.remove('selected'));

            // Add selection to clicked card
            this.classList.add('selected');

            // Set hidden input value
            categoryInput.value = this.dataset.category;

            // Clear any error
            const errorMsg = this.parentElement.nextElementSibling;
            if (errorMsg && errorMsg.classList.contains('error-message')) {
                errorMsg.classList.add('hidden');
            }
        });
    });

    // Access type change handler
    document.querySelectorAll('input[name="access_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            updateAccessTypeUI();

            if (this.value === 'paid') {
                priceSection.classList.remove('hidden');
                document.getElementById('price').required = true;
            } else {
                priceSection.classList.add('hidden');
                document.getElementById('price').required = false;
                document.getElementById('price').value = '';
            }
        });
    });

    // Status change handler
    document.querySelectorAll('input[name="state"]').forEach(radio => {
        radio.addEventListener('change', updateStatusUI);
    });

    function updateAccessTypeUI() {
        document.querySelectorAll('.access-option').forEach(option => {
            const radio = option.querySelector('input[type="radio"]');
            const circle = option.querySelector('.w-3.h-3');

            if (radio.checked) {
                circle.classList.remove('bg-transparent');
                circle.classList.add('bg-purple-600');
                option.classList.add('border-purple-300');
            } else {
                circle.classList.add('bg-transparent');
                circle.classList.remove('bg-purple-600');
                option.classList.remove('border-purple-300');
            }
        });
    }

    function updateStatusUI() {
        document.querySelectorAll('.status-option').forEach(option => {
            const radio = option.querySelector('input[type="radio"]');
            const circle = option.querySelector('.w-3.h-3');

            if (radio.checked) {
                circle.classList.remove('bg-transparent');
                circle.classList.add('bg-purple-600');
                option.classList.add('border-purple-300');
            } else {
                circle.classList.add('bg-transparent');
                circle.classList.remove('bg-purple-600');
                option.classList.remove('border-purple-300');
            }
        });
    }

    // Form validation
    function validateForm() {
        let isValid = true;
        const errors = [];

        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(msg => {
            msg.classList.add('hidden');
            msg.textContent = '';
        });
        document.querySelectorAll('.field-error').forEach(field => {
            field.classList.remove('field-error');
        });

        // Validate file
        if (!fileInput.files.length) {
            errors.push({ field: 'file-input', message: 'انتخاب فایل اجباری است' });
            isValid = false;
        }

        // Validate title
        if (!titleInput.value.trim()) {
            errors.push({ field: 'title', message: 'عنوان فایل اجباری است' });
            isValid = false;
        } else if (titleInput.value.trim().length < 5) {
            errors.push({ field: 'title', message: 'عنوان باید حداقل 5 کاراکتر باشد' });
            isValid = false;
        }

        // Validate description
        if (!descriptionInput.value.trim()) {
            errors.push({ field: 'description', message: 'توضیحات اجباری است' });
            isValid = false;
        } else if (descriptionInput.value.trim().length < 50) {
            errors.push({ field: 'description', message: 'توضیحات باید حداقل 50 کاراکتر باشد' });
            isValid = false;
        }

        // Validate category
        if (!categoryInput.value) {
            errors.push({ field: 'category-input', message: 'انتخاب دسته‌بندی اجباری است' });
            isValid = false;
        }

        // Validate access type
        const accessType = document.querySelector('input[name="access_type"]:checked');
        if (!accessType) {
            errors.push({ field: 'access_type', message: 'انتخاب نوع دسترسی اجباری است' });
            isValid = false;
        }

        // Validate price for paid files
        if (accessType && accessType.value === 'paid') {
            const priceInput = document.getElementById('price');
            if (!priceInput.value || priceInput.value < 1000) {
                errors.push({ field: 'price', message: 'قیمت باید حداقل 1000 تومان باشد' });
                isValid = false;
            }
        }

        // Show errors
        errors.forEach(error => {
            const field = document.getElementById(error.field);
            const errorMsg = field.parentElement.querySelector('.error-message');

            if (field) field.classList.add('field-error');
            if (errorMsg) {
                errorMsg.textContent = error.message;
                errorMsg.classList.remove('hidden');
            }
        });

        return isValid;
    }
    // Icon selection
    document.querySelectorAll('.icon-option').forEach(iconOption => {
        iconOption.addEventListener('click', function() {
            // Remove selection from all icon options
            document.querySelectorAll('.icon-option').forEach(option => {
                option.classList.remove('border-purple-500', 'bg-purple-50', 'dark:bg-purple-900/20');
                option.classList.add('border-gray-200', 'dark:border-gray-600');
            });

            // Add selection to clicked option
            this.classList.remove('border-gray-200', 'dark:border-gray-600');
            this.classList.add('border-purple-500', 'bg-purple-50', 'dark:bg-purple-900/20');

            // Get icon data
            const iconClass = this.dataset.icon;
            const iconColor = this.dataset.color;
            const iconName = this.querySelector('span').textContent;

            // Set hidden input values
            document.getElementById('file-icon-input').value = iconClass +" "+iconColor;

            // Update preview
            const preview = document.getElementById('selected-icon-preview');
            const nameSpan = document.getElementById('selected-icon-name');

            preview.innerHTML = `<i class="${iconClass} text-white text-sm"></i>`;
            preview.className = `w-8 h-8 bg-gradient-to-br ${iconColor} rounded-lg flex items-center justify-center`;
            nameSpan.textContent = iconName;

            // Update file preview icon if file is uploaded
            const fileIcon = document.getElementById('file-icon');
            if (fileIcon && !filePreview.classList.contains('hidden')) {
                fileIcon.innerHTML = `<i class="${iconClass}"></i>`;
                fileIcon.className = `file-type-icon bg-gradient-to-br ${iconColor}`;
            }

            // Clear any error
            const errorMsg = this.parentElement.nextElementSibling;
            if (errorMsg && errorMsg.classList.contains('error-message')) {
                errorMsg.classList.add('hidden');
            }
        });
    });




    // Initialize UI
    updateAccessTypeUI();
    updateStatusUI();
</script>
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

@extends('layouts.user.master')

@section('content')
    <style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .file-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        .file-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .dark .file-card {
            background: #1f2937;
            border-color: #374151;
        }
        .file-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        .download-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            transition: all 0.3s ease;
        }
        .download-btn:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-1px);
        }
        .stats-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }
        .dark .stats-card {
            background: #1f2937;
            border-color: #374151;
        }
    </style>

<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<!-- Header -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class=" text-white py-6 px-8 rounded-2xl shadow-lg mb-8 file-card">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">
                    <i class="fas fa-shopping-bag ml-3"></i>
                    فایل‌های خریداری شده
                </h1>
                <p class="text-lg opacity-90">فایل‌هایی که خریداری کرده‌اید و می‌توانید دانلود کنید</p>
            </div>

        </div>
    </div>

    <!-- Files Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($files as $file)
        <!-- File Card 1 -->
        <div class="file-card p-6">
            <div class="flex items-start gap-4 ">
                <div class="file-icon bg-gradient-to-br from-red-500 to-red-600">
                    <i class="{{$file->icon}}"></i>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center justify-between flex-row">
                <div class="flex-1 min-w-0">
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2 truncate">
                        {{$file->title}}
                    </h3>
                </div>
                <div>
                    <div class="flex items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-3">

                        <span><i class="fas {{$file->icon}} ml-1"></i>{{$file->file_type}}</span>
                    </div>
                </div>
                    </div>
                    <div class="flex text-xs text-gray-600 dark:text-gray-400 mb-3" >
                        <span><i class="fas fa-calendar ml-1"></i> خرید: {{\Morilog\Jalali\Jalalian::forge($file->created_at)->ago()}}</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="text-sm">
                    <span class="text-gray-600 dark:text-gray-400">قیمت :</span>
                    <span class="font-bold text-purple-600 dark:text-purple-400 mr-2">{{number_format($file->price)}} تومان</span>
                </div>
                <a href="{{URL::temporarySignedRoute('user.files.download',now()->addMinutes(30),['file' => $file->id])}}" class="download-btn text-white px-6 py-2 rounded-lg font-medium">
                    <i class="fas fa-download ml-2"></i>
                    دانلود
                </a>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-center mt-12">
        {{$files->render()}}
    </div>

    <!-- Empty State (Hidden by default, show when no files) -->
    <div class="hidden text-center py-16">
        <div class="w-24 h-24 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-shopping-bag text-4xl text-gray-400"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">هنوز فایلی خریداری نکرده‌اید</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
            برای شروع، می‌توانید فایل‌های مورد نیاز خود را از فروشگاه انتخاب و خریداری کنید
        </p>
        <a href="/files" class="inline-flex items-center px-8 py-4 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition font-medium">
            <i class="fas fa-search ml-2"></i>
            مرور فایل‌ها
        </a>
    </div>

</div>
</div>
@endsection


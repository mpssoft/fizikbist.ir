@extends('layouts.admin.master')

@section('content')
    <div class="max-w-4xl mx-auto mt-5">
        <!-- Header Section -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-5">
            <div class="p-8">
                <!-- Breadcrumb -->
                <nav class="flex items-center space-x-2 rtl:space-x-reverse text-sm text-gray-500 dark:text-gray-400 mb-6" dir="rtl">
                    <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21l4-4 4 4"></path>
                        </svg>
                        داشبورد
                    </a>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-700 dark:text-gray-300 font-medium">اسلایدرها</span>
                </nav>

                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">مدیریت اسلایدرها</h1>
                            <p class="text-gray-600 dark:text-gray-300">مشاهده و مدیریت اسلایدرهای صفحه اصلی</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-4">
                        <a href="{{route('admin.sliders.create')}}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600
                                  text-white font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-blue-700
                                  hover:shadow-xl hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            اسلایدر جدید
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Sliders List -->
        <div class="space-y-6">
            @foreach($sliders as $slider)
            <!-- Slider Row 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="p-4 sm:p-6">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-4">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                            <div class="w-24 h-16 sm:w-32 sm:h-20 bg-gradient-to-r from-purple-400 to-pink-500 rounded-xl flex items-center justify-center flex-shrink-0 mx-auto sm:mx-0 image-preview">

                                <img src="{{$slider->image}}" />
                            </div>
                            <div class="text-center sm:text-right">
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $slider->title }}</h3>
                                <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mb-3">{{ $slider->subtitle }}</p>
                                <div class="flex items-center justify-center sm:justify-start gap-2 mb-2">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                    </svg>
                                    <span class="text-sm text-blue-600 dark:text-blue-400">{{ $slider->link }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center gap-3">
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 {{$slider->is_active ? 'text-green-800 dark:bg-green-900':'text-orange-500 dark:bg-orange-500'}}  dark:text-green-200">
                                {{$slider->is_active ? 'فعال':'غیرفعال'}}
                            </span>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.sliders.edit',$slider->id) }}" class="p-2 sm:p-3 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-colors duration-200" title="ویرایش">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </a>

                                <form action="{{route('admin.sliders.destroy',$slider->id)}}"  onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="delete-{{$slider->id}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="p-2 rounded-xl  text-rose-700 hover:bg-rose-50
                   dark:border-rose-600 dark:text-rose-300 dark:hover:bg-rose-800 transition"
                                            title="حذف">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="text-center">
                            <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">ترتیب نمایش</div>
                            <div class="flex items-center justify-center gap-1 sm:gap-2">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                                <span class="text-base sm:text-lg font-bold text-gray-900 dark:text-white">۱</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">تاریخ ایجاد</div>
                            <div class="flex items-center justify-center gap-1 sm:gap-2">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm sm:text-base font-medium text-gray-900 dark:text-white">{{\Morilog\Jalali\Jalalian::forge($slider->created_at)->ago()}}</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">کلیک‌ها</div>
                            <div class="flex items-center justify-center gap-1 sm:gap-2">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                                </svg>
                                <span class="text-base sm:text-lg font-bold text-gray-900 dark:text-white">{{number_format($slider->clicks)}}</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            @endforeach
         </div>

        <!-- Pagination -->
        <div class="flex flex-col sm:flex-row  items-center justify-between gap-4 mt-8 sm:mt-12">

            <div class="flex items-center gap-4 order-1 sm:order-2">
                {{$sliders->render()}}
            </div>
        </div>
    </div>

@endsection
{{-- SweetAlert Confirmation --}}
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script>

        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'حذف اسلاید',
                text: 'آیا مطمئن هستید که می‌خواهید این اسلاید را حذف کنید؟',
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

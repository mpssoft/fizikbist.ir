@extends('layouts.admin.master')


@section('content')
    <div class="container mx-auto px-4 py-6" x-data>
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-8">
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
                        <span class="text-gray-700 dark:text-gray-300 font-medium">دوره‌ها</span>
                    </nav>

                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                        <div class="flex items-center gap-4">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">مدیریت دوره‌ها</h1>
                                <p class="text-gray-600 dark:text-gray-300">مشاهده و مدیریت تمام دوره‌های آموزشی</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-4">
                            <a href="/admin/courses/create"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600
                                  text-white font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-blue-700
                                  hover:shadow-xl hover:scale-105 transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                دوره جدید
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            {{--<!-- Filters and Search -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden mb-8">
                <div class="p-6">
                    <div class="flex flex-col lg:flex-row gap-4">
                        <!-- Search -->
                        <div class="flex-1">
                            <div class="relative">
                                <input type="text" placeholder="جستجو در دوره‌ها..."
                                       class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                          bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                          focus:border-blue-500 focus:bg-white dark:focus:bg-gray-600
                                          focus:ring-4 focus:ring-blue-500/20 transition-all duration-200">
                                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Filters -->
                        <div class="flex gap-4">
                            <select class="px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                       bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                       focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition-all duration-200">
                                <option>همه وضعیت‌ها</option>
                                <option>فعال</option>
                                <option>غیرفعال</option>
                                <option>پیش‌نویس</option>
                            </select>

                            <select class="px-4 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-600
                                       bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100
                                       focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 transition-all duration-200">
                                <option>همه مدرسان</option>
                                <option>استاد احمدی</option>
                                <option>دکتر محمدی</option>
                                <option>مهندس رضایی</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

           --}}
            <!-- Courses List -->
            <div class="space-y-6">
                <!-- Course Row 1 -->
                @foreach ($courses as $course)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="p-4 sm:p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-4">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <div class="w-16 h-12 sm:w-20 sm:h-16 bg-gradient-to-r from-blue-400 to-purple-500 rounded-xl flex items-center justify-center flex-shrink-0 mx-auto sm:mx-0">
                                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                    <a href="{{route('playCourse',$course->id)}}" >
                                        <img src="{{$course->cover_image}}" /> </a>
                                </div>
                                <div class="text-center sm:text-right">
                                    <h3 class="inline-flex text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $course->title }}</h3>
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-gary-100 text-green-800 dark:bg-gray-900 dark:text-green-200">
                                        {{$course->grade->name}}
                                    </span>
                                    <div class="inline-flex  items-center justify-center sm:justify-start gap-2 mb-2">
                                        <div class="w-auto px-4 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                            <span class="text-white text-sm font-bold">مدرس : {{  $course->teacher->name ?? 'No teacher assigned' }}</span>
                                        </div>
                                    </div>
                                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mb-3">{{ $course->description }}</p>

                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row items-center gap-3">
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                {{ __($course->status)}}
                            </span>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.courses.edit',$course->id) }}" class="p-2 sm:p-3 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-colors duration-200" title="ویرایش">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.courses.destroy',$course->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$course->id}}">@csrf @method('delete')
                                        <button  class="p-2 sm:p-3 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-colors duration-200" title="حذف">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>


                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <div class="text-center">
                                <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">دانش آموزان</div>
                                <div class="flex items-center justify-center gap-1 sm:gap-2">
                                   <span class="fas fa-users w-7 h-7 flex  items-center"></span>
                                    <span class="text-base sm:text-lg font-bold text-gray-900 dark:text-white">{{ $course->students_count }}</span>
                                </div>
                            </div>

                            <div class="text-center">
                                <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">مدت زمان</div>
                                <div class="flex items-center justify-center gap-1 sm:gap-2">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-base sm:text-lg font-bold text-gray-900 dark:text-white">{{$course->time}} ساعت </span>
                                </div>
                            </div>

                            <div class="text-center">
                                <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">قیمت</div>
                                <div class="text-base sm:text-lg font-bold text-green-600">{{ number_format($course->price) }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">تومان</div>
                            </div>
                            <div class="text-center">
                                <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">زبان </div>
                                <div class="text-base sm:text-lg font-bold text-green-600">{{ $course->lang == 'tr'? 'ترکی':'فارسی' }}</div>

                            </div>

                           {{-- <div class="text-center">
                                <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">امتیاز</div>
                                <div class="flex items-center justify-center gap-1 sm:gap-2">
                                    <div class="flex text-yellow-400">
                                        @php
                                            $rating = round($course->average_rating ?? 0, 1); // مثال: 4.2
                                            $fullStars = floor($rating);
                                            $halfStar = ($rating - $fullStars) >= 0.25 && ($rating - $fullStars) < 0.75;
                                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                        @endphp

                                        <div class="text-center">
                                            <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">امتیاز</div>
                                            <div class="flex items-center justify-center gap-1 sm:gap-2">
                                                <div class="flex text-yellow-400">
                                                    --}}{{-- full stars --}}{{--
                                                    @for ($i = 0; $i < $fullStars; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor

                                                    --}}{{-- half star --}}{{--
                                                    @if ($halfStar)
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @endif

                                                    --}}{{-- empty stars --}}{{--
                                                    @for ($i = 0; $i < $emptyStars; $i++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
            ({{ number_format($course->raters_avg_point, 1) }})
        </span>

                                </div>
                            </div>--}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8 sm:mt-12">
               {{ $courses->render() }}
            </div>
        </div>
    </div>

    {{-- SweetAlert Confirmation --}}
    @push('scripts')
        <script src="/js/modules/sweetalert2.js"></script>
        <script>

            function confirmDelete(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'حذف دوره',
                    text: 'آیا مطمئن هستید که می‌خواهید این دوره را حذف کنید؟',
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

@endsection


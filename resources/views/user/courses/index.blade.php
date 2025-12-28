@extends('layouts.user.master')

@section('content')
    <div class="container mx-auto px-4 py-6" x-data>

        <!-- Beautiful Filter Tabs -->
        <section class="px-6">
            <div class="flex flex-wrap gap-3 mb-6">
                <a href="{{route('user.courses.index',['all'=>1])}}"
                        class="px-6 py-3 rounded-xl font-medium transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-book-atlas ml-2"></i>
                    همه دوره ها
                </a>
                <a href="{{route('user.courses.index',['user'=>1])}}"
                        class="px-6 py-3 rounded-xl font-medium transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-book-atlas ml-2"></i>
                    دوره های من
                </a>
                <a href="{{route('user.courses.index',['bought'=>1])}}"

                        class="px-6 py-3 rounded-xl font-medium transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-shopping-cart ml-2"></i>
                    خریداری شده
                </a>

            </div>
        </section>

        <!-- Beautiful Course Cards -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-6 pb-8">
            <!-- Course Card 1 -->
            @foreach($courses as $course)
                <div class="group bg-gradient-to-br from-white via-slate-50 to-slate-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 rounded-2xl shadow-[0_8px_24px_rgba(0,0,0,0.1)] dark:shadow-[0_8px_24px_rgba(0,0,0,0.3)] hover:shadow-[0_12px_32px_rgba(0,0,0,0.15)] dark:hover:shadow-[0_12px_32px_rgba(0,0,0,0.4)] transition-all duration-300 hover:-translate-y-2 border border-white/20 dark:border-slate-600/20 overflow-hidden">
                    <div class="relative">
                        <div style="background:url('{{$course->cover_image}}') ;background-size: contain " class="w-full h-48 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-purple-600/20"></div>
                            <i class="fas fa-search text-white text-4xl relative z-10 group-hover:scale-110 transition-transform duration-300"></i>
                            <div class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1">
                                <span class="text-white text-xs font-medium">{{$course->completed ? 'تکمیل شده':'در حال پیشرفت'}}</span>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-purple-500"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-800 dark:text-white mb-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-200">{{ $course->title }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">{{ $course->description }}</p>
                        <div class="flex items-center justify-between">
                            @if($course->price ==0)
                                <a href="{{route('playFreeCourse',$course->id)}}" class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-blue-600 hover:to-purple-600 transition-all duration-200 hover:scale-105">
                                    ادامه
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

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
    @if(session()->has('licenses'))
        @include('layouts.license-modal') ;
    @endif
@endsection

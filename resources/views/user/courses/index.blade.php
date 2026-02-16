@extends('layouts.user.master')

@section('content')
    <div class="container mx-auto px-4 py-6" x-data>

        <!-- Beautiful Filter Tabs -->
        <section class="px-6">
            <div class="flex flex-wrap gap-3 mb-6">
                <a href="{{route('user.courses.index',['all'=>1])}}"
                        class="px-6 py-3 rounded-xl font-medium {{request()->has('all')? 'bg-slate-500':''}} transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-book-atlas ml-2"></i>
                    همه دوره ها
                </a>
                <a href="{{route('user.courses.index',['user'=>1])}}"
                        class="px-6 py-3 rounded-xl font-medium {{request()->has('user')? 'bg-slate-500':''}} transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-book-atlas ml-2"></i>
                    دوره های من
                </a>
                <a href="{{route('user.courses.index',['bought'=>1])}}"

                        class="px-6 py-3 rounded-xl font-medium {{request()->has('bought')? 'bg-slate-500':''}} transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg border border-white/20 dark:border-slate-600/20">
                    <i class="fas fa-shopping-cart ml-2"></i>
                    خریداری شده
                </a>

            </div>
        </section>

        <!-- Beautiful Course Cards -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-6 pb-8">
            <!-- Course Card 1 -->
            @foreach($courses as $course)
                <div class="course-card flex flex-1 w-full flex-col min-h-[560px]  group bg-white dark:bg-slate-800 rounded-2xl shadow-xl hover:shadow-2xl overflow-hidden border border-gray-100 dark:border-slate-700 transition-all duration-300 hover:-translate-y-1">
                    <!-- Course Image -->
                    <div class="relative h-60 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center overflow-hidden tv-optimized-text-shadow" style="background:url('{{$course->cover_image}}');background-size: 100% 100%">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                        <!-- Course Badge -->

                        @if($course->price==0)
                            <div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-800/90 with-blur text-blue-600 dark:text-blue-400 px-3 py-1 rounded-full text-sm font-medium">
                                رایگان
                            </div>
                        @endif

                    </div>

                    <!-- Course Content -->
                    <div class="p-6 relative bg-white dark:bg-slate-800 flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-slate-200 mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                            {{$course->title}}
                        </h3>
                        <div class="absolute top-4 left-0 bg-white/90  {{$course->lang == 'fa'? 'dark:bg-amber-400':'dark:bg-sky-500'}}  text-white   rounded-r-full px-3 py-1 dark:shadow-black dark:shadow-[-8px_0_24px_rgba(0,0,0,0.4)] border-2 border-gray-100 border-l-0  text-xl ">
                            {{ $course->lang == 'tr' ? 'زبان ترکی':'زبان فارسی' }}
                        </div>
                        <!-- Course Stats -->
                        <div class="flex items-center gap-4 mb-4 text-sm text-gray-500 dark:text-slate-400">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>{{$course->time}} ساعت</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{count($course->lessons)}} ویدیو</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>{{count($course->students)}} دانش‌آموز</span>
                            </div>
                        </div>

                        <!-- Course Description -->
                        <p class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed   line-clamp-2">
                            {{$course->description}}
                        </p>
                        <div class="flex-1"></div>
                        @if(!in_array($course->id,auth()->user()->courses()->get()->pluck('id')->toArray()))
                        <div class=" items-center justify-between  ">
                            @if($course->price==0)
                                <!-- Action Buttons -->
                                <div class="flex justify-between items-center" id="free-course">
                                    <a href="{{route('playFreeCourse',$course->id)}}" class="bg-gradient-to-r flex from-blue-400 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105  items-center gap-2 tv-optimized-text-shadow">
                                        <span>مرور دوره</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </a>
                                    <a href="{{route('show.course',$course->id)}}"  class=" bg-gradient-to-r from-blue-600 to-blue-700 hover:from-green-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                        <i class="fas fa-circle-info"></i>
                                        <span>  اطلاعات بیشتر </span>

                                    </a>
                                    {{--     <!-- Rating -->
                                         <div class="flex items-center gap-1">
                                             <div class="flex text-yellow-400">
                                                 <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                     <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                 </svg>
                                                 <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                     <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                 </svg>
                                                 <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                     <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                 </svg>
                                                 <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                     <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                 </svg>
                                                 <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                     <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                 </svg>
                                             </div>
                                             <span class="text-sm text-gray-600 dark:text-slate-400 mr-1">۴.۸</span>
                                         </div>--}}
                                </div>
                            @else
                                <!-- Paid Course Actions -->
                                <div class=" " id="paid-course">
                                    <div class="flex items-center border-2 p-3 border-gray-700 rounded-2xl justify-between mb-4">
                                        <div class="text-right justify-end">

                                            @if(!is_null($course->discounts->where('start_at','>',now())->where('end_at','<',now())->where('is_active',1)->first()))
                                                @php
                                                    $disValue = $course->discounts->first()->value;
                                                    $disType = $course->discounts->first()->type;
                                                    if($disType == 'percent'){
                                                        $dis  = $course->price * ($disValue/100);
                                                    }else{
                                                        $dis = $course->price - $disValue;
                                                    }
                                                @endphp
                                                <div class="text-sm text-gray-500 dark:text-slate-400 line-through">{{number_format($course->price)}} تومان</div>
                                                <div class="  font-bold text-gray-800 dark:text-slate-200 text-xl ">{{number_format($course->price-$dis)}} تومان</div>

                                            @else
                                                <div class=" font-bold text-gray-800 dark:text-slate-200 text-xl">{{number_format($course->price)}} تومان</div>
                                            @endif
                                        </div>
                                        @if(!is_null($course->discounts->where('start_at','>',now())->where('end_at','<',now())->where('is_active',1)->first()))
                                            <div class="flex flex-col py-3 gap-2">
                                                <div class="bg-red-100 dark:bg-red-900/30 text-red-600 text-center dark:text-red-400 px-2 py-1 rounded-lg text-sm font-medium">
                                                    {{$course->discounts->first()->value}}% تخفیف
                                                </div>
                                                <!-- Countdown -->
                                                <div class="bg-gradient-to-br from-slate-700 via-slate-600 to-slate-500 dark:from-slate-800 dark:via-slate-700 dark:to-slate-600 text-white px-2 py-2 pb-1 rounded-xl flex items-center gap-3 shadow-2xl w-fit "                                                        data-expire="{{ $course->discounts->first()->end_at }}"
                                                     id="countdown-{{ $course->id }}">
                                                    Loading timer...
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex justify-between gap-3">
                                        <button id="btn-{{$course->id}}" onclick="addToCart('course','{{$course->id}}')" class=" bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 dark:from-green-500 dark:to-green-600 dark:hover:from-green-600 dark:hover:to-green-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                            <i class="fas fa-cart-arrow-down"></i>
                                            <span>افزودن به سبد</span>
                                            <span class="spinner-{{$course->id}}  hidden"><i class="fas fa-spinner fa-spin-pulse"></i></span>
                                        </button>
                                        <a href="{{route('show.course',$course->id)}}"  class=" bg-gradient-to-r from-blue-600 to-blue-700 hover:from-green-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                            <i class="fas fa-circle-info"></i>
                                            <span>  اطلاعات بیشتر </span>

                                        </a>
                                    </div>

                                    {{--      <!-- Rating for paid course -->
                                          <div class="flex items-center justify-center gap-1 mt-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                                              <div class="flex text-yellow-400">
                                                  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                      <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                  </svg>
                                                  <svg class="w-4 h-4 fill-curren" tviewBox="0 0 20 20">
                                                      <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                  </svg>
                                                  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                      <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                  </svg>
                                                  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                      <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                  </svg>
                                                  <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                      <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                  </svg>
                                              </div>
                                              <span class="text-sm text-gray-600 dark:text-slate-400 mr-1">۴.۸ (۱۲۳ نظر)</span>
                                          </div>
                                    --}}  </div>
                            @endif
                        </div>
                        @else
                            <!-- Beautiful Persian Button -->
                            <div class="bg-gradient-to-r from-green-500 to-emerald-600 dark:from-green-600 dark:to-emerald-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 cursor-pointer flex items-center gap-3 font-medium">
                                <!-- Checkmark Icon -->
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>

                                <!-- Persian Text -->
                                <span class="text-sm font-semibold" dir="rtl">دوره خریده شده</span>
                            </div>
                        @endif
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

@endsection

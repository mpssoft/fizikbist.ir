@extends('layouts.app')


@section('content')


<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<!-- Course Header -->
<div class="max-w-6xl mx-auto px-8 py-12">
    <div class="md:bg-gradient-to-r md:from-slate-700 rounded-2xl md:to-slate-800 text-white  shadow-xl md:p-8">
        <div class="grid md:grid-cols-7 gap-6 items-center">



            <!-- Course Cover -->
            <div class="relative md:col-span-4  overflow-hidden">
                @if($course->video)
                {!!   $course->video!!}
                @else
                <!-- Course Image -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="relative">
                        <img src="{{ $course->cover_image }}"
                             alt="{{ $course->title }}"
                             class="w-full h-full object-cover transition-all duration-300 hover:scale-105"
                             onerror="this.src='https://via.placeholder.com/400x250/4F46E5/FFFFFF?text=دوره+فیزیک'; this.alt='تصویر در دسترس نیست';">

                        <!-- Image Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-4 left-4 right-4">
                                <p class="text-white text-sm font-medium">{{ $course->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- Course Info -->
            <div class="md:col-span-3 p-5  border border-gray-600 rounded-2xl bg-slate-700">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold mb-4">{{ $course->title ?? 'دوره جامع فیزیک پایه دهم' }}</h1>
                    <div class="flex items-center gap-2 mb-4">

                    <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm">
              {{$course->grade->name}}
            </span>
                </div>


                </div>
                <p class=" opacity-90 mb-6 leading-relaxed line-clamp-2 ">
                    {{ $course->description ?? 'آموزش کامل و جامع فیزیک پایه دهم با روش‌های نوین تدریس و حل تمرین‌های متنوع برای آمادگی در کنکور و امتحانات مدرسه' }}
                </p>

                <!-- Course Stats -->
                <div class="flex flex-wrap gap-6 mb-8">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-clock text-yellow-300"></i>
                        <span>{{ $course->time ?? '4' }} ساعت آموزش</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-user-graduate text-green-300"></i>
                        <span>{{ $course->teacher->name ?? 'حسین نژاداسد' }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-globe text-blue-300"></i>
                        <span>زبان {{ $course->lang == 'tr'? 'ترکی' : 'فارسی' }}</span>
                    </div>
                </div>

                <!-- Pricing Section -->
                <div class="">
                    <div class="flex items-center justify-between mb-4">
                        @if($course->price==0)
                            <!-- Action Buttons -->
                            <div class="flex justify-between items-center" id="free-course">
                                <a href="{{route('playFreeCourse',$course->id)}}" class="bg-gradient-to-r flex from-blue-400 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105  items-center gap-2 tv-optimized-text-shadow">
                                    <span>مرور دوره</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
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
                            <div class="flex-1" id="paid-course">
                                <div class="flex items-center border-2 p-3 dark:bg-gray-800 border-gray-700 rounded-2xl justify-between mb-4">
                                    <div class="text-right justify-end">

                                        @if(!is_null($course->discounts->where('start_at','<',now())->where('end_at','>',now())->where('is_active',1)->first()))
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
                                    @if(!is_null($course->discounts->where('start_at','<',now())->where('end_at','>',now())->where('is_active',1)->first()))
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

                                <div class="flex gap-3">
                                    <button id="btn-{{$course->id}}" onclick="addToCart('course','{{$course->id}}')" class=" bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 dark:from-green-500 dark:to-green-600 dark:hover:from-green-600 dark:hover:to-green-700 text-white px-4 py-3 rounded-xl font-medium transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-2">

                                        <i class="fas fa-cart-arrow-down"></i>
                                        <span>افزودن به سبد</span>
                                        <span class="spinner-{{$course->id}}  hidden"><i class="fas fa-spinner fa-spin-pulse"></i></span>
                                    </button>
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Course Content -->
<div class="max-w-6xl mx-auto px-8 lg:px-8 pb-10">
    <div class="grid lg:grid-cols-3 gap-8">

        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">

            <!-- Course Description -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-8">
                <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                    <i class="fas fa-info-circle text-blue-600"></i>
                    درباره این دوره
                </h2>
                <div class="prose prose-lg dark:prose-invert max-w-none">

                        {!!     $course->content ?? 'این دوره جامع فیزیک پایه دهم شامل تمامی مباحث کتاب درسی با تمرکز ویژه بر روی درک مفاهیم و حل مسائل است. در این دوره با روش‌های نوین تدریس و استفاده از مثال‌های کاربردی، مفاهیم پیچیده فیزیک به زبان ساده آموزش داده می‌شود.' !!}


                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">


            <!-- Related Courses -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                    <i class="fas fa-graduation-cap text-purple-500"></i>
                    دوره‌های مرتبط
                </h3>
                <div class="space-y-3">
                    @foreach(\App\Models\Course::where('grade_id',$course->grade_id)->get() as $course)
                    <a href="{{route('show.course',$course->id)}}" class="block p-3 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                        <div class="font-semibold text-sm text-gray-900 dark:text-white mb-1">{{$course->title}}</div>
                        <div class="text-xs text-gray-600 dark:text-gray-400"> {{$course->price}} تومان</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


</div>

@endsection


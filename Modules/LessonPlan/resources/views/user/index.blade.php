@extends('layouts.user.master')

@section('content')

    <div class="min-h-screen bg-gradient-to-br pt-5 from-sky-50 via-indigo-50 to-fuchsia-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 text-slate-900 dark:text-slate-100">

        <!-- Header -->
        <header class="bg-white dark:bg-slate-900 shadow-sm border rounded-2xl mx-6  border-slate-200 dark:border-slate-800">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 ">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 to-fuchsia-600 flex items-center justify-center">
                            <svg viewBox="0 0 24 24" class="w-5 h-5 text-white fill-current">
                                <path d="M18 2H8a4 4 0 0 0-4 4v12a4 4 0 0 1 4-4h12V4a2 2 0 0 0-2-2zM8 16a2 2 0 0 0-2 2 2 2 0 0 0 2 2h12v-4H8z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold">درسنامه‌های من</h1>
                            <p class="text-sm text-slate-600 dark:text-slate-400">پیگیری و دانلود درسنامه‌های درخواستی</p>
                        </div>
                    </div>
                    {{--
                    <div class="flex items-center gap-3">
                        <select class="px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
                            <option value="">همه درسنامه‌ها</option>
                            <option value="pending">در انتظار بررسی</option>
                            <option value="in_progress">در حال تهیه</option>
                            <option value="ready">آماده دانلود</option>
                            <option value="rejected">رد شده</option>
                        </select>
                        <button class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium transition">
                            + درخواست جدید
                        </button>
                    </div>--}}
                </div>
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-4 sm:px-6 py-6">

            <!-- Stats Overview -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-8">
                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-slate-200 dark:border-slate-800">
                    <div class="text-2xl font-bold text-slate-600 dark:text-slate-400">{{count($lessonplans)}}</div>
                    <div class="text-xs text-slate-500">کل درخواست‌ها</div>
                </div>
                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-amber-200 dark:border-amber-800">
                    <div class="text-2xl font-bold text-amber-600">{{$lessonplans->where('status','pending')->count()}}</div>
                    <div class="text-xs text-amber-700 dark:text-amber-300">در انتظار</div>
                </div>
                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-emerald-200 dark:border-emerald-800">
                    <div class="text-2xl font-bold text-emerald-600">{{$lessonplans->where('status','accepted')->count()}}</div>
                    <div class="text-xs text-emerald-700 dark:text-emerald-300">تایید شده</div>
                </div>
                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-blue-200 dark:border-blue-800">
                    <div class="text-2xl font-bold text-blue-600">{{$lessonplans->where('status','in_progress')->count()}}</div>
                    <div class="text-xs text-blue-700 dark:text-blue-300">در حال انجام</div>
                </div>
                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-indigo-200 dark:border-indigo-800">
                    <div class="text-2xl font-bold text-indigo-600">{{$lessonplans->where('status','ready')->count()}}</div>
                    <div class="text-xs text-indigo-700 dark:text-indigo-300">تکمیل شده</div>
                </div>
                <div class="bg-white dark:bg-slate-900 rounded-xl p-4 border border-rose-200 dark:border-rose-800">
                    <div class="text-2xl font-bold text-rose-600">{{$lessonplans->where('status','rejected')->count()}}</div>
                    <div class="text-xs text-rose-700 dark:text-rose-300">رد شده</div>
                </div>
            </div>

            <!-- Lesson Plans List -->
            <div class="space-y-4">
                @php
                    if(count($lessonplans)>0){
                        $grades = App\Models\Grade::all()->pluck('name','id');
                    }
             @endphp
                @foreach($lessonplans as $lp)
                <!--  Lesson Plan Item-->
                <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="text-lg font-bold">{{$lp->title}}</h3>
                                    @if($lp->status == 'ready')
                                    <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300 text-xs font-medium flex items-center gap-1">
                  <svg viewBox="0 0 24 24" class="w-3 h-3 fill-current">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                  </svg>
                  آماده دانلود
                </span>
                                    @elseif($lp->status == 'in_progress')
                                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300 text-xs font-medium flex items-center gap-1">
                  <div class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></div>
                  در حال تهیه
                </span>
                                    @elseif($lp->status == 'accepted')
                                        <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300 text-xs font-medium flex items-center gap-1">
                  <svg viewBox="0 0 24 24" class="w-3 h-3 fill-current">
                    <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z"/>
                  </svg>
                  در انتظار پرداخت
                </span>
                                    @elseif($lp->status == 'pending')
                                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300 text-xs font-medium flex items-center gap-1">
                  <div class="w-2 h-2 rounded-full bg-slate-500"></div>
                  در انتظار بررسی
                </span>
                                    @endif
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mb-3">{{$lp->description}}</p>

                                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3 text-sm">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                                        <span class="text-slate-600 dark:text-slate-400">پایه:</span>
                                        <span class="font-medium">{{$grades[$lp->grade_id]}}</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-fuchsia-500"></span>
                                        <span class="text-slate-600 dark:text-slate-400">تحویل:</span>
                                        <span class="font-medium">{{$lp->delivery_time ? \Morilog\Jalali\Jalalian::forge($lp->delivery_time)->ago():'تعیین نشده'}}</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                                        <span class="text-slate-600 dark:text-slate-400">هزینه:</span>
                                        <span class="font-medium">{{number_format($lp->price)}}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="border-t border-slate-200 dark:border-slate-700 pt-4">
                            @if($lp->status == 'ready')
                                <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-lg p-3 mb-4">
                                    <div class="flex items-center gap-2 mb-1">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-emerald-600 fill-current">
                                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                        </svg>
                                        <div class="text-sm font-medium text-emerald-800 dark:text-emerald-200">درسنامه آماده است!</div>
                                    </div>
                                    <div class="text-sm text-emerald-700 dark:text-emerald-300">{{$lp->admin_description}}</div>
                                </div>
                                <!-- Files Section -->
                                <div class="mb-4">
                                    <h4 class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-3 flex items-center gap-2">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                        </svg>
                                        فایل‌های ضمیمه
                                    </h4>
                                    <div class="space-y-2">
                                        <ul id="attached-items">
                                            @foreach($lp->items() as $item)
                                                <li data-id="{{ $item->id }}" data-type="{{ class_basename($item) }}" data-title="{{ $item->title }}"
                                                    class="flex items-center mb-2 justify-between p-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
                                                >

                                                    <div>  <span class="fas {{class_basename($item) == "File"? 'fa-file-download text-yellow-500':'fa-chalkboard-teacher text-green-500'}}  w-5 h-5"></span>
                                                        <span class="text-xs text-gray-500 mx-4">[{{class_basename($item) == "Lesson"?"درس":"فایل"}}]</span> {{ $item->title ?? $item->name }}</div>
                                                    @if(class_basename($item) == "File")
                                                    <a target="_blank" href="{{URL::temporarySignedRoute('user.files.download',now()->addMinutes(30),['file' => $item->id])}}" class="flex px-3 py-2 bg-green-900 text-white rounded-lg hover:bg-green-800 transition text-sm">
                                                        <span class="fas fa-download ml-4"></span>
                                                        <sppn>دانلود</sppn>
                                                    </a>
                                                    @else
                                                        <a target="_blank" href="{{route('play',$item->id)}}" class="flex px-3 items-center py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition text-sm">

                                                            <span class="fas fa-play-circle ml-4 ">  </span>
                                                            <span  >تماشا</span>
                                                        </a>

                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            @elseif($lp->status == 'in_progress')
                                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-3 mb-3">
                                    <div class="flex items-center gap-2 mb-1">
                                        <div class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></div>
                                        <div class="text-sm font-medium text-blue-800 dark:text-blue-200">آخرین وضعیت</div>
                                    </div>
                                    <div class="text-sm text-blue-700 dark:text-blue-300">کار در حال انجام است. تا پایان هفته آماده خواهد بود. بخش اول تکمیل شده است.</div>
                                </div>
                            @elseif($lp->status == 'accepted')
                                <div class="bg-amber-50 dark:bg-amber-900/20 rounded-lg p-3 mb-3">
                                    <div class="flex items-center gap-2 mb-1">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4 text-amber-600 fill-current">
                                            <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z"></path>
                                        </svg>
                                        <div class="text-sm font-medium text-amber-800 dark:text-amber-200">درخواست تایید شده</div>
                                    </div>
                                    <div class="text-sm text-amber-700 dark:text-amber-300">درخواست شما تایید شد. برای شروع کار، لطفاً فاکتور ایجاد شده را پرداخت کنید.</div>
                                </div>

                            @elseif($lp->status == 'pending')
                                <div class="bg-slate-50 dark:bg-slate-800 rounded-lg p-3 mb-3">
                                    <div class="flex items-center gap-2 mb-1">
                                        <div class="w-2 h-2 rounded-full bg-slate-500"></div>
                                        <div class="text-sm font-medium text-slate-700 dark:text-slate-300">در انتظار بررسی</div>
                                    </div>
                                    <div class="text-sm text-slate-600 dark:text-slate-400">درخواست شما ارسال شده و به زودی بررسی خواهد شد.</div>
                                </div>
                            @elseif($lp->status == 'paid')
                                <div class="bg-amber-50 dark:bg-amber-800 rounded-lg p-3 mb-3">
                                    <div class="flex items-center gap-2 mb-1">
                                        <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                        <div class="text-sm font-medium text-amber-700 dark:text-amber-300">پرداخت شده  </div>
                                    </div>
                                    <div class="text-sm text-amber-600 dark:text-amber-400">{{$lp->admin_description ?? "با تشکر از اعتماد شما به فیزیک بیست. درسنامه شما بزودی در مرحله آماده سازی قرار خواهد گرفت.در صورت داشتن هر گونه سوال از قسمت پیام ها می تواندی با ما در ارتباط باشید."}}</div>
                                </div>
                                @endif


                            <div class="flex items-center justify-between">
                                <div class="text-xs text-slate-500">
                                    درخواست شده در {{ \Morilog\Jalali\Jalalian::forge($lp->created_at) }} • تحویل داده شده در   {{ \Morilog\Jalali\Jalalian::forge($lp->delivery_time)->ago() }}
                                </div>
                                <div class="flex items-center gap-2">
                                    @if($lp->status == 'accepted')

                                    <button  id="btn-{{$lp->id}}"
                                        onclick="addToCart('lessonplan','{{$lp->id}}',true)" class="px-4 py-2 rounded-lg bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium transition flex items-center gap-2">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                            <path d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"/>
                                        </svg>
                                        پرداخت {{number_format($lp->price)}} تومان

                                        <span class="spinner-{{$lp->id}}  hidden"><i
                                                class="fas fa-spinner fa-spin-pulse"></i></span>
                                    </button>
                                    @elseif($lp->status == 'pending')
                                        <form action="{{ route('user.lessonplans.destroy',$lp->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$lp->id}}">@csrf @method('delete')
                                        <button  class="px-3 py-2 rounded-lg border border-rose-300 dark:border-rose-700 text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-900/20 text-sm font-medium transition">حذف</button>
                                        </form>
                                    @elseif($lp->status == 'rejected')
                                        <form action="{{ route('user.lessonplans.destroy',$lp->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$lp->id}}">@csrf @method('delete')
                                            <button  class="px-3 py-2 rounded-lg border border-rose-300 dark:border-rose-700 text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-900/20 text-sm font-medium transition">حذف</button>
                                        </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Load More -->
            <div class="text-center mt-8">
                {{$lessonplans->render()}}
            </div>
        </main>

    </div>

@endsection
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script>

        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'حذف درسنامه؟',
                text: 'آیا مطمئن هستید که می‌خواهید این درسنامه را حذف کنید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "red" ,
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
    @if(session()->has('lessonplan'))


        <script>
            Swal.fire({
                title: ' با تشکر',
                text: 'پرداخت شما یا موفقیت انجام شد.',
                icon: 'success',
                showConfirmButton:true,
                confirmButtonText: 'ok',
                cancelButtonText: 'لغو'
            })
        </script>

    @endif

@endpush

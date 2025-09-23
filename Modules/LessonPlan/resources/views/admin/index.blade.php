@extends('layouts.admin.master')

@section('content')
<div class="min-h-screen bg-gradient-to-br pt-5 from-sky-50 via-indigo-50 to-fuchsia-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 text-slate-900 dark:text-slate-100">

<!-- Header -->
<header class="bg-white dark:bg-slate-900 rounded-2xl mx-5  shadow-sm border border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 to-fuchsia-600 flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 text-white fill-current">
                        <path d="M18 2H8a4 4 0 0 0-4 4v12a4 4 0 0 1 4-4h12V4a2 2 0 0 0-2-2zM8 16a2 2 0 0 0-2 2 2 2 0 0 0 2 2h12v-4H8z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold">لیست درسنامه‌ها</h1>
                    <p class="text-sm text-slate-600 dark:text-slate-400">مدیریت و پیگیری درخواست‌های درسنامه</p>
                </div>
            </div>

            {{--<div class="flex items-center gap-3">
                <button class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium transition">
                    + درخواست جدید
                </button>
                <select class="px-3 py-2 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm">
                    <option value="">همه وضعیت‌ها</option>
                    <option value="pending">در انتظار</option>
                    <option value="accepted">تایید شده</option>
                    <option value="rejected">رد شده</option>
                    <option value="paid">پرداخت شده</option>
                    <option value="in_progress">در حال انجام</option>
                    <option value="ready">آماده</option>
                </select>
            </div>--}}
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
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
    <div class="space-y-4" id="lessonPlansList">

        @foreach($lessonplans as $lp)

        <!-- Sample Lesson Plan 1 -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-shadow">
            <div class="p-6">
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-bold">{{$lp->title}}</h3>
                            @if($lp->status == 'pending')
                                <span class="px-2 py-1 rounded-lg bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300 text-xs font-medium">در انتظار</span>
                            @elseif($lp->status == 'ready')
                                <span class="px-2 py-1 rounded-lg bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300 text-xs font-medium">آماده</span>
                            @elseif($lp->status == 'in_progress')
                                <span class="px-2 py-1 rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300 text-xs font-medium">در حال انجام</span>
                            @elseif($lp->status == 'rejected')
                                <span class="px-2 py-1 rounded-lg bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300 text-xs font-medium">رد شده</span>
                            @endif
                        </div>
                        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-3 mb-3">
                            <div class="text-xs font-medium text-gray-800 dark:text-white mb-1">درخواست دانش آموز:</div>
                            <div class="text-sm text-blue-700 dark:text-blue-300">{{$lp->description}}</div>
                        </div>

                        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-3 text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                                <span class="text-slate-600 dark:text-slate-400">پایه:</span>
                                <span class="font-medium">{{ App\Models\Grade::where('id',$lp->grade_id)->first()->name }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span class="text-slate-600 dark:text-slate-400">تحویل:</span>
                                <span class="font-medium">{{$lp->delivery_time ? \Morilog\Jalali\Jalalian::forge($lp->delivery_time):'تعیین نشده!'}}</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                <span class="text-slate-600 dark:text-slate-400">وضعیت:</span>
                                @php
                                $pay = ['pending' => ' در انتظار بررسی','accepted'=>'تایید اولیه','rejected'=>'رد شده','in_progress'=>'در حال آماده سازی','ready'=>' تحویل شده ','paid'=>'پرداخت شده']
                             @endphp
                                <span class="font-medium text-amber-600">{{$pay[$lp->status]}}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                                <span class="text-slate-600 dark:text-slate-400">هزینه:</span>
                                <span class="text-xs ">{{$lp->price == 0 ? 'تعیین نشده':number_format($lp->price). ' تومان '}} </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{route('admin.lessonplans.edit',$lp->id)}}" class="p-2 rounded-lg border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition" title="ویرایش">
                            <svg viewBox="0 0 24 24" class="w-4 h-4 fill-current">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="border-t border-slate-200 dark:border-slate-700 pt-4">
                    @if($lp->status == 'pending')
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-3 mb-3">
                            <div class="text-xs font-medium text-yellow-800 dark:text-yellow-200 mb-1"> یادداشت ادمین:</div>
                            <div class="text-sm text-yellow-700 dark:text-yellow-300">{{$lp->admin_description}}</div>
                        </div>
                    @elseif($lp->status == 'ready')
                        <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-lg p-3 mb-3">
                            <div class="text-xs font-medium text-emerald-800 dark:text-emerald-200 mb-1">یادداشت ادمین:</div>
                            <div class="text-sm text-emerald-700 dark:text-emerald-300">{{$lp->admin_description}}</div>
                        </div>
                    @elseif($lp->status == 'in_progress')
                        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-3 mb-3">
                            <div class="text-xs font-medium text-blue-800 dark:text-blue-200 mb-1">یادداشت ادمین:</div>
                            <div class="text-sm text-blue-700 dark:text-blue-300">{{$lp->admin_description}}</div>
                        </div>
                    @elseif($lp->status == 'rejected')
                        <div class="bg-rose-50 dark:bg-rose-900/20 rounded-lg p-3 mb-3">
                            <div class="text-xs font-medium text-rose-800 dark:text-rose-200 mb-1">دلیل رد:</div>
                            <div class="text-sm text-rose-700 dark:text-rose-300">{{$lp->admin_description}}</div>
                        </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <div class="text-xs text-slate-500">
                            درخواست شده {{ \Morilog\Jalali\Jalalian::forge($lp->created_at)->ago() }} • آخرین بروزرسانی   {{ \Morilog\Jalali\Jalalian::forge($lp->updated_at)->ago() }}
                        </div>
                        <div class="flex items-center gap-2">
                            @if($lp->status == 'pending')
                                <form method="post" action="{{route('admin.lessonplans.changeStatus',['lessonPlan'=>$lp->id,'status'=>'accepted'])}}">
                                    @method('put')
                                    @csrf
                                    <button class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-medium transition">تایید</button>
                                </form>
                                <form method="post" action="{{route('admin.lessonplans.changeStatus',['lessonPlan'=>$lp->id,'status'=>'rejected'])}}">
                                    @method('put')
                                    @csrf
                                <button class="px-3 py-1.5 rounded-lg bg-rose-600 hover:bg-rose-700 text-white text-xs font-medium transition">رد</button>
                                </form>
                            @elseif($lp->status == 'ready')
                                <a href="{{route('admin.lessonplans.edit',$lp->id)}}#add-file" class="px-3 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium transition">افزودن فایل/درس</a>
                            @elseif($lp->status == 'paid')
                                <a href="{{route('admin.lessonplans.edit',$lp->id)}}#add-file" class="px-3 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium transition">افزودن فایل/درس</a>
                            @elseif($lp->status == 'accepted')
                                <a href="{{route('admin.lessonplans.edit',$lp->id)}}#add-file" class="px-3 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium transition">افزودن فایل/درس</a>
                            @elseif($lp->status == 'in_progress')
                                <a href="{{route('admin.lessonplans.edit',$lp->id)}}#add-file" class="px-3 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium transition">افزودن فایل/درس</a>

                                <form method="post" action="{{route('admin.lessonplans.changeStatus',['lessonPlan'=>$lp->id,'status'=>'ready'])}}">
                                    @method('put')
                                    @csrf
                                    <button class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-medium transition">تحویل و اطلاع به کاربر</button>
                                </form>
                            @elseif($lp->status == 'rejected')
                                <form method="post" action="{{route('admin.lessonplans.changeStatus',['lessonPlan'=>$lp->id,'status'=>'accepted'])}}">
                                    @method('put')
                                    @csrf
                                    <button class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-medium transition">  تایید </button>
                                </form>


                            @endif
                                <form action="{{ route('admin.lessonplans.destroy',$lp->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$lp->id}}">@csrf @method('delete')


                                    <button class="px-3 py-1.5 rounded-lg bg-red-600 hover:bg-red-700 text-white text-xs font-medium transition">حذف</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Load More Button -->
    <div class="text-center mt-8">
       {{ $lessonplans->render() }}
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
@endpush


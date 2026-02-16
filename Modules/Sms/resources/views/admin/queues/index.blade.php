@extends('layouts.admin.master')

@push('styles')
    <style>
        .state-pending { @apply bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200; }
        .state-running { @apply bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200; }
        .state-stopped { @apply bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200; }
        .state-cancelled { @apply bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200; }

        .type-singleuser { @apply bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200; }
        .type-group { @apply bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200; }
        .type-all { @apply bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200; }
    </style>
@endpush
    @section('content')


<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Header -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-list-ul text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">صف پیام‌ها</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-400">مدیریت و نظارت بر صف ارسال پیام‌ها</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
               {{-- <div class="hidden sm:flex items-center gap-6 text-sm">
                    <div class="text-center">
                        <div class="font-semibold text-purple-600 dark:text-purple-400">۱۲</div>
                        <div class="text-gray-500 dark:text-gray-400">کل صف‌ها</div>
                    </div>
                    <div class="text-center">
                        <div class="font-semibold text-yellow-600 dark:text-yellow-400">۴</div>
                        <div class="text-gray-500 dark:text-gray-400">در انتظار</div>
                    </div>
                    <div class="text-center">
                        <div class="font-semibold text-blue-600 dark:text-blue-400">۲</div>
                        <div class="text-gray-500 dark:text-gray-400">در حال اجرا</div>
                    </div>
                </div>--}}

                <form method="GET">
                    <input type="hidden" name="refresh" value="1">
                    <button type="submit" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg hover:from-purple-700 hover:to-indigo-700 transition shadow-lg text-sm font-medium">
                        <i class="fas fa-sync-alt ml-2"></i>
                        بروزرسانی
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Queue Items -->
    <div class="space-y-6">
        @foreach($queues as $queue)
        <!-- Queue Item 1 -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white text-sm font-bold">#{{$queue->bodyId}}</span>
                        </div>
                        <div    >
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$queue->message_template->name ?? 'الگویی برای این صف وجود ندارد'}}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{$queue->description}}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium state-{{$queue->state}}">
                <i class="fas fa-play ml-1"></i>
                {{$queue->state}}
              </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium type-{{$queue->type}}">
                <i class="fas fa-user ml-1"></i>
                {{$queue->type}}
              </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">گیرنده </div>
                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                            @php
                                if($queue->user_id)
                                    echo $queue->user->name ;
                                elseif($queue->group_id)
                                    echo $queue->group->name;
                                else
                                    echo "همه کاربران";
                             @endphp
                        </div>

                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">قالب پیام</div>
                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{$queue->message_template->name ?? 'الگو حذف شده/وجود ندارد'}}</div>
                        <div class="text-xs text-gray-600 dark:text-gray-400">bodyId: {{$queue->message_template->bodyId ?? 'الگو حذف شده/وجود ندارد'}}</div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">زمان زمان‌بندی</div>
                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{\Morilog\Jalali\Jalalian::forge($queue->scheduled_at)}}</div>
                        <div class="text-xs text-gray-600 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($queue->scheduled_at)->format("H:i")}}</div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">ایجاد شده</div>
                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{\Morilog\Jalali\Jalalian::forge($queue->created_at)->ago()}}</div>
                        <div class="text-xs text-gray-600 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($queue->created_at)->format('H:i')}}</div>
                    </div>
                </div>

                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4 mb-4">
                    <div class="text-xs text-blue-600 dark:text-blue-400 mb-2">محتوای پیام:</div>
                    <div class="text-sm text-gray-900 dark:text-white">
                        {{$queue->message ?? $queue->message_template->message ?? 'الگو حذف شده/وجود ندارد'}}
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                        <span><i class="fas fa-clock ml-1"></i> آخرین بروزرسانی: {{\Morilog\Jalali\Jalalian::forge($queue->updated_at)->ago()}}</span>
                    </div>

                    <div class="flex items-center gap-2">

                        @if($queue->state == 'init' && isset($queue->message_template->id))
                            <form method="POST" action="{{route('admin.sms_queue.ready',$queue->id)}}" class="inline">
                                @csrf
                                <button type="submit" class="px-3 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition text-sm">
                                    <i class="fas fa-play ml-1"></i>
                                    افزودن به صف ها
                                </button>
                            </form>

                            <form method="POST" action="/admin/message-queues/3/delete" class="inline">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition text-sm">
                                    <i class="fas fa-trash ml-1"></i>
                                    حذف
                                </button>
                            </form>
                            <a href="{{route('admin.sms_queues.edit',$queue->id)}}" class="px-3 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg hover:bg-yellow-200 dark:hover:bg-yellow-800 transition text-sm">
                                <i class="fas fa-edit ml-1"></i>
                                ویرایش
                            </a>

                        @elseif($queue->state == 'pending' || $queue->state == 'completed' && isset($queue->message_template->id))
                        <form method="POST" action="{{route('admin.sms_queue.start',$queue->id)}}" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition text-sm">
                                <i class="fas fa-play ml-1"></i>
                                شروع
                            </button>
                        </form>
                            <a href="{{route('admin.sms_queues.edit',$queue->id)}}" class="px-3 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg hover:bg-yellow-200 dark:hover:bg-yellow-800 transition text-sm">
                                <i class="fas fa-edit ml-1"></i>
                                ویرایش
                            </a>

                            <form method="POST" action="/admin/message-queues/3/delete" class="inline">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition text-sm">
                                    <i class="fas fa-trash ml-1"></i>
                                    حذف
                                </button>
                            </form>

                        @elseif($queue->state == 'running' && isset($queue->message_template->id))
                            <form method="POST" action="/admin/message-queues/1/stop" class="inline">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition text-sm">
                                    <i class="fas fa-stop ml-1"></i>
                                    توقف
                                </button>
                            </form>

                        <form method="GET" action="/admin/message-queues/1" class="inline">
                            <button type="submit" class="px-3 py-2 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition text-sm">
                                <i class="fas fa-eye ml-1"></i>
                                مشاهده
                            </button>
                        </form>
                        @elseif($queue->state == 'cancelled' || $queue->state == 'stopped' && isset($queue->message_template->id))
                            <form method="GET" action="/admin/message-queues/3" class="inline">
                                <button type="submit" class="px-3 py-2 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition text-sm">
                                    <i class="fas fa-eye ml-1"></i>
                                    مشاهده
                                </button>
                            </form>

                            <form method="POST" action="/admin/message-queues/3/restart" class="inline">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="px-3 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition text-sm">
                                    <i class="fas fa-redo ml-1"></i>
                                    راه‌اندازی مجدد
                                </button>
                            </form>

                            <form method="POST" action="/admin/message-queues/3/delete" class="inline">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition text-sm">
                                    <i class="fas fa-trash ml-1"></i>
                                    حذف
                                </button>
                            </form>

                        @else
                            <a href="{{route('admin.sms_queues.edit',$queue->id)}}" class="px-3 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg hover:bg-yellow-200 dark:hover:bg-yellow-800 transition text-sm">
                                <i class="fas fa-edit ml-1"></i>
                                ویرایش
                            </a>
                            <form method="POST" action="/admin/message-queues/3/delete" class="inline">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition text-sm">
                                    <i class="fas fa-trash ml-1"></i>
                                    حذف
                                </button>
                            </form>

                        @endif



                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Empty State (when no queues exist) -->
    <!--
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-16 text-center">
      <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="fas fa-list-ul text-gray-400 text-3xl"></i>
      </div>
      <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">هیچ صف پیامی وجود ندارد</h3>
      <p class="text-gray-600 dark:text-gray-400 mb-6">صف‌های پیام شما اینجا نمایش داده می‌شوند.</p>
      <a href="/admin/message-queues/create"
         class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
        ایجاد صف جدید
      </a>
    </div>
    -->

</div>
</div>
    @endsection

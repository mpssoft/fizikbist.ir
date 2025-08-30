@extends('layouts.admin.master')

@section('content')

<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Box -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-sms text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">مدیریت پیامک</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-400">ارسال و زمان‌بندی پیام‌ها</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex items-center gap-6 text-sm">
                    <div class="text-center">
                        <div class="font-semibold text-green-600 dark:text-green-400">۱,۲۴۷</div>
                        <div class="text-gray-500 dark:text-gray-400">ارسال امروز</div>
                    </div>
                    <div class="text-center">
                        <div class="font-semibold text-blue-600 dark:text-blue-400">۲۳</div>
                        <div class="text-gray-500 dark:text-gray-400">در صف</div>
                    </div>
                    <div class="text-center">
                        <div class="font-semibold text-orange-600 dark:text-orange-400">۵</div>
                        <div class="text-gray-500 dark:text-gray-400">زمان‌بندی شده</div>
                    </div>
                </div>
                <button class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                    <i class="fas fa-cog"></i>
                </button>
            </div>
        </div>
    </div>
    @include('layouts.errors')
    <div class="grid grid-cols-1   gap-8">

        <!-- SMS Compose Form -->
        <div class="">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-paper-plane text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">ارسال پیامک</h2>
                </div>

                <form id="smsForm" class="space-y-6" method="post" action="{{route('admin.sms_queues.update',$smsQueue->id)}}">
                    <!-- Recipient Type -->
                    @csrf
                    @method('put')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-users text-blue-500 ml-2"></i>
                            نوع گیرنده
                        </label>
                        <select id="recipientType" name="type" onchange="handleRecipientTypeChange()"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="singleuser" {{$smsQueue->type=='singleuser'?'selected':''}}>کاربر منفرد</option>
                            <option value="group" {{$smsQueue->type=='group'?'selected':''}}>گروه کاربران</option>
                            <option value="all" {{$smsQueue->type=='all'?'selected':''}}>همه کاربران </option>
                        </select>
                    </div>

                    <!-- Recipient Selection -->
                    <div id="recipientSelection">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-user text-green-500 ml-2"></i>
                            انتخاب کاربر
                        </label>
                        <select id="singleUser" name="user_id"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">یک کاربر انتخاب کنید...</option>
                            @foreach(\App\Models\User::all() as $user)
                                <option value={{$user->id}} {{$smsQueue->user_id==$user->id?'selected':''}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- SMS Pattern Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-template text-purple-500 ml-2"></i>
                            الگوی پیامک
                        </label>
                        <select id="smsPattern" onchange="handlePatternChange()" name="message_template_id"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">یک الگو انتخاب کنید...</option>
                            @foreach(\Modules\Sms\Models\MessageTemplate::all() as $template)
                                <option value={{$template->id}} {{$smsQueue->message_template_id==$template->id?'selected':''}}>{{$template->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Message Content -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-comment text-orange-500 ml-2"></i>
                            متن پیام
                        </label>
                        <textarea id="messageContent" name="message"
                                  placeholder="پیام خود را اینجا بنویسید..."
                                  rows="4"
                                  maxlength="160"
                                  oninput="updateCharCount()"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none transition">{{$smsQueue->message}}</textarea>
                        <div class="flex justify-between items-center mt-2">
                <span class="text-xs text-gray-500 dark:text-gray-400">
                  <span id="charCount">۰</span>/۱۶۰ کاراکتر
                </span>
                            <span id="smsCount" class="text-xs text-blue-600 dark:text-blue-400">۱ پیامک</span>
                        </div>
                    </div>

                    <!-- Schedule Options -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-clock text-indigo-500 ml-2"></i>
                            زمان‌بندی ارسال
                        </label>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="schedule" value="now"
                                       onchange="handleScheduleChange()"
                                       class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                <span class="text-gray-700 dark:text-gray-300">ارسال فوری</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="schedule" value="scheduled"
                                       onchange="handleScheduleChange()"
                                       checked
                                       class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                <span class="text-gray-700 dark:text-gray-300">زمان‌بندی برای بعداً</span>
                            </label>
                        </div>
                    </div>

                    <!-- DateTime Picker (Hidden by default) -->
                    <div id="datetimeSection" >
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">تاریخ</label>
                                <input type="datetime-local" id="scheduleDate" name="scheduled_at" value="{{old('scheduled_at',$smsQueue->scheduled_at)}}"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>

                        </div>
                    </div>

                    <!-- Send Button -->
                    <button type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-xl hover:from-blue-700 hover:to-purple-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition shadow-lg">
                        <i class="fas fa-paper-plane ml-2"></i>
                        <span id="sendButtonText">ثبت تغییرات</span >
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

</div>
<script>

    // Handle recipient type change
    function handleRecipientTypeChange() {
        const recipientType = document.getElementById('recipientType').value;
        const recipientSelection = document.getElementById('recipientSelection');

        if (recipientType === 'singleuser') {
            recipientSelection.innerHTML = `
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            <i class="fas fa-user text-green-500 ml-2"></i>
            انتخاب کاربر
          </label>
          <select id="singleUser" name="user_id" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            <option value="">یک کاربر انتخاب کنید...</option>
            @foreach(\App\Models\User::all() as $user)
            <option value={{$user->id}} >{{$user->name}}</option>
            @endforeach
            </select>
`;
        } else if (recipientType === 'group') {
            recipientSelection.innerHTML = `
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            <i class="fas fa-users text-green-500 ml-2"></i>
            انتخاب گروه
          </label>
          <select id="userGroup" name="group_id" class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
            <option value="">یک گروه انتخاب کنید...</option>
             @foreach(\App\Models\Group::all() as $group)
            <option value={{$group->id}} >{{$group->name}}</option>
            @endforeach
            </select>
`;
        } else if (recipientType === 'all') {
            recipientSelection.innerHTML = `
          <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-xl p-4">
            <div class="flex items-center gap-3">
              <i class="fas fa-broadcast-tower text-blue-600 dark:text-blue-400"></i>
              <div>
                <div class="font-medium text-blue-900 dark:text-blue-100">Broadcast to All Users</div>
                <div class="text-sm text-blue-700 dark:text-blue-300">This message will be sent to all 1,513 registered users</div>
              </div>
            </div>
          </div>
        `;
        }
    }



    // Handle schedule change
    function handleScheduleChange() {
        const scheduleType = document.querySelector('input[name="schedule"]:checked').value;
        const datetimeSection = document.getElementById('datetimeSection');
        const sendButtonText = document.getElementById('sendButtonText');

        if (scheduleType === 'scheduled') {
            datetimeSection.classList.remove('hidden');

        } else {
            const formatted = new Date().toISOString().slice(0,16);

            document.getElementById('scheduleDate').value = formatted;

            datetimeSection.classList.add('hidden');

        }
    }



</script>

@endsection

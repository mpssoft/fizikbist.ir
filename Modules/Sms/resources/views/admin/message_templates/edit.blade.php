@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-plus text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">ویرایش قالب پیام </h1>

                </div>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="window.history.back()"
                        class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition text-sm font-medium">
                    <i class="fas fa-arrow-right ml-2"></i>
                    بازگشت
                </button>

            </div>
        </div>
    </div>

    <div class=" gap-8">

        <!-- Main Form -->
        <div class="">
            <form id="createTemplateForm" class="space-y-8" method="post" action="{{route('admin.message_templates.update',$messageTemplate->id)}}">
            @csrf
                @method('put')
                <!-- Basic Information -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-info-circle text-white text-sm"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">اطلاعات پایه</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Template Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-tag text-blue-500 ml-2"></i>
                                نام قالب *
                            </label>
                            <input type="text" id="templateName" name="name" required value="{{old('name',$messageTemplate->name)}}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                   placeholder="نام قالب را وارد کنید...">
                            <div id="nameError" class="hidden text-red-500 text-sm mt-1"></div>
                        </div>

                        <!-- Body ID -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-code text-green-500 ml-2"></i>
                                شناسه قالب (bodyId) *
                            </label>
                            <input type="text" id="bodyId" name="bodyId" required value="{{old('bodyId',$messageTemplate->bodyId)}}"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                   placeholder="مثال: 987654"
                                   >
                            <div id="bodyIdError" class="hidden text-red-500 text-sm mt-1"></div>
                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                شماره متنی که در ملی پیامک ایجاد کرده اید
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-comment-alt text-white text-sm"></i>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">محتوای پیام</h2>
                        </div>

                    </div>

                    <!-- Message Textarea -->
                    <div class="mb-6">
              <textarea id="messageContent" name="message" rows="6" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 resize-none transition"
                        placeholder="متن پیام خود را وارد کنید... از متغیرها مانند {name} استفاده کنید"
                        >value="{{old('message',$messageTemplate->message)}}"</textarea>
                        <div id="messageError" class="hidden text-red-500 text-sm mt-1"></div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                            <i class="fas fa-info-circle ml-1"></i>
                           این متن صرفا نمایشی  است و متن اصلی در ملی پیامک باید ایجاد شود
                        </div>
                    </div>

                                   </div>


                <!-- Form Actions -->
                <div class="flex gap-4">

                    <button type="submit"
                            class="flex px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-xl hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition shadow-lg">
                        <i class="fas fa-check ml-2"></i>
                        <span id="submitButtonText">ثبت قالب</span>
                    </button>
                </div>
            </form>
        </div>


    </div>
</div>



</div>

@endsection

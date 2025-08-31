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
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">ایجاد قالب پیام جدید</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-400">قالب پیامک یا پیام جدید ایجاد کنید</p>
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
            <form id="createTemplateForm" class="space-y-8" method="post" action="{{route('admin.message_templates.store')}}">
            @csrf
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
                            <input type="text" id="templateName" name="name" required
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
                            <input type="text" id="bodyId" name="bodyId" required
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
                        ></textarea>
                        <div id="messageError" class="hidden text-red-500 text-sm mt-1"></div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                            <i class="fas fa-info-circle ml-1"></i>
                           این متن صرفا نمایشی  است و متن اصلی در ملی پیامک باید ایجاد شود
                        </div>
                    </div>
                    <!-- Quick Variables -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            <i class="fas fa-magic text-indigo-500 ml-2"></i>
                            متغیرهای سریع
                        </label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
                            <button type="button" onclick="insertVariable('name')"
                                    class="variable-tag px-3 py-2 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-800 transition text-sm font-medium">
                                <i class="fas fa-user ml-1"></i>
                                {name}
                            </button>
                            <button type="button" onclick="insertVariable('mobile')"
                                    class="variable-tag px-3 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg hover:bg-green-200 dark:hover:bg-green-800 transition text-sm font-medium">
                                <i class="fas fa-phone ml-1"></i>
                                {mobile}
                            </button>
                            <button type="button" onclick="insertVariable('email')"
                                    class="variable-tag px-3 py-2 bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300 rounded-lg hover:bg-purple-200 dark:hover:bg-purple-800 transition text-sm font-medium">
                                <i class="fas fa-envelope ml-1"></i>
                                {email}
                            </button>
                            <button type="button" onclick="insertVariable('text')"
                                    class="variable-tag px-3 py-2 bg-orange-100 dark:bg-orange-900 text-orange-700 dark:text-orange-300 rounded-lg hover:bg-orange-200 dark:hover:bg-orange-800 transition text-sm font-medium">
                                <i class="fas fa-key ml-1"></i>
                                {text}
                            </button>

                        </div>
                    </div>
                                   </div>


                <!-- Form Actions -->
                <div class="flex gap-4">

                    <button type="submit"
                            class="flex px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-xl hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition shadow-lg">
                        <i class="fas fa-check ml-2"></i>
                        <span id="submitButtonText">ایجاد قالب</span>
                    </button>
                </div>
            </form>
        </div>


    </div>
</div>



</div>

<!-- Custom Variable Modal -->
<div id="customVariableModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-md w-full p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">افزودن متغیر سفارشی</h3>
            <button onclick="closeCustomVariableModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نام متغیر</label>
                <input type="text" id="customVariableName"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                       placeholder="مثال: order_id">
            </div>

            <div class="flex gap-3">
                <button onclick="closeCustomVariableModal()"
                        class="flex-1 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                    انصراف
                </button>
                <button onclick="addCustomVariable()"
                        class="flex-1 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    افزودن
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script >
        // Insert variable into message
        function insertVariable(variable) {
            const messageContent = document.getElementById('messageContent');
            const cursorPos = messageContent.selectionStart;
            const textBefore = messageContent.value.substring(0, cursorPos);
            const textAfter = messageContent.value.substring(messageContent.selectionEnd);

            messageContent.value = textBefore + `{${variable}}` + textAfter;
            messageContent.focus();
            messageContent.setSelectionRange(cursorPos + variable.length + 2, cursorPos + variable.length + 2);

            updateCharacterCount();
            updatePreview();
        }
        // Custom variable modal
        function showCustomVariableModal() {
            document.getElementById('customVariableModal').classList.remove('hidden');
            document.getElementById('customVariableName').focus();
        }

        function closeCustomVariableModal() {
            document.getElementById('customVariableModal').classList.add('hidden');
            document.getElementById('customVariableName').value = '';
        }

        function addCustomVariable() {
            const variableName = document.getElementById('customVariableName').value.trim();

            if (!variableName) {
                alert('لطفاً نام متغیر را وارد کنید');
                return;
            }

            if (!/^[a-zA-Z_][a-zA-Z0-9_]*$/.test(variableName)) {
                alert('نام متغیر باید با حرف یا _ شروع شود و فقط شامل حروف، اعداد و _ باشد');
                return;
            }

            insertVariable(variableName);
            closeCustomVariableModal();
        }

    </script>
@endpush

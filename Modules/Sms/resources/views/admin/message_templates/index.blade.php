@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Box -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-alt text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">مدیریت قالب‌های پیام</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-400">مشاهده و مدیریت قالب‌های پیامک و پیام</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden sm:flex items-center gap-6 text-sm">

                </div>
                <button onclick="createNewTemplate()" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 transition shadow-lg text-sm font-medium">
                    <i class="fas fa-plus ml-2"></i>
                    قالب جدید
                </button>
            </div>
        </div>
    </div>
{{--

    <!-- Filters and Search -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
            <div class="flex items-center gap-4 w-full sm:w-auto">
                <div class="relative flex-1 sm:flex-none sm:w-80">
                    <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="searchTemplates" placeholder="جستجو در قالب‌ها..."
                           oninput="filterTemplates()"
                           class="w-full pr-10 pl-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <select id="statusFilter" onchange="filterTemplates()"
                        class="px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <option value="all">همه وضعیت‌ها</option>
                    <option value="active">فعال</option>
                    <option value="inactive">غیرفعال</option>
                </select>

                <select id="sortBy" onchange="sortTemplates()"
                        class="px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <option value="name">مرتب‌سازی بر اساس نام</option>
                    <option value="created">تاریخ ایجاد</option>
                    <option value="usage">میزان استفاده</option>
                </select>

                <button onclick="toggleView()" id="viewToggle"
                        class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                    <i class="fas fa-th-large"></i>
                </button>
            </div>
        </div>
    </div>
--}}

    <!-- Templates Grid -->
    <div id="templatesGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($templates as $template)

        <!-- Welcome Message Template -->
        <div class="template-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-all duration-300" data-status="active" data-name="پیام خوش‌آمدگویی" data-created="2024-01-15" data-usage="245">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-hand-wave text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{$template->name}}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">bodyId: {{$template->bodyId}}</p>
                    </div>
                </div>

            </div>

            <div class="mb-4">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3 mb-3">
                    <p class="text-sm text-gray-700 dark:text-gray-300 message-preview" id="message-1">
                        {{$template->message}}
                    </p>

                </div>

            </div>

            <div class="space-y-3 mb-6">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">تاریخ ایجاد:</span>
                    <span class="text-sm text-gray-900 dark:text-white">{{\Morilog\Jalali\Jalalian::forge($template->created_at)->ago()}}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">آخرین بروزرسانی:</span>
                    <span class="text-sm text-gray-900 dark:text-white">{{\Morilog\Jalali\Jalalian::forge($template->updated_at)->ago()}}</span>
                </div>
            </div>

            <div class="flex items-center gap-2">

                <a href="{{route('admin.message_templates.edit',$template->id)}}"
                        class="px-3 py-2 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.message_templates.destroy',$template->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$template->id}}">@csrf @method('delete')
                <button
                        class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition">
                    <i class="fas fa-trash"></i>
                </button>
                </form>
            </div>
            </div>

        @endforeach
    </div>


</div>
</div>
@endsection
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script>

        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'حذف الگو',
                text: 'آیا مطمئن هستید که می‌خواهید این الگو را حذف کنید؟',
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

@extends('layouts.admin.master')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300"><!-- Sidebar -->
<!-- Main Content -->

    <main class="p-6">
        <div class="max-w-7xl mx-auto"><!-- Header Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
                <div class="flex items-center justify-between p-6">
                    <div class="flex items-center gap-4"><button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"> <i class="fas fa-bars text-lg"></i> </button>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-3"><i class="fas fa-list text-blue-600 dark:text-blue-400"></i> لیست دسته‌بندی‌ها</h1>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">مشاهده و مدیریت همه دسته‌بندی‌ها</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{route('admin.categories.create')}}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-blue-600
                                  text-white font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-blue-700
                                  hover:shadow-xl hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                             دسته جدید
                        </a>
                    </div>
                </div>
            </div><div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Category Card 1 -->
                @foreach($categories as $category)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-{{$category->color}}-100 dark:bg-{{$category->color}}-900/30 rounded-lg flex items-center justify-center"><i class="fas fa-{{$category->icon}} text-{{$category->color}}-600 dark:text-{{$category->color}}-400"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 dark:text-gray-100">{{$category->name}}</h3>
                                    @if($category->status == 'active')
                                    <span class="inline-flex items-center gap-1 px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded text-xs mt-1">
                                        <i class="fas fa-check-circle text-xs"></i>
                                        فعال </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2 py-1 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 rounded text-xs mt-1"> <i class="fas fa-times-circle text-xs"></i> غیرفعال </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">{{$category->description}}</p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700"><span class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1"> <i class="fas fa-file-alt text-xs"></i> 24 مقاله </span>
                            <div class="flex items-center gap-2">

                                <a href="{{route('admin.categories.edit',$category->id)}}" class="p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"> <i class="fas fa-edit"></i> </a>
                                <form action="{{ route('admin.categories.destroy',$category->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$category->id}}">@csrf @method('delete')
                                <button class="p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"> <i class="fas fa-trash"></i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- Category Card 2 -->
                @endforeach

            </div>
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
                title: 'حذف دسته',
                text: 'آیا مطمئن هستید که می‌خواهید این دسته را حذف کنید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor:'red',
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

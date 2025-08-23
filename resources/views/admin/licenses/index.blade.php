@extends('layouts.admin.master')

@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-7xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">مدیریت مجوزها</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-violet-600 to-purple-600 shadow-lg flex items-center justify-center">
                        <i class="fas fa-key text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">مدیریت مجوزها</h1>
                        <p class="text-gray-600 dark:text-gray-300">مشاهده و مدیریت مجوزهای SpotPlayer کاربران</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">

                    <a href="{{route('admin.licenses.create')}}"
                       class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition-all">
                        <i class="fas fa-plus"></i>
                        مجوز جدید
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <form method="GET" action="/admin/licenses" class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                <div class="lg:col-span-4">
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">جستجو</label>
                    <input id="search" name="search" type="text" placeholder="نام کاربر، ایمیل، نام دوره..."
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                </div>
                <div class="lg:col-span-2">
                    <label for="course_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">دوره</label>
                    <select id="course_id" name="course_id"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="0">همه دوره‌ها</option>
                        @foreach( App\Models\Course::all() as $course )

                            <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach

                    </select>
                </div>


                <div class="lg:col-span-2 flex items-end">
                    <button type="submit"
                            class="w-full px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition">
                        <i class="fas fa-search ml-2"></i>
                        جستجو
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Licenses Cards -->
    <div class="space-y-4">

        <!-- License Card 1 -->
        @foreach($licenses as $license)
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 hover:shadow-2xl transition-all duration-300">
            <div class="p-6">
                <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex flex-1 ">
                    <!-- User Info -->
                    <div class="flex items-center gap-4 min-w-0 flex-1">
                        <div class="w-12 h-12   rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                           <p class=""> {{$license->user->name[0]}}</p>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="text-lg font-semibold text-gray-900 dark:text-white">{{$license->user->name}}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 ltr:font-mono">{{$license->user->mobile}}</div>

                        </div>
                    </div>

                    <!-- Course Info -->
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">دوره</div>
                        <div class="text-base font-semibold text-gray-900 dark:text-white">{{$license->course->title}}  </div>

                    </div>
                    </div>
                    <div class="flex flex-1 flex-row items-center justify-between ">

                    <!-- Status & Date -->
                    <div class="flex-1  ">
              <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full text-sm font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900 dark:text-emerald-200">
                <i class="fas fa-check-circle"></i>
                فعال
              </span>
                        <div class="text-right">
                            <div class="text-sm text-gray-900 dark:text-white">{{\Morilog\Jalali\Jalalian::forge($license->created_at)->format(" Y-m-d ")}}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{{\Morilog\Jalali\Jalalian::forge($license->created_at)->format(" H:i ")}}</div>
                        </div>
                    </div>
                        <!-- SpotPlayer Info -->
                        <div  dir="ltr" class="flex-1  ">
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">SpotPlayer</div>
                            <div class="space-y-1">
                                <div class="text-xs text-gray-600 dark:text-gray-300">ID: {{$license->spotplayer_id}}</div>
                                <div class="text-xs text-gray-600 dark:text-gray-300 ltr:font-mono truncate w-40">KEY: {{$license->spotplayer_key}}</div>

                            </div>
                        </div>

                    </div>
                    <!-- Actions -->
                    <div class=" flex  items-center gap-2">
                        <a href="{{route('admin.licenses.show',$license->id)}}" class="p-2.5 rounded-xl border-2 border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('admin.licenses.edit',$license->id)}}" class="p-2.5 rounded-xl border-2 border-blue-200 text-blue-700 hover:bg-blue-50 transition">
                            <i class="fas fa-edit"></i>
                        </a>
                       {{-- <form method="POST" action="/admin/licenses/1/refresh" class="inline">
                            <button type="submit" class="p-2.5 rounded-xl border-2 border-green-200 text-green-700 hover:bg-green-50 transition">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </form>--}}
                        <form action="{{ route('admin.licenses.destroy',$license->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$license->id}}">@csrf @method('delete')
                            <button type="submit" class="p-2.5 rounded-xl border-2 border-rose-200 text-rose-700 hover:bg-rose-50 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <!-- Pagination -->
    <div class="flex items-center justify-between bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 px-6 py-4">
        {{ $licenses->render() }}
    </div>
</div>
</div>

{{-- SweetAlert Confirmation --}}
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
    <script>

        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'حذف لایسنس',
                text: 'آیا مطمئن هستید که می‌خواهید این لایسنس را حذف کنید؟',
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

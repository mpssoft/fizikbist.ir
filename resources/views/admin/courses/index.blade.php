@extends('layouts.admin.master')

@section('content')
    <div class="container mx-auto px-4 py-6" x-data>
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">لیست دوره‌ها</h1>
            <a href="{{ route('admin.courses.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded transition
          hover:bg-green-700
          dark:bg-green-700 dark:hover:bg-green-800 dark:text-white">
                ایجاد دوره جدید
            </a>

        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <th class="p-3">عنوان</th>
                    <th class="p-3">قیمت</th>
                    <th class="p-3">تخفیف</th>
                    <th class="p-3">انقضای تخفیف</th>
                    <th class="p-3">مدرس</th>
                    <th class="p-3">تصویر</th>
                    <th class="p-3">توضیحات</th>
                    <th class="p-3">عملیات</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($courses as $course)
                    <tr x-data="{
                    discountExpires: '{{ optional($course->discount_expires_at)->format('Y-m-d H:i:s') }}',
                    remaining: '',
                    init() {
                        if (this.discountExpires) {
                            setInterval(() => {
                                const diff = new Date(this.discountExpires) - new Date();
                                if (diff > 0) {
                                    const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                                    const h = Math.floor((diff / (1000 * 60 * 60)) % 24);
                                    const m = Math.floor((diff / (1000 * 60)) % 60);
                                    this.remaining = `${d} روز ${h}س ${m}د`;
                                } else {
                                    this.remaining = 'منقضی شده';
                                }
                            }, 60000);
                        }
                    }
                }">

                        <td class="p-3 font-semibold">{{ $course->title }}</td>
                        <td class="p-3 text-green-700">{{ number_format($course->price) }} تومان</td>
                        <td class="p-3 text-red-600">
                            @if($course->discount_price > 0)
                                {{ number_format($course->discount_price) }} تومان
                            @else
                                -
                            @endif
                        </td>
                        <td class="p-3"><span x-text="remaining"></span></td>
                        <td class="p-3">{{ optional($course->teacher)->name ?? '-' }}</td>
                        <td class="p-3">
                            @if($course->cover_image)
                                <img src="{{ asset('storage/' . $course->cover_image) }}" class="w-12 h-12 object-cover rounded shadow">
                            @else
                                <span class="text-gray-400 italic">بدون تصویر</span>
                            @endif
                        </td>

                        <td class="p-3 truncate max-w-xs" title="{{ $course->description }}">
                            {{ \Illuminate\Support\Str::limit($course->description, 50) }}
                        </td>
                        <td class="p-3 space-x-2 text-center flex">

                            {{-- Edit Button --}}
                            <a href="{{ route('admin.courses.edit', $course) }}"
                               class="ml-2 inline-flex items-center justify-center bg-blue-500 text-white w-8 h-8 rounded-full hover:bg-blue-600"
                               title="ویرایش">
                                <i class="fas fa-edit text-xs"></i>
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="inline-block" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center justify-center bg-red-500 text-white w-8 h-8 rounded-full hover:bg-red-600"
                                        title="حذف">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </form>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $courses->links() }}
        </div>
    </div>

    {{-- SweetAlert Confirmation --}}
    @push('scripts')
        <script src="/js/modules/sweetalert2.js"></script>
        <script>
            function confirmDelete(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'حذف دوره',
                    text: 'آیا مطمئن هستید که می‌خواهید این دوره را حذف کنید؟',
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

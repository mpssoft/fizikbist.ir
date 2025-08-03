@extends('layouts.admin.master')

@section('content')

    <div class="max-w-4xl mx-auto m-10 p-6 rounded-xl shadow
            bg-gray-100 text-gray-700
            dark:bg-gray-700 dark:text-gray-200">
        <h1 class="text-2xl font-bold mb-4">ایجاد دوره جدید</h1>


        <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            {{-- عنوان دوره --}}
            <div>
                <label class="block font-medium">عنوان دوره</label>
                <input type="text" name="title"
                       class="w-full border p-2 rounded
                          bg-white dark:bg-gray-800
                          text-gray-800 dark:text-gray-100
                          border-gray-300 dark:border-gray-600"
                       required>
            </div>

            {{-- قیمت --}}
            <div>
                <label class="block font-medium">قیمت (تومان)</label>
                <input type="number" name="price"
                       class="w-full border p-2 rounded
                          bg-white dark:bg-gray-800
                          text-gray-800 dark:text-gray-100
                          border-gray-300 dark:border-gray-600"
                       value="0" required>
            </div>

            {{-- قیمت با تخفیف --}}
            <div>
                <label class="block font-medium">قیمت با تخفیف</label>
                <input type="number" name="discount_price"
                       class="w-full border p-2 rounded
                          bg-white dark:bg-gray-800
                          text-gray-800 dark:text-gray-100
                          border-gray-300 dark:border-gray-600"
                       value="0">
            </div>

            {{-- تاریخ انقضای تخفیف --}}
            <div>
                <label class="block font-medium">تاریخ انقضای تخفیف</label>
                <input type="datetime-local" name="discount_expires_at"
                       class="w-full border p-2 rounded
                          bg-white dark:bg-gray-800
                          text-gray-800 dark:text-gray-100
                          border-gray-300 dark:border-gray-600">
            </div>

            {{-- مدرس --}}
            <div>
                <label class="block font-medium">مدرس</label>
                <select name="teacher_id"
                        class="w-full border p-2 rounded
                           bg-white dark:bg-gray-800
                           text-gray-800 dark:text-gray-100
                           border-gray-300 dark:border-gray-600">
                    <option value="">-- انتخاب مدرس --</option>
                    {{-- Add options dynamically --}}
                </select>
            </div>

            {{-- تصویر کاور --}}
            <div>
                <label class="block font-medium">تصویر کاور</label>
                <input type="file" name="cover_image"
                       class="w-full border p-2 rounded
                          bg-white dark:bg-gray-800
                          text-gray-800 dark:text-gray-100
                          border-gray-300 dark:border-gray-600">
            </div>

            {{-- توضیحات --}}
            <div>
                <label class="block font-medium">توضیحات</label>
                <textarea name="description" rows="4"
                          class="w-full border p-2 rounded
                             bg-white dark:bg-gray-800
                             text-gray-800 dark:text-gray-100
                             border-gray-300 dark:border-gray-600"></textarea>
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded
                       hover:bg-blue-700
                       dark:bg-blue-700 dark:hover:bg-blue-800">
                ذخیره دوره
            </button>
        </form>
    </div>

@endsection

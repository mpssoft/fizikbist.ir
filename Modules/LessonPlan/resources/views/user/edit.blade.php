@extends('layouts.user.master')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-sky-50 p-8  via-indigo-50 to-fuchsia-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 text-slate-900 dark:text-slate-100">

<!-- Header -->
<header class="bg-white max-w-5xl mx-6 dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
    <div class=" mx-auto sm:px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-600 to-fuchsia-600 flex items-center justify-center">
                    <svg viewBox="0 0 24 24" class="w-5 h-5 text-white fill-current">
                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold">ویرایش درسنامه</h1>

                </div>
            </div>


        </div>
    </div>
</header>

<main class="max-w-5xl mx-auto  sm:px-6 ">


    <form id="lesson-plan-form"  method="POST" action="{{route('user.lessonplans.update',$lessonplan->id)}}"  class="space-y-8">
    @method('PUT')
        @csrf
        <!-- Basic Information -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-bold flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                    اطلاعات پایه
                </h2>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">عنوان درسنامه *</label>
                        <input type="text" id="title" value="{{old('title',$lessonplan->title)}}" name="title"
                               class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                               required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">درخواست کننده: </label>
                        <input type="text" value="{{$lessonplan->user->name}} : {{$lessonplan->user->mobile}}"
                               class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-500"
                               readonly>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">توضیحات درسنامه *</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                              >{{$lessonplan->description}}</textarea>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">پایه تحصیلی *</label>
                        <select id="grade_id" name="grade_id" class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" required>
                            <option value="">انتخاب کنید</option>
                            @foreach(\App\Models\Grade::all() as $grade)
                                <option value="{{$grade->id}}" {{$lessonplan->grade_id==$grade->id? 'selected':''}}>{{$grade->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">تاریخ درخواست </label>
                        <input type="text" id="deliveryDate" value="{{\Morilog\Jalali\Jalalian::forge($lessonplan->created_at)->ago()}}"
                               class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-500"
                               readonly>
                    </div>
                </div>
            </div>
        </div>


        <!-- File Management -->
        <div id="add-file" class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-bold flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                     ضمیمه کردن فایل
                </h2>
            </div>
            <div class="p-6 space-y-6">

                    {{-- Attached files --}}
                    <div class="mt-6">
                        <h3 class="font-semibold mb-2">
                            فایل‌های پیوست‌شده
                        </h3>

                        @if ($lessonplan->attachments->count())
                            <ul class="space-y-2">
                                @foreach ($lessonplan->attachments as $file)
                                    <li
                                        class="flex items-center justify-between bg-gray-200 dark:bg-gray-700 p-3 rounded file-row"
                                        data-id="{{ $file->id }}"
                                    >
                                        <div class="flex items-center gap-2">
                                            <i class="fa-solid fa-paperclip text-gray-600"></i>

                                            <a
                                                href="{{ asset('storage/' . $file->path) }}"
                                                target="_blank"
                                                class="text-blue-600 hover:underline"
                                            >
                                                {{ $file->original_name }}
                                            </a>
                                        </div>

                                        <button
                                            type="button"
                                            class="text-red-600 remove-file"
                                            data-id="{{ $file->id }}"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500 text-sm">
                                فایلی پیوست نشده است.
                            </p>
                        @endif
                    </div>




            </div>
                <div class="p-6 space-y-6">

                <div class="space-y-4" id="file-upload-wrapper">
                    <!-- TEMPLATE (never removed) -->
                    <div class="file-item   flex hidden items-center gap-3" id="file-template">
                        <input
                            type="file"
                            class="file-input block w-full text-sm
                   text-slate-700 dark:text-slate-200
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-lg file:border-0
                   file:text-sm file:font-semibold
                   file:bg-slate-100 file:text-slate-700
                   dark:file:bg-slate-700 dark:file:text-slate-200
                   bg-white dark:bg-slate-800
                   border border-slate-300 dark:border-slate-600
                   rounded-lg"
                            name="files[]"
                        />

                        <button
                            type="button"
                            class="remove-btn  px-3 py-2 text-sm rounded-lg
                   bg-red-500 text-white hover:bg-red-600">
                            حذف
                        </button>
                    </div>
                    <div class="file-item flex items-center gap-3">
                        <input
                            type="file"
                            class="file-input block w-full text-sm
                   text-slate-700 dark:text-slate-200
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-lg file:border-0
                   file:text-sm file:font-semibold
                   file:bg-slate-100 file:text-slate-700
                   dark:file:bg-slate-700 dark:file:text-slate-200
                   bg-white dark:bg-slate-800
                   border border-slate-300 dark:border-slate-600
                   rounded-lg"
                            name="files[]"
                        />

                        <button
                            type="button"
                            class="remove-btn hidden px-3 py-2 text-sm rounded-lg
                   bg-red-500 text-white hover:bg-red-600">
                            حذف
                        </button>
                    </div>

                    <button
                        type="button"
                        id="add-file-btn"
                        class="px-4 py-2 text-sm rounded-lg
               bg-slate-600 text-white hover:bg-slate-700
               dark:bg-slate-700 dark:hover:bg-slate-600">
                        افزودن فایل جدید
                    </button>

                </div>

            </div>
        </div>


        <!-- Action Buttons -->
        <div class="flex items-center justify-between p-6 rounded-2xl border border-slate-200 dark:border-slate-700">
            <a href="{{route('admin.lessonplans.index')}}"  class="px-6 py-3 rounded-lg border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 font-medium transition">
                انصراف
            </a>
            <div class="flex items-center gap-3">

                <button id="submit-btn" type="submit" class="px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-medium transition">
                     <span class="btn-text">ذخیره تغییرات</span>     <i class="fa-solid fa-spinner fa-spin loader hidden"></i>
                </button>
            </div>
        </div>
    </form>
</main>
</div>
@endsection
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>

    <script>
        document.getElementById('add-file-btn').addEventListener('click', function () {
            const wrapper = document.getElementById('file-upload-wrapper');
            const template = document.getElementById('file-template');

            const item = template.cloneNode(true);
            item.classList.remove('hidden');
            item.removeAttribute('id');
            item.removeAttribute('data-file-id');

            item.querySelector('.file-input').value = '';


            wrapper.insertBefore(item, this);
        });


        document.addEventListener('change', function (e) {
            if (!e.target.classList.contains('file-input')) return;

            const file = e.target.files[0];
            if (!file) return;

            if (file.size > 10 * 1024 * 1024) {
                alert('حجم فایل نباید بیشتر از ۱۰ مگابایت باشد');
                e.target.value = '';

            }


        });

        document.addEventListener('click', function (e) {
            if (!e.target.classList.contains('remove-btn')) return;

            const item = e.target.closest('.file-item');

            item.remove();
        });

        document.getElementById('lesson-plan-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;

            const submitBtn = document.getElementById('submit-btn');
            const btnText = submitBtn.querySelector('.btn-text');
            const loader = submitBtn.querySelector('.loader');

            // show loader
            submitBtn.disabled = true;
            btnText.textContent = 'در حال ارسال...';
            loader.classList.remove('hidden');


            const formData = new FormData(form);
            const url = form.action;
            fetch( url, {
                method: 'POST' ,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
                .then(async res => {
                    const text = await res.text();
                    try {
                        return JSON.parse(text);

                    } catch {
                        Swal.fire({
                            title: 'خطا در بروزرسانی ',
                            text: 'خطایی هنگام بروزرسانی درسنامه به وجود آمد !',
                            icon: 'warning',
                            confirmButtonText: 'بستن',
                        })
                    }
                })
                .then(data => {
                    if (data.success) {

                        Swal.fire({
                            title: 'برورزرسانی موفق ',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'بستن',
                        })
                    } else {
                        Swal.fire({
                            title: ' در انتظار  ',
                            text: data.message,
                            icon: 'warning',
                            confirmButtonText: 'بستن',
                        })
                    }
                })
                .catch(err => console.error(err))

                .finally(() => {
                    submitBtn.disabled = false;
                    btnText.textContent = 'ثبت درخواست';
                    loader.classList.add('hidden');
                });
        });

        document.querySelectorAll('.remove-file').forEach(btn => {
            btn.addEventListener('click', function () {
                if (!confirm('حذف فایل؟')) return;

                const fileId = this.dataset.id;
                const row = this.closest('.file-row');

                fetch(`/user/lessonplan-files/${fileId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            row.remove();
                        } else {
                            alert(data.message || 'خطا در حذف فایل');
                        }
                    });
            });
        });
    </script>


@endpush

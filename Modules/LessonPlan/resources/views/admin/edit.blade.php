@extends('layouts.admin.master')

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


    <form id="editForm" method="post" action="{{route('admin.lessonplans.update',$lessonplan->id)}}" class="space-y-8">
    @method('put')
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
                    <textarea id="description" rows="4"
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

        <!-- Status Management -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-bold flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    مدیریت وضعیت
                </h2>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">وضعیت درسنامه *</label>
                        <select id="status" name="status" class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" required>
                            <option value="pending" {{$lessonplan->status == 'pending' ? 'selected':''}}>در انتظار</option>
                            <option value="accepted" {{$lessonplan->status == 'accepted' ? 'selected':''}}>تایید شده</option>
                            <option value="rejected" {{$lessonplan->status == 'rejected' ? 'selected':''}}>رد شده</option>
                            <option value="paid" {{$lessonplan->status == 'paid' ? 'selected':''}}>پرداخت شده</option>
                            <option value="in_progress" {{$lessonplan->status == 'in_progress' ? 'selected':''}}>در حال انجام</option>
                            <option value="ready" {{$lessonplan->status == 'ready' ? 'selected':''}}>آماده</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2"> تعیین تاریخ تحویل</label>
                        <input type="datetime-local" id="deliveryDate" name="delivery_time" value="{{$lessonplan->delivery_time}}"
                               class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 "
                               >
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2"> تعیین هزینه</label>
                        <input type="text" id="deliveryDate" name="price" value="{{$lessonplan->price}}"
                               class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 "
                               >
                    </div>
                    </div>
                </div>


            </div>

        <!-- Admin Notes -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-bold flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-fuchsia-500"></span>
                    یادداشت‌های ادمین
                </h2>
            </div>
            <div class="p-6">
          <textarea id="adminNotes" rows="4" name="admin_description"
                    class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    >{{$lessonplan->admin_description}}</textarea>
            </div>
        </div>

        <!-- File Management -->
        <div id="add-file" class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
            <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-bold flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    مدیریت فایل‌ها
                </h2>
            </div>
            <div class="p-6 space-y-6">

                <!-- Current Files -->
                <div>
                    <h3 class="text-sm font-medium mb-3">فایل‌های موجود</h3>
                    <div class="space-y-3" id="currentFiles">
                        <ul id="attached-items">
                            @foreach($lessonplan->items() as $item)
                                <li data-id="{{ $item->id }}" data-type="{{ class_basename($item) }}" data-title="{{ $item->title }}"
                                    class="flex items-center mb-2 justify-between p-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800"
                                >

                                    <div>  <span class="fas {{class_basename($item) == "File"? 'fa-file-download text-yellow-500':'fa-chalkboard-teacher text-green-500'}}  w-5 h-5"></span>
                                        <span class="text-xs text-gray-500 mx-4">[{{class_basename($item) == "Lesson"?"درس":"فایل"}}]</span> {{ $item->title ?? $item->name }}</div>
                                    <button class="remove-item-btn p-2 rounded-lg border border-rose-300 dark:border-rose-700 text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-900/20 transition">
                                        <span class="fas fa-trash-alt  w-5 h-5"></span>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Search Input -->
                    <input type="text" id="search-item"
                           class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                           placeholder="جستجوی درس یا فایل ..."
                           autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false"
                    >

                    <!-- Search Results -->
                    <div id="search-results" class="hidden mt-2 border rounded p-2"></div>




                </div>


            </div>
        </div>


        <!-- Action Buttons -->
        <div class="flex items-center justify-between p-6 rounded-2xl border border-slate-200 dark:border-slate-700">
            <a href="{{route('admin.lessonplans.index')}}"  class="px-6 py-3 rounded-lg border border-slate-300 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 font-medium transition">
                انصراف
            </a>
            <div class="flex items-center gap-3">

                <button type="submit" class="px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-medium transition">
                    ذخیره تغییرات
                </button>
            </div>
        </div>
    </form>
</main>
</div>
@endsection
@push('scripts')
    <script>
        const searchInput = document.getElementById('search-item');
        const resultsDiv = document.getElementById('search-results');
        const attachedList = document.getElementById('attached-items');

        let timeout = null;
        document.addEventListener('click', function (e) {
            if (!resultsDiv.contains(e.target) && !searchInput.contains(e.target)) {
                resultsDiv.classList.add('hidden'); // or searchResults.style.display = 'none';
            }
        });
        searchInput.addEventListener('keyup', function() {
            clearTimeout(timeout);
            const query = this.value.trim();
            if (query.length < 2) {
                resultsDiv.innerHTML = '';
                return;
            }

            timeout = setTimeout(async () => {
                try {
                    const response = await fetch(`/lesson-plan/{{ $lessonplan->id }}/search-items?q=${encodeURIComponent(query)}`, {
                        headers: { 'Accept': 'application/json' }
                    });
                    const data = await response.json();

                    resultsDiv.innerHTML = '';
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.classList.add('cursor-pointer', 'p-1', 'hover:bg-gray-200');
                        div.innerText = `${item.title ?? item.name} (${item.type})`;
                        div.dataset.id = item.id;
                        div.dataset.type = item.type;
                        div.dataset.title = item.title;
                        div.addEventListener('click', attachItem);
                        resultsDiv.appendChild(div);
                    });
                    resultsDiv.classList.remove('hidden');
                } catch (err) {
                    console.error(err);
                }
            }, 300);
        });

        // Attach item to lesson plan
        async function attachItem(e) {
            const itemId = this.dataset.id;
            const itemType = this.dataset.type;
            const itemTitle = this.dataset.title;

            try {
                const response = await fetch(`/lesson-plan/{{ $lessonplan->id }}/attach-single-item`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ item_id: itemId, item_type: itemType })
                });
                const data = await response.json();

                if (data.status === 'success') {
                    // Check if item already exists in the list
                    const exists = attachedList.querySelector(
                        `li[data-id="${itemId}"][data-type="${itemType}"]`
                    );

                    if (!exists) {
                        const li = document.createElement('li');
                        li.dataset.id = itemId;
                        li.className = "flex items-center mb-2 justify-between p-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800";
                        li.dataset.type = itemType;
                        const iconClass = itemType === "File"
                            ? "fa-file-download text-yellow-500"
                            : "fa-chalkboard-teacher text-green-500";

                        const label = itemType === "Lesson" ? "درس" : "فایل";
                        li.innerHTML = `
                            <div class="flex items-center gap-2">
                                <span class="fas ${iconClass} w-5 h-5"></span>
                                <span class="text-xs text-gray-500 mx-4">[${label}]</span>
                                ${itemTitle}
                            </div>
                            <button class="remove-item-btn p-2 rounded-lg border border-rose-300 dark:border-rose-700 text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-900/20 transition">
                                <span class="fas fa-trash-alt w-5 h-5"></span>
                            </button>
                        `;

                        attachedList.appendChild(li);
                    }
                }

            } catch (err) {
                console.error(err);
            }
        }

        // Remove item (optional)
        attachedList.addEventListener('click', async function(e) {
            e.preventDefault();

            if (e.target.classList.contains('remove-item-btn') || e.target.parentElement.classList.contains('remove-item-btn')) {
                const li = e.target.closest('li');
                const id = li.dataset.id;
                const type = li.dataset.type;

                try {
                    await fetch(`/lesson-plan/{{ $lessonplan->id }}/detach-single-item`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ item_id: id, item_type: type })
                    });
                    li.remove();
                } catch (err) {
                    console.error(err);
                }
            }
        });

    </script>
@endpush

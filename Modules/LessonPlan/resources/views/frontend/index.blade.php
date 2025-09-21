@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-indigo-50 to-fuchsia-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 text-slate-900 dark:text-slate-100">

<!-- Full-width Header (kept) -->
<header class="relative w-full min-h-[420px] flex items-center justify-center text-white overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-700 via-sky-600 to-fuchsia-600"></div>

    <div class="relative z-10 text-center px-6">
        <div class="mx-auto mb-5 w-16 h-16 rounded-2xl bg-white/15 backdrop-blur flex items-center justify-center shadow-lg ring-1 ring-white/20">
            <svg viewBox="0 0 24 24" class="w-7 h-7 text-white fill-current" aria-hidden="true">
                <path d="M18 2H8a4 4 0 0 0-4 4v12a4 4 0 0 1 4-4h12V4a2 2 0 0 0-2-2zM8 16a2 2 0 0 0-2 2 2 2 0 0 0 2 2h12v-4H8z"/>
            </svg>
        </div>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">درسنامه چیست و چطور درخواست بدهیم؟</h1>
        <p class="mt-3 text-sm sm:text-base text-white/90">درخواست درس از شما ; تدوین درس از ما</p>
    </div>

    <!-- gentle wave -->
    <div class="absolute -bottom-1 left-0 right-0 h-[60px] text-white">
        <svg viewBox="0 0 1440 60" class="w-full h-full" preserveAspectRatio="none">
            <path fill="currentColor" d="M0,20 C240,60 480,0 720,30 C960,60 1200,10 1440,40 L1440,60 L0,60 Z" opacity="0.25"></path>
            <path fill="currentColor" d="M0,30 C240,60 480,10 720,40 C960,60 1200,0 1440,30 L1440,60 L0,60 Z" opacity="0.35"></path>
            <path fill="#04091b" d="M0,40 C240,60 480,20 720,50 C960,60 1200,10 1440,20 L1440,60 L0,60 Z"></path>
        </svg>
    </div>
</header>

<main class="max-w-6xl mx-auto px-4 sm:px-6 py-10 space-y-12">
    <!-- Description (kept, straight top) -->
    <section class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
        <div class="px-6 py-6">
            <h2 class="text-xl sm:text-2xl font-bold mb-3">درسنامه چیست؟</h2>
            <p class="leading-8 text-slate-700 dark:text-slate-300">
                «درسنامه» بسته‌ای آموزشی و خوش‌خوان است که مفاهیم کلیدی یک مبحث را با زبان ساده، مثال‌های حل‌شده، نمودارهای روشن و تمرین‌های منتخب ارائه می‌کند
                تا سریع‌تر و مطمئن‌تر یاد بگیرید و برای آزمون آماده شوید.
            </p>
            <ul class="mt-4 grid sm:grid-cols-3 gap-3 text-slate-700 dark:text-slate-300">
                <li class="rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/40 p-4">
                    <div class="flex items-center gap-2 font-bold"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> جمع‌بندی شفاف</div>
                    <p class="mt-1 text-sm">اصل مطلب به‌همراه نکات مهم.</p>
                </li>
                <li class="rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/40 p-4">
                    <div class="flex items-center gap-2 font-bold"><span class="w-2 h-2 rounded-full bg-indigo-500"></span> مثال‌محور</div>
                    <p class="mt-1 text-sm">نمونه‌های مرحله‌به‌مرحله.</p>
                </li>
                <li class="rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/40 p-4">
                    <div class="flex items-center gap-2 font-bold"><span class="w-2 h-2 rounded-full bg-fuchsia-500"></span> آماده‌ی تمرین</div>
                    <p class="mt-1 text-sm">تمرین‌های منتخب برای خودارزیابی.</p>
                </li>
            </ul>
        </div>
    </section>

    <!-- Timeline ONLY stacked (no lines) -->
    <section class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
        <div class="px-6 py-8">
            <h2 class="text-xl sm:text-2xl font-bold mb-2">مراحل درخواست درسنامه</h2>


            <ol class="space-y-5">
                <!-- Step 1 -->
                <li class="rounded-2xl border border-indigo-200 dark:border-indigo-900/50 bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-slate-800/40 dark:to-slate-800/20 p-5">
                    <div class="flex items-center justify-between">
              <span class="inline-flex items-center gap-2 text-indigo-700 dark:text-indigo-300 font-bold">
                <span class="w-7 h-7 rounded-full bg-indigo-600 text-white text-xs flex items-center justify-center">1</span>
                دانش آموز • درخواست
              </span>
                        <span class="text-xs px-2 py-1 rounded-lg bg-indigo-100 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200">فرم</span>
                    </div>
                    <h3 class="mt-2 font-extrabold text-lg">ارسال درخواست درسنامه</h3>
                    <p class="mt-1 text-sm text-slate-700 dark:text-slate-300">پرکردن فرم با موضوع، سطح/پایه تحصیلی.</p>
                </li>

                <!-- Step 2 -->
                <li class="rounded-2xl border border-fuchsia-200 dark:border-fuchsia-900/40 bg-gradient-to-br from-fuchsia-50 to-rose-50 dark:from-slate-800/40 dark:to-slate-800/20 p-5">
                    <div class="flex items-center justify-between">
              <span class="inline-flex items-center gap-2 text-fuchsia-700 dark:text-fuchsia-300 font-bold">
                <span class="w-7 h-7 rounded-full bg-fuchsia-600 text-white text-xs flex items-center justify-center">2</span>
                ادمین/معلم • بازبینی
              </span>
                        <span class="text-xs px-2 py-1 rounded-lg bg-fuchsia-100 text-fuchsia-700 dark:bg-fuchsia-900/40 dark:text-fuchsia-200">بررسی</span>
                    </div>
                    <h3 class="mt-2 font-extrabold text-lg">بررسی موضوع و زمان‌بندی</h3>
                    <p class="mt-1 text-sm text-slate-700 dark:text-slate-300">مطابقت سطح، حجم و مهلت با ظرفیت بررسی می‌شود.</p>
                </li>

                <!-- Step 3 -->
                <li class="rounded-2xl border border-amber-200 dark:border-amber-900/40 bg-gradient-to-br from-amber-50 to-orange-50 dark:from-slate-800/40 dark:to-slate-800/20 p-5">
                    <div class="flex items-center justify-between">
              <span class="inline-flex items-center gap-2 text-amber-700 dark:text-amber-300 font-bold">
                <span class="w-7 h-7 rounded-full bg-amber-600 text-white text-xs flex items-center justify-center">3</span>
                ادمین • فاکتور
              </span>
                        <span class="text-xs px-2 py-1 rounded-lg bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-200">صدور</span>
                    </div>
                    <h3 class="mt-2 font-extrabold text-lg">صدور و ارسال فاکتور</h3>
                    <p class="mt-1 text-sm text-slate-700 dark:text-slate-300">فاکتور بر اساس درخواست آماده و ارسال می‌شود.</p>
                </li>

                <!-- Step 4 -->
                <li class="rounded-2xl border border-emerald-200 dark:border-emerald-900/40 bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-slate-800/40 dark:to-slate-800/20 p-5">
                    <div class="flex items-center justify-between">
              <span class="inline-flex items-center gap-2 text-emerald-700 dark:text-emerald-300 font-bold">
                <span class="w-7 h-7 rounded-full bg-emerald-600 text-white text-xs flex items-center justify-center">4</span>
                دانش آموز • پرداخت
              </span>
                        <span class="text-xs px-2 py-1 rounded-lg bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200">پرداخت</span>
                    </div>
                    <h3 class="mt-2 font-extrabold text-lg">مشاهده پاسخ و پرداخت فاکتور</h3>
                    <p class="mt-1 text-sm text-slate-700 dark:text-slate-300">پس از تایید، فاکتور پرداخت می‌شود.</p>
                </li>

                <!-- Step 5 -->
                <li class="rounded-2xl border border-blue-200 dark:border-blue-900/40 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-slate-800/40 dark:to-slate-800/20 p-5">
                    <div class="flex items-center justify-between">
              <span class="inline-flex items-center gap-2 text-blue-700 dark:text-blue-300 font-bold">
                <span class="w-7 h-7 rounded-full bg-blue-600 text-white text-xs flex items-center justify-center">5</span>
                معلم • تحویل
              </span>
                        <span class="text-xs px-2 py-1 rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-200">آماده‌سازی</span>
                    </div>
                    <h3 class="mt-2 font-extrabold text-lg">تهیه و آماده‌سازی درسنامه</h3>
                    <p class="mt-1 text-sm text-slate-700 dark:text-slate-300">تدوین محتوا با جزئیات و ارسال برای کاربر.</p>
                </li>
            </ol>
        </div>
    </section>

    <!-- Request Form section with demo login state -->
    <section id="request-form" class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 overflow-hidden">
        <div class="px-6 py-6 space-y-5">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold">فرم درخواست درسنامه</h2>

                </div>


            </div>
@if(!auth()->check())
            <!-- Login required box -->
            <div id="loginBox" class="rounded-xl border border-amber-300 dark:border-amber-800 bg-amber-50 dark:bg-amber-900/20 text-amber-900 dark:text-amber-200 p-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-amber-200/70 dark:bg-amber-800/60 text-amber-900 dark:text-amber-100 flex items-center justify-center font-bold">!</span>
                    <div class="space-y-0.5">

                        <div class="text-xs text-amber-700/90 dark:text-amber-300/80">برای ارسال درخواست، ابتدا وارد حساب شوید.</div>
                    </div>
                </div>

            </div>
@else
            <!-- Actual form (hidden when not logged in) -->
            <form id="lessonPlanForm" action="#" method="post" class="grid grid-cols-1 gap-5" >
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block font-semibold mb-2" for="name">نام و نام خانوادگی</label>
                        <input id="name" name="name" type="text" value="{{auth()->user()->name}}"  placeholder="مثلاً: سارا رضایی"
                               class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 px-4 py-3 text-slate-800 dark:text-slate-100 placeholder-slate-400">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2" for="email">موبایل</label>
                        <input id="email" name="mobile" type="text" value="{{auth()->user()->mobile}}"
                               class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 px-4 py-3 text-slate-800 dark:text-slate-100 placeholder-slate-400">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block font-semibold mb-2" for="subject">درس و مبحث</label>
                        <input id="subject" name="title" type="text" required placeholder="مثلاً: فیزیک، حرکت‌شناسی"
                               class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 px-4 py-3">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2" for="level">پایه/سطح</label>
                        <select id="level" name="grade_id"
                                class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 px-4 py-3">
                           @foreach(\App\Models\Grade::all() as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                           @endforeach
                        </select>
                    </div>
                </div>


                <div>
                    <label class="block font-semibold mb-2" for="details">توضیحات تکمیلی</label>
                    <textarea id="details" name="description" rows="4" placeholder="نیازها و اولویت‌ها را بنویسید..."
                              class="w-full rounded-xl bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 px-4 py-3"></textarea>
                </div>


                <div class="flex items-center gap-3 pt-2">
                    <button id="btn-send" type="submit" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl font-bold bg-indigo-600 hover:bg-indigo-700 text-white shadow-md transition">
                        <span class="fas fa-check"></span>
                        ارسال درخواست
                        <span class=" fas fa-spin fa-spinner !hidden"></span>
                    </button>

                </div>
            </form>
                <div id="message-box" class="hidden rounded-xl border border-green-300 dark:border-green-800 bg-green-50 dark:bg-green-900/20 text-green-900 dark:text-green-200 p-4 flex items-center justify-between">
                <div  class="flex items-center gap-3 ">
                    <span class="w-8 h-8 rounded-lg bg-green-200/70 dark:bg-green-800/60 text-green-900 dark:text-green-100 flex items-center justify-center font-bold fas fa-check pt-2 pr-2"></span>
                    <div class="space-y-0.5">

                        <div class="text-xs text-green-700/90 dark:text-green-300/80" id="message">برای ارسال درخواست، ابتدا وارد حساب شوید.</div>
                    </div>
                </div>
                </div>
                <div id="error-messages" class="hidden rounded-xl border border-rose-300 dark:border-rose-800 bg-rose-50 dark:bg-rose-900/20 text-rose-900 dark:text-rose-200 p-4 flex items-center justify-between">
                <div  class="flex items-center gap-3 ">
                    <span class="w-8 h-8 rounded-lg bg-rose-200/70 dark:bg-rose-800/60 text-rose-900 dark:text-rose-100 flex items-center justify-center font-bold fas fa-check pt-2 pr-2"></span>
                    <div class="space-y-0.5">

                        <div class="text-xs text-rose-700/90 dark:text-rose-300/80" id="error-message">برای ارسال درخواست، ابتدا وارد حساب شوید.</div>
                    </div>
                </div>
                </div>
    @endif
        </div>
    </section>
</main>

</div>
@endsection

@push('scripts')
    <script>
        document.getElementById('lessonPlanForm').addEventListener('submit', async function(e) {
            e.preventDefault(); // stop normal form submit

            let formData = new FormData(this);

            let btnsend = document.getElementById('btn-send');
            let spinner = btnsend.querySelector('.fa-spin');
            document.getElementById('error-messages').classList.add('hidden')
            spinner.classList.remove('!hidden');
            try {
                let response = await fetch('/lesson-plan/create', {
                    method: 'POST',
                    headers: {
                        //"Content-Type": "application/json",   // tell Laravel it's JSON
                        "Accept": "application/json",         // expect JSON response
                        'X-CSRF-TOKEN':  "{{ csrf_token() }}"
                    },
                    body: formData
                });

                if (!response.ok) {
                    let errorData = await response.json();
                    const errors = errorData.errors; // Object: { title: [...], description: [...] }

                    // Get the container
                    const container = document.getElementById('error-messages');
                    const messageDiv = container.querySelector('#error-message');

                    // Clear previous messages
                    messageDiv.innerHTML = '';

                    // Combine all error messages into a single string
                    const allMessages = [];
                    for (let field in errors) {
                        errors[field].forEach(msg => allMessages.push(msg));
                    }

                    // Insert messages into the container
                    messageDiv.innerHTML = allMessages.join('<br>');

                    // Show the container
                    container.classList.remove('hidden');
                    spinner.classList.add('!hidden')
                    return; // stop further processing
                }
                let data = await response.json();

                if (data.ok) {
                        document.getElementById('message-box').classList.remove('hidden');
                        document.getElementById('lessonPlanForm').classList.add('hidden');
                        document.getElementById('message').textContent = data.message ;
                    spinner.classList.add('!hidden');

                } else {
                    alert("Error: " + data.message);
                    spinner.classList.add('!hidden');
                }
            } catch (error) {
                console.error("Fetch error:", error);
                spinner.classList.add('!hidden');
            }
        });


    </script>
@endpush

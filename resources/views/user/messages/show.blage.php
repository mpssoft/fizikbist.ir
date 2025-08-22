<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>نمایش پیام</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { vazir: ['Vazir','sans-serif'] }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Vazir:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Vazir', sans-serif; } </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/admin/home" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <a href="/admin/messages" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">پیام‌ها</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">نمایش پیام</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 shadow-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l9 6 9-6m-18 0l9-6 9 6m-18 0v8a2 2 0 002 2h14a2 2 0 002-2V8"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-white truncate">درخواست پشتیبانی ثبت‌نام</h1>
                        <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">
                            <span class="px-2.5 py-1 rounded-full font-medium bg-rose-100 text-rose-700 dark:bg-rose-900 dark:text-rose-200">خوانده‌نشده</span>
                            <span class="px-2.5 py-1 rounded-full font-medium bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200">پشتیبانی</span>
                            <span class="px-2.5 py-1 rounded-full font-medium bg-sky-50 text-sky-700 dark:bg-sky-900/40 dark:text-sky-200">اولویت: عادی</span>
                            <time class="text-gray-500 dark:text-gray-400">۱۴۰۳/۰۶/۱۲ - ۱۰:۱۵</time>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="/admin/messages"
                       class="px-4 py-2 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        بازگشت
                    </a>
                    <a href="/admin/messages/1/reply"
                       class="px-4 py-2 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 transition">
                        پاسخ
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Meta + Actions -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8 space-y-8">
            <!-- From/To -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">فرستنده</div>
                    <div class="text-gray-900 dark:text-gray-100 font-semibold">سارا کریمی</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300 ltr:font-mono">sara.k@example.com</div>
                </div>
                <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">گیرنده</div>
                    <div class="text-gray-900 dark:text-gray-100 font-semibold">پشتیبانی سامانه</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300 ltr:font-mono">support@site.com</div>
                </div>
            </section>

            <!-- Message Body -->
            <section class="space-y-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">متن پیام</h2>
                <div class="rounded-2xl border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900/30 leading-8 text-gray-800 dark:text-gray-100">
                    سلام وقت بخیر،
                    <br/>
                    هنگام ثبت‌نام با خطا مواجه می‌شوم. لطفاً راهنمایی کنید تا بتوانم ادامه بدهم.
                    <br/><br/>
                    متشکرم،
                    <br/>
                    سارا
                </div>
            </section>

            <!-- Attachments -->
            <section class="space-y-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">پیوست‌ها</h2>
                <div class="rounded-2xl border border-gray-200 dark:border-gray-700 p-4 bg-gray-50/50 dark:bg-gray-900/30">
                    <ul class="space-y-2">
                        <li class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-indigo-100 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200 font-bold">PDF</span>
                                <div>
                                    <div class="text-sm font-medium text-gray-800 dark:text-gray-100">error-screenshot.pdf</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">245KB</div>
                                </div>
                            </div>
                            <a href="/storage/messages/1/error-screenshot.pdf" download
                               class="px-3 py-2 rounded-lg border-2 border-indigo-200 text-indigo-700 dark:text-indigo-300 dark:border-indigo-700 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 text-sm font-semibold">
                                دانلود
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Actions -->
            <section class="flex flex-wrap items-center gap-3">
                <form method="POST" action="/admin/messages/1/mark-read">
                    <button type="submit" class="px-4 py-2 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700">علامت خوانده</button>
                </form>
                <form method="POST" action="/admin/messages/1/mark-unread">
                    <button type="submit" class="px-4 py-2 rounded-xl border-2 border-indigo-300 text-indigo-700 font-semibold hover:bg-indigo-50">علامت نخوانده</button>
                </form>
                <form method="POST" action="/admin/messages/1/archive">
                    <button type="submit" class="px-4 py-2 rounded-xl border-2 border-amber-300 text-amber-700 font-semibold hover:bg-amber-50">بایگانی</button>
                </form>
                <form method="POST" action="/admin/messages/1/delete">
                    <button type="submit" class="px-4 py-2 rounded-xl border-2 border-rose-300 text-rose-700 font-semibold hover:bg-rose-50">حذف</button>
                </form>
                <a href="/admin/messages/1/reply"
                   class="px-4 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold hover:from-blue-700 hover:to-indigo-700">
                    پاسخ
                </a>
            </section>
        </div>
    </div>

    <!-- Footer note -->
    <p class="text-xs text-gray-500 dark:text-gray-400 text-center">
        برای پاسخ سریع، روی «پاسخ» کلیک کنید یا وضعیت پیام را به‌روزرسانی کنید.
    </p>
</div>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'972a6fc7a4bb9780',t:'MTc1NTc4MjUxOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>

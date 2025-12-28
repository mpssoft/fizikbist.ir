<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ارسال پیام</title>
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
                <a href="/admin/messages" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">پیام‌های کاربران</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">ارسال پیام</span>
            </nav>

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-600 shadow-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">ارسال پیام</h1>
                    <p class="text-gray-600 dark:text-gray-300">پیام جدیدی بنویسید و برای کاربر یا گروه ارسال کنید</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Send Message Form -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <form method="POST" action="/admin/messages/store" enctype="multipart/form-data" class="space-y-8">
                <!-- Recipients and Meta -->
                <section class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">اطلاعات پیام</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="to" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">گیرنده *</label>
                            <input id="to" name="to" type="text" required placeholder="ایمیل یا نام کاربری (مثال: user@example.com)"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">برای چند گیرنده، با ویرگول جدا کنید.</p>
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع پیام *</label>
                            <select id="type" name="type" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="contact">تماس</option>
                                <option value="support">پشتیبانی</option>
                                <option value="announcement">اعلان</option>
                                <option value="feedback">بازخورد</option>
                            </select>
                        </div>

                        <div>
                            <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">اولویت</label>
                            <select id="priority" name="priority"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="normal">عادی</option>
                                <option value="high">بالا</option>
                                <option value="low">کم</option>
                            </select>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">عنوان *</label>
                            <input id="subject" name="subject" type="text" required placeholder="موضوع پیام"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>
                    </div>
                </section>

                <!-- Message Body -->
                <section class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">متن پیام</h2>
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">متن *</label>
                        <textarea id="body" name="body" rows="8" required placeholder="اینجا بنویسید..."
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                            <span class="px-2 py-1 rounded-full bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-200">پشتیبانی از متن ساده</span>
                            <span class="px-2 py-1 rounded-full bg-sky-50 text-sky-700 dark:bg-sky-900/40 dark:text-sky-200">می‌توانید لینک درج کنید</span>
                        </div>
                    </div>
                </section>

                <!-- Attachments -->
                <section class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">پیوست‌ها (اختیاری)</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="attachments" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">انتخاب فایل</label>
                            <input id="attachments" name="attachments[]" type="file" multiple
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">حداکثر 5 فایل؛ PDF، JPG، PNG یا ZIP تا 5MB هرکدام.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">راهنما</label>
                            <div class="rounded-xl border border-dashed border-gray-300 dark:border-gray-600 p-4 text-sm text-gray-600 dark:text-gray-300">
                                می‌توانید چند فایل را با هم انتخاب کنید. پس از ارسال، فایل‌ها ذخیره می‌شوند.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-2">
                    <a href="/admin/messages"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        بازگشت
                    </a>
                    <div class="flex items-center gap-3">
                        <button type="reset"
                                class="px-6 py-3 rounded-xl border-2 border-amber-300 text-amber-700 font-semibold hover:bg-amber-50 transition">
                            پاک کردن فرم
                        </button>
                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold hover:from-emerald-700 hover:to-teal-700 hover:shadow-lg transition">
                            ارسال پیام
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Note -->
    <p class="text-xs text-gray-500 dark:text-gray-400 text-center">
        پس از ارسال، پیام در فهرست پیام‌ها قابل مشاهده و پیگیری خواهد بود.
    </p>
</div>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'972a63540397de4e',t:'MTc1NTc4MjAwOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>

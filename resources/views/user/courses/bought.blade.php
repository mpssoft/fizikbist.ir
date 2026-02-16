@extends('layouts.user.master')

@section('content')
<div class="bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-gray-900 dark:to-slate-900 min-h-screen py-8 px-4">
<div class="max-w-7xl mx-auto space-y-8">
    <!-- Header -->
    <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden">
        <div class="p-8">
            <nav class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6 gap-2" aria-label="Breadcrumb">
                <a href="/dashboard" class="hover:text-gray-700 dark:hover:text-gray-200 transition-colors">داشبورد</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">دوره‌های من</span>
            </nav>

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-600 to-pink-600 shadow-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900 dark:text-white">دوره‌های خریداری شده</h1>
                        <p class="text-gray-600 dark:text-gray-300">مجموعه دوره‌هایی که تاکنون خریداری کرده‌اید</p>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{count($licenses)}}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">کل دوره‌ها</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
{{--

    <!-- Filters and Search -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 p-6">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Search -->
            <div class="flex-1">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="جستجو در دوره‌ها..."
                           class="w-full px-4 py-3 pl-12 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Status Filter -->
            <div class="lg:w-48">
                <select id="statusFilter"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    <option value="all">همه دوره‌ها</option>
                    <option value="active">فعال</option>
                    <option value="completed">تکمیل شده</option>
                    <option value="expired">منقضی شده</option>
                </select>
            </div>

            <!-- Category Filter -->
            <div class="lg:w-48">
                <select id="categoryFilter"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    <option value="all">همه دسته‌ها</option>
                    <option value="programming">برنامه‌نویسی</option>
                    <option value="design">طراحی</option>
                    <option value="marketing">بازاریابی</option>
                    <option value="business">کسب و کار</option>
                </select>
            </div>
        </div>
    </div>
--}}

    <!-- Courses Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6" id="coursesGrid">

        @foreach($licenses as $license)
        <!-- Course Card 1 - Active -->
        <div class="course-card bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-indigo-100 dark:border-gray-700 overflow-hidden"
             data-status="active" data-category="programming" data-title="{{$license->course->title}}" data-instructor="{{$license->course->teacher->name}}">
            <div class="relative">
                <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center ">
                                    </div>
                <div class="absolute top-4 right-4">
            <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-200">
              {{$license->course->status=='active'?'فعال':''}}
            </span>
                </div>
                <div class="absolute top-4 left-4">
            <span class="px-2 py-1 rounded-lg text-xs font-medium bg-white/90 text-gray-800">
              {{$license->course->grade->name}}
            </span>
                </div>
            </div>

            <div class="p-6 space-y-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">{{$license->course->title}}</h3>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-user text-xs"></i>
                        <span>{{$license->course->teacher->name}}</span>
                        {{--<div class="flex items-center gap-1 mr-auto">
                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                            <span>4.8</span>
                        </div>--}}
                    </div>
                </div>

                <!-- Progress -->
             {{--   <div class="space-y-2">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600 dark:text-gray-400">پیشرفت</span>
                        <span class="font-medium text-gray-900 dark:text-white">65%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="progress-bar bg-gradient-to-r from-blue-500 to-purple-600 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>--}}

                <!-- Purchase Info -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                        <span>خرید: {{$license->created_at}}</span>
                        <span class="font-medium">{{number_format($license->order->price)}} ت</span>
                    </div>
                    <div class="flex items-center justify-between text-xs text-gray-400 dark:text-gray-500">
                        <span>شماره تراکنش: </span>
                        <span class="px-2 py-1 rounded-md bg-gray-100 dark:bg-gray-700 font-mono">{{$license->order->payments()->first()->transaction_id}}</span>
                    </div>
                </div>

                <!-- Actions -->
                <div class="space-y-2">
                    <button onclick="showLicense('l{{$license->id}}')" class="w-full px-4 py-2 rounded-xl border-2 border-indigo-200 dark:border-indigo-700 text-indigo-600 dark:text-indigo-400 font-medium hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition">
                        <i class="fas fa-key ml-2"></i>
                        نمایش مجوز
                    </button>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Empty State (Hidden by default) -->
    <div id="emptyState" class="hidden text-center py-16">
        <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
            <i class="fas fa-search text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">هیچ دوره‌ای یافت نشد</h3>
        <p class="text-gray-600 dark:text-gray-400">با تغییر فیلترها یا جستجوی جدید دوباره تلاش کنید</p>
    </div>
</div>
</div>
@if(session()->has('licenses'))
    @include('layouts.license-modal') ;
@endif
 @if(session()->has('file'))
     <script src="/js/modules/sweetalert2.js" ></script>
    <script>
        Swal.fire({
            title: 'پرداخت موفق',
            text: 'پرداخت برای فایل های مورد نظر یا موفقیت انجام شد.',
            icon: 'success',
            showConfirmButton:true,
            confirmButtonText: 'ok',
            cancelButtonText: 'لغو'
        })
    </script>
@endif

@endsection
<script>
    // Search and Filter functionality
/*
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const categoryFilter = document.getElementById('categoryFilter');
        const coursesGrid = document.getElementById('coursesGrid');
        const emptyState = document.getElementById('emptyState');
        const courseCards = document.querySelectorAll('.course-card');

        function filterCourses() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const selectedStatus = statusFilter.value;
            const selectedCategory = categoryFilter.value;

            let visibleCount = 0;

            courseCards.forEach(card => {
                const title = card.dataset.title.toLowerCase();
                const instructor = card.dataset.instructor.toLowerCase();
                const status = card.dataset.status;
                const category = card.dataset.category;

                const matchesSearch = searchTerm === '' ||
                    title.includes(searchTerm) ||
                    instructor.includes(searchTerm);
                const matchesStatus = selectedStatus === 'all' || status === selectedStatus;
                const matchesCategory = selectedCategory === 'all' || category === selectedCategory;

                if (matchesSearch && matchesStatus && matchesCategory) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state
            if (visibleCount === 0) {
                coursesGrid.style.display = 'none';
                emptyState.classList.remove('hidden');
            } else {
                coursesGrid.style.display = 'grid';
                emptyState.classList.add('hidden');
            }
        }

        // Add event listeners
        searchInput.addEventListener('input', filterCourses);
        statusFilter.addEventListener('change', filterCourses);
        categoryFilter.addEventListener('change', filterCourses);

        // Course card hover effects
        courseCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
                this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '';
            });
        });

        // Animate progress bars on page load
        setTimeout(() => {
            document.querySelectorAll('.progress-bar').forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        }, 500);
    });
*/
    // Course actions
    function continueLearning(courseId) {
        console.log('Continue learning course:', courseId);
        // Redirect to course content
    }

    function downloadCertificate(courseId) {
        console.log('Download certificate for course:', courseId);
        // Download certificate logic
    }

    function renewAccess(courseId) {
        console.log('Renew access for course:', courseId);
        // Renewal logic
    }

    // Show license modal
    function showLicense(licenseId) {
        // Sample license data - in real app, fetch from API
        const licenseData = {
            @foreach($licenses as $license)
            'l{{$license->id}}': {
                key: '{{$license->spotplayer_key}}',
                course: '{{$license->course->title}}',
                user: '{{$license->user->name}}',
                issueDate: '{{$license->created_at}}',
                status: 'فعال'
            },
            @endforeach
        };

        const license = licenseData[licenseId] ;
        // Create modal
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 z-50';
        modal.innerHTML = `
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-indigo-100 dark:border-gray-700 max-w-2xl w-full max-h-[90vh] overflow-y-auto">
          <div class="p-8">
            <div class="flex items-center justify-between mb-6">
              <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-600 to-purple-600 text-white flex items-center justify-center">
                  <i class="fas fa-key text-xl"></i>
                </div>
                <div>
                  <h2 class="text-2xl font-bold text-gray-900 dark:text-white">مجوز SpotPlayer</h2>
                  <p class="text-gray-600 dark:text-gray-400">شناسه: ${licenseId}</p>
                </div>
              </div>
              <button onclick="this.closest('.fixed').remove()" class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                <i class="fas fa-times"></i>
              </button>
            </div>

            <div class="space-y-6">
              <!-- License Key -->
              <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl p-6 border border-blue-200 dark:border-blue-700">
                <div class="flex items-center justify-between mb-3">
                  <label class="text-sm font-medium text-gray-700 dark:text-gray-300">License Key</label>
                  <button onclick="copyToClipboard('${license.key}')" class="text-indigo-600 hover:text-indigo-800 transition text-sm font-medium">
                    <i class="fas fa-copy ml-1"></i>
                    کپی
                  </button>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                  <code class="text-sm font-mono text-gray-900 dark:text-gray-100 break-all">${license.key}</code>
                </div>
              </div>

              <!-- License Details -->
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                  <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">دوره</div>
                  <div class="font-medium text-gray-900 dark:text-white">${license.course}</div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                  <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">کاربر</div>
                  <div class="font-medium text-gray-900 dark:text-white">${license.user}</div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                  <div class="text-sm text-gray-500 dark:text-gray-400 mb-1">تاریخ صدور</div>
                  <div class="font-medium text-gray-900 dark:text-white">${license.issueDate}</div>
                </div>

              </div>

              <!-- Status -->
              <div class="flex items-center justify-center p-4 bg-emerald-50 dark:bg-emerald-900/20 rounded-xl border border-emerald-200 dark:border-emerald-700">
                <div class="flex items-center gap-2">
                  <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                  <span class="font-medium text-emerald-700 dark:text-emerald-300">وضعیت: ${license.status}</span>
                </div>
              </div>

              <!-- Actions -->
              <div class="flex gap-3">
                <button onclick="copyToClipboard('${license.key}')" class="flex-1 px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium hover:from-indigo-700 hover:to-purple-700 transition">
                  <i class="fas fa-copy ml-2"></i>
                  کپی License Key
                </button>
                <button onclick="this.closest('.fixed').remove()" class="px-6 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                  بستن
                </button>
              </div>
            </div>
          </div>
        </div>
      `;

        document.body.appendChild(modal);

        // Close on backdrop click
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.remove();
            }
        });
    }

    // Copy to clipboard function
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Show success feedback
            const buttons = document.querySelectorAll('button');
            buttons.forEach(btn => {
                if (btn.textContent.includes('کپی')) {
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-check ml-1"></i>کپی شد!';
                    btn.className = btn.className.replace('text-indigo-600', 'text-emerald-600');

                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.className = btn.className.replace('text-emerald-600', 'text-indigo-600');
                    }, 2000);
                }
            });
        }).catch(function() {
            alert('خطا در کپی کردن');
        });
    }
</script>


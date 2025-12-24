@extends('layouts.admin.master')

@section('content')
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<!-- Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold mb-2">فهرست مقالات</h1>
                <p class="text-lg opacity-90">مجموعه کامل مقالات کاربردی و مفید</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="bg-white/20 px-4 py-2 rounded-lg">
                    <span class="text-sm">مجموع: <span class="font-bold">{{count($blogs)}}</span> مقاله</span>
                </div>
                <a href="{{route('admin.blogs.create')}}" class="bg-white text-purple-600 px-6 py-3 rounded-lg hover:bg-gray-100 transition font-medium">
                    <i class="fas fa-plus ml-2"></i>
                    افزودن مقاله جدید
                </a>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">

  {{--  <!-- Search & Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">

        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative max-w-2xl">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text"
                       id="search-input"
                       class="search-input w-full pr-10 pl-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-lg"
                       placeholder="جستجو در عنوان، توضیحات و برچسب‌ها...">
            </div>
        </div>

        <!-- Filters -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Category Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-tags ml-2 text-purple-600"></i>
                    دسته‌بندی
                </label>
                <select id="category-filter" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">همه دسته‌ها</option>
                    <option value="technology">تکنولوژی</option>
                    <option value="cooking">آشپزی</option>
                    <option value="health">سلامت</option>
                    <option value="home">خانه‌داری</option>
                    <option value="financial">مالی</option>
                    <option value="lifestyle">سبک زندگی</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-flag ml-2 text-purple-600"></i>
                    وضعیت
                </label>
                <select id="status-filter" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">همه وضعیت‌ها</option>
                    <option value="published">منتشر شده</option>
                    <option value="draft">پیش‌نویس</option>
                    <option value="pending">در انتظار بررسی</option>
                </select>
            </div>

            <!-- Sort By -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-sort ml-2 text-purple-600"></i>
                    مرتب‌سازی
                </label>
                <select id="sort-filter" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="newest">جدیدترین</option>
                    <option value="oldest">قدیمی‌ترین</option>
                    <option value="title">عنوان (الفبایی)</option>
                    <option value="views">پربازدیدترین</option>
                    <option value="likes">محبوب‌ترین</option>
                </select>
            </div>

            <!-- Quick Filters -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-filter ml-2 text-purple-600"></i>
                    فیلترهای سریع
                </label>
                <div class="flex flex-wrap gap-2">
                    <button class="filter-btn px-3 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded-full hover:bg-purple-100 dark:hover:bg-purple-900 transition" data-filter="featured">
                        <i class="fas fa-star text-yellow-500 ml-1"></i>
                        ویژه
                    </button>
                    <button class="filter-btn px-3 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded-full hover:bg-purple-100 dark:hover:bg-purple-900 transition" data-filter="recent">
                        <i class="fas fa-clock text-blue-500 ml-1"></i>
                        اخیر
                    </button>
                </div>
            </div>

        </div>

        <!-- Active Filters Display -->
        <div id="active-filters" class="mt-4 hidden">
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-sm text-gray-600 dark:text-gray-400">فیلترهای فعال:</span>
                <div id="filter-tags" class="flex gap-2 flex-wrap"></div>
                <button onclick="clearAllFilters()" class="text-sm text-red-600 hover:text-red-700 transition">
                    <i class="fas fa-times ml-1"></i>
                    پاک کردن همه
                </button>
            </div>
        </div>

    </div>
--}}

    <!-- Tricks Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6 mb-8" id="tricks-grid">
        @foreach($blogs as $blog)
        <!-- Trick Card 1 -->
        <div class="trick-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden " data-category="technology" data-status="published" data-featured="true">
            <div class="relative" style="background: url('{{$blog->cover_image}}')">
                <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                    <i class="fas fa-laptop-code text-white text-4xl"></i>
                </div>

                <div class="absolute bottom-3 right-3">
                    <span class="category-badge bg-blue-100 text-blue-800 text-xs px-2 rounded-2xl">{{$blog->category}}</span>
                </div>
            </div>
            <div class="p-5">
                <div class="flex items-center justify-between mb-2">
                    <span class="status-published category-badge">{{$blog->status == 'draft' ? 'غیر فعال':'منتشر شده'}}</span>

                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2">
                    {{$blog->title}}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-3">
                    {{$blog->description}}
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-xs text-gray-500">
                        <i class="fas fa-calendar ml-1"></i>
                        <span>{{\Morilog\Jalali\Jalalian::forge($blog->created_at)->ago()}}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{route('admin.blogs.edit',$blog->id)}}" class="p-2 text-gray-400 hover:text-purple-600 transition" title="ویرایش">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.blogs.destroy',$blog->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$blog->id}}">@csrf @method('delete')
                        <button class="p-2 text-gray-400 hover:text-red-600 transition" title="حذف">
                            <i class="fas fa-trash"></i>
                        </button>
                        </form>
                        <a href="/tricks/1" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition text-sm">
                            مشاهده
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between">
       {{ $blogs->render() }}
    </div>

</div>

<!-- Bulk Actions Modal (Hidden by default) -->
<div id="bulk-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 max-w-md w-full mx-4">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">عملیات گروهی</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-6">
            <span id="selected-count">0</span> مقاله انتخاب شده است. چه کاری می‌خواهید انجام دهید؟
        </p>
        <div class="flex items-center gap-3">
            <button class="flex-1 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-check ml-2"></i>
                انتشار
            </button>
            <button class="flex-1 px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition">
                <i class="fas fa-edit ml-2"></i>
                پیش‌نویس
            </button>
            <button class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                <i class="fas fa-trash ml-2"></i>
                حذف
            </button>
        </div>
        <button onclick="closeBulkModal()" class="w-full mt-4 px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition">
            انصراف
        </button>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Search functionality
    const searchInput = document.getElementById('search-input');
    const categoryFilter = document.getElementById('category-filter');
    const statusFilter = document.getElementById('status-filter');
    const sortFilter = document.getElementById('sort-filter');
    const tricksGrid = document.getElementById('tricks-grid');
    const activeFilters = document.getElementById('active-filters');
    const filterTags = document.getElementById('filter-tags');

    let selectedTricks = new Set();

    // Search input handler
    searchInput.addEventListener('input', debounce(handleSearch, 300));

    // Filter change handlers
    categoryFilter.addEventListener('change', handleFilters);
    statusFilter.addEventListener('change', handleFilters);
    sortFilter.addEventListener('change', handleFilters);

    // Quick filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            this.classList.toggle('filter-active');
            handleFilters();
        });
    });

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    function handleSearch() {
        const searchTerm = searchInput.value.toLowerCase();
        const cards = document.querySelectorAll('.trick-card');

        cards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('p').textContent.toLowerCase();

            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });

        updateActiveFilters();
    }

    function handleFilters() {
        const category = categoryFilter.value;
        const status = statusFilter.value;
        const sort = sortFilter.value;
        const cards = Array.from(document.querySelectorAll('.trick-card'));

        // Filter cards
        cards.forEach(card => {
            let show = true;

            if (category && card.dataset.category !== category) show = false;
            if (status && card.dataset.status !== status) show = false;

            // Quick filters
            const activeQuickFilters = document.querySelectorAll('.filter-btn.filter-active');
            activeQuickFilters.forEach(btn => {
                const filter = btn.dataset.filter;
                if (filter === 'featured' && card.dataset.featured !== 'true') show = false;
            });

            card.style.display = show ? 'block' : 'none';
        });

        // Sort visible cards
        const visibleCards = cards.filter(card => card.style.display !== 'none');
        sortCards(visibleCards, sort);

        updateActiveFilters();
    }

    function sortCards(cards, sortBy) {
        const container = tricksGrid;

        cards.sort((a, b) => {
            switch(sortBy) {
                case 'title':
                    return a.querySelector('h3').textContent.localeCompare(b.querySelector('h3').textContent, 'fa');
                case 'oldest':
                    return -1; // Would use actual dates in real implementation
                case 'views':
                    const viewsA = parseInt(a.querySelector('.fa-eye').nextSibling.textContent.replace('k', '000'));
                    const viewsB = parseInt(b.querySelector('.fa-eye').nextSibling.textContent.replace('k', '000'));
                    return viewsB - viewsA;
                case 'likes':
                    const likesA = parseInt(a.querySelector('.fa-heart').nextSibling.textContent);
                    const likesB = parseInt(b.querySelector('.fa-heart').nextSibling.textContent);
                    return likesB - likesA;
                default: // newest
                    return 1;
            }
        });

        // Re-append sorted cards
        cards.forEach(card => container.appendChild(card));
    }

    function updateActiveFilters() {
        const filters = [];

        if (searchInput.value) {
            filters.push({
                type: 'search',
                label: `جستجو: "${searchInput.value}"`,
                clear: () => { searchInput.value = ''; handleSearch(); }
            });
        }

        if (categoryFilter.value) {
            filters.push({
                type: 'category',
                label: `دسته: ${categoryFilter.options[categoryFilter.selectedIndex].text}`,
                clear: () => { categoryFilter.value = ''; handleFilters(); }
            });
        }

        if (statusFilter.value) {
            filters.push({
                type: 'status',
                label: `وضعیت: ${statusFilter.options[statusFilter.selectedIndex].text}`,
                clear: () => { statusFilter.value = ''; handleFilters(); }
            });
        }

        document.querySelectorAll('.filter-btn.filter-active').forEach(btn => {
            filters.push({
                type: 'quick',
                label: btn.textContent.trim(),
                clear: () => { btn.classList.remove('filter-active'); handleFilters(); }
            });
        });

        if (filters.length > 0) {
            activeFilters.classList.remove('hidden');
            filterTags.innerHTML = filters.map(filter =>
                `<span class="inline-flex items-center gap-2 px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
            ${filter.label}
            <button onclick="clearFilter('${filter.type}')" class="hover:text-purple-900">
              <i class="fas fa-times"></i>
            </button>
          </span>`
            ).join('');
        } else {
            activeFilters.classList.add('hidden');
        }
    }

    function clearFilter(type) {
        switch(type) {
            case 'search':
                searchInput.value = '';
                handleSearch();
                break;
            case 'category':
                categoryFilter.value = '';
                handleFilters();
                break;
            case 'status':
                statusFilter.value = '';
                handleFilters();
                break;
            case 'quick':
                document.querySelectorAll('.filter-btn.filter-active').forEach(btn => {
                    btn.classList.remove('filter-active');
                });
                handleFilters();
                break;
        }
    }

    function clearAllFilters() {
        searchInput.value = '';
        categoryFilter.value = '';
        statusFilter.value = '';
        sortFilter.value = 'newest';
        document.querySelectorAll('.filter-btn.filter-active').forEach(btn => {
            btn.classList.remove('filter-active');
        });

        document.querySelectorAll('.trick-card').forEach(card => {
            card.style.display = 'block';
        });

        activeFilters.classList.add('hidden');
    }

    // Bulk selection functionality
    function toggleTrickSelection(trickId) {
        if (selectedTricks.has(trickId)) {
            selectedTricks.delete(trickId);
        } else {
            selectedTricks.add(trickId);
        }

        updateBulkActions();
    }

    function updateBulkActions() {
        const count = selectedTricks.size;
        if (count > 0) {
            document.getElementById('selected-count').textContent = count;
            // Show bulk actions bar (would be implemented)
        }
    }

    function closeBulkModal() {
        document.getElementById('bulk-modal').classList.add('hidden');
    }

    // Per page change handler
    document.getElementById('per-page').addEventListener('change', function() {
        // Would trigger page reload with new per_page parameter
        console.log('Per page changed to:', this.value);
    });

    // Initialize filters on page load
    updateActiveFilters();
</script>
<script src="/js/modules/sweetalert2.js"></script>
<script>

    function confirmDelete(e) {
        e.preventDefault();
        Swal.fire({
            title: 'حذف مقاله',
            text: 'آیا مطمئن هستید که می‌خواهید این مقاله را حذف کنید؟',
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

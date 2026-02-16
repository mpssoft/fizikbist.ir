@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<!-- Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-bold mb-2">مدیریت فایل‌ها</h1>
                <p class="text-lg opacity-90">مدیریت فایل‌های رایگان و پولی </p>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex items-center gap-4 text-sm">
                    <div class="bg-white/20 px-3 py-2 rounded-lg">
                        <span>کل فایل‌ها: <span class="font-bold">{{count($files)}}</span></span>
                    </div>
                    <div class="bg-white/20 px-3 py-2 rounded-lg">
                        <span>رایگان: <span class="font-bold">{{$freeCount}}</span></span>
                    </div>
                    <div class="bg-white/20 px-3 py-2 rounded-lg">
                        <span>پولی: <span class="font-bold">{{$paidCount}}</span></span>
                    </div>
                </div>
                <a href="{{route('admin.files.create')}}"  class="bg-white text-purple-600 px-6 py-3 rounded-lg hover:bg-gray-100 transition font-medium">
                    <i class="fas fa-plus ml-2"></i>
                    آپلود فایل جدید
                </a>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">

 {{--   <!-- Filters & Search -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">

        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative max-w-2xl">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text"
                       id="search-input"
                       class="w-full pr-10 pl-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-lg"
                       placeholder="جستجو در نام فایل، توضیحات و برچسب‌ها...">
            </div>
        </div>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

            <!-- File Type Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-file ml-2 text-purple-600"></i>
                    نوع فایل
                </label>
                <select id="type-filter" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">همه فرمت‌ها</option>
                    <option value="pdf">PDF</option>
                    <option value="doc">Word (DOC/DOCX)</option>
                    <option value="excel">Excel (XLS/XLSX)</option>
                    <option value="ppt">PowerPoint</option>
                    <option value="image">تصاویر</option>
                    <option value="video">ویدیو</option>
                    <option value="audio">صوتی</option>
                    <option value="archive">فشرده (ZIP/RAR)</option>
                </select>
            </div>

            <!-- Pricing Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-tag ml-2 text-purple-600"></i>
                    نوع قیمت‌گذاری
                </label>
                <select id="pricing-filter" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">همه انواع</option>
                    <option value="free">رایگان</option>
                    <option value="paid">پولی</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-toggle-on ml-2 text-purple-600"></i>
                    وضعیت
                </label>
                <select id="status-filter" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">همه وضعیت‌ها</option>
                    <option value="active">فعال</option>
                    <option value="inactive">غیرفعال</option>
                </select>
            </div>

            <!-- Category Filter -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-folder ml-2 text-purple-600"></i>
                    دسته‌بندی
                </label>
                <select id="category-filter" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="">همه دسته‌ها</option>
                    <option value="ebooks">کتاب‌های الکترونیکی</option>
                    <option value="templates">قالب‌ها</option>
                    <option value="guides">راهنماها</option>
                    <option value="courses">دوره‌ها</option>
                    <option value="tools">ابزارها</option>
                    <option value="resources">منابع</option>
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
                    <option value="name">نام (الفبایی)</option>
                    <option value="size">اندازه فایل</option>
                    <option value="downloads">تعداد دانلود</option>
                    <option value="price">قیمت</option>
                </select>
            </div>

        </div>


    </div>
--}}

    <!-- Files Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-6 mb-8" id="files-grid">

        @foreach($files as $file)

        <!-- File Card 2 - Word Document -->
        <div class="file-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden card-hover" data-type="doc" data-pricing="free" data-status="active" data-category="templates">
            <div class="relative">
                <div class="h-32 bg-gradient-to-br {{$file->access_type == 'free' ? 'from-blue-400 to-blue-600':'from-green-400 to-green-600'}} flex items-center justify-center">
                    <i class="fas {{$file->icon}} text-white text-3xl"></i>
                </div>
                <div class="absolute top-3 right-3 flex gap-2">
            <span class="free-badge text-white text-xs px-2 py-1 rounded-full font-medium">
              <i class="fas {{$file->access_type == 'free' ?'fa-gift':'fa-dollar-sign' }} ml-1"></i>{{$file->access_type == 'free' ? 'رایگان':'پولی'}}
            </span>
                </div>

                <div class="absolute bottom-3 right-3">
                    <span class="bg-white/90 text-gray-800 text-xs px-2 py-1 rounded-full">{{$file->file_type}}</span>
                </div>
            </div>
            <div class="p-5">
                <div class="flex items-center justify-between mb-2">
                    <span class="status-active text-xs px-2 py-1 rounded-full">{{$file->state == 'active' ? 'فعال':'غیر فعال'}}</span>
                    <div class="flex items-center gap-2 text-sm text-gray-500"  >
                        <span><i class="fas fa-download ml-1"></i>{{$file->downloads}}</span>
                        <span>1.2 MB</span>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 line-clamp-2">
                    {{$file->title}}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-2">
                    {{$file->description}}
                </p>
                <div class="flex items-center justify-between mb-4">
                    @if($file->access_type=="free")
                    <div class="text-lg font-bold text-green-600">
                        رایگان
                    </div>
                        @else
                            <div class="text-lg font-bold text-green-600">
                                {{number_format($file->price)}} تومان
                            </div>
                        @endif
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{$file->category}}</span>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{URL::temporarySignedRoute('user.files.download',now()->addMinutes(30),['file' => $file->id])}}" class="flex-1 px-3 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition text-sm">
                        <i class="fas fa-download ml-1"></i>
                        دانلود
                    </a>
                    <a href="{{route('admin.files.edit',$file->id)}}" class="p-2 text-gray-400 hover:text-purple-600 transition" title="ویرایش">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.files.destroy',$file->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$file->id}}">@csrf @method('delete')
                    <button class="p-2 text-gray-400 hover:text-red-600 transition" title="حذف">
                        <i class="fas fa-trash"></i>
                    </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between">
      {{$files->render()}}
    </div>

</div>

</div>
@endsection
@push('scripts')
<script>
    // File management functionality
    const searchInput = document.getElementById('search-input');
    const typeFilter = document.getElementById('type-filter');
    const pricingFilter = document.getElementById('pricing-filter');
    const statusFilter = document.getElementById('status-filter');
    const categoryFilter = document.getElementById('category-filter');
    const sortFilter = document.getElementById('sort-filter');
    const filesGrid = document.getElementById('files-grid');

    // Search and filter handlers
    searchInput.addEventListener('input', debounce(handleFilters, 300));
    typeFilter.addEventListener('change', handleFilters);
    pricingFilter.addEventListener('change', handleFilters);
    statusFilter.addEventListener('change', handleFilters);
    categoryFilter.addEventListener('change', handleFilters);
    sortFilter.addEventListener('change', handleFilters);

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

    function handleFilters() {
        const searchTerm = searchInput.value.toLowerCase();
        const type = typeFilter.value;
        const pricing = pricingFilter.value;
        const status = statusFilter.value;
        const category = categoryFilter.value;
        const sort = sortFilter.value;

        const cards = Array.from(document.querySelectorAll('.file-card'));

        // Filter cards
        cards.forEach(card => {
            let show = true;

            // Search filter
            if (searchTerm) {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                if (!title.includes(searchTerm) && !description.includes(searchTerm)) {
                    show = false;
                }
            }

            // Type filter
            if (type && card.dataset.type !== type) show = false;

            // Pricing filter
            if (pricing && card.dataset.pricing !== pricing) show = false;

            // Status filter
            if (status && card.dataset.status !== status) show = false;

            // Category filter
            if (category && card.dataset.category !== category) show = false;

            card.style.display = show ? 'block' : 'none';
        });

        // Sort visible cards
        const visibleCards = cards.filter(card => card.style.display !== 'none');
        sortCards(visibleCards, sort);
    }

    function sortCards(cards, sortBy) {
        const container = filesGrid;

        cards.sort((a, b) => {
            switch(sortBy) {
                case 'name':
                    return a.querySelector('h3').textContent.localeCompare(b.querySelector('h3').textContent, 'fa');
                case 'oldest':
                    return -1; // Would use actual dates in real implementation
                case 'size':
                    const sizeA = parseFloat(a.querySelector('.text-sm').textContent.match(/[\d.]+/)[0]);
                    const sizeB = parseFloat(b.querySelector('.text-sm').textContent.match(/[\d.]+/)[0]);
                    return sizeB - sizeA;
                case 'downloads':
                    const downloadsA = parseInt(a.querySelector('.fa-download').nextSibling.textContent);
                    const downloadsB = parseInt(b.querySelector('.fa-download').nextSibling.textContent);
                    return downloadsB - downloadsA;
                case 'price':
                    // Would implement price sorting logic
                    return 1;
                default: // newest
                    return 1;
            }
        });

        // Re-append sorted cards
        cards.forEach(card => container.appendChild(card));
    }

    // View toggle functionality
    const gridViewBtn = document.getElementById('grid-view');
    const listViewBtn = document.getElementById('list-view');

    gridViewBtn.addEventListener('click', () => {
        filesGrid.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8';
        gridViewBtn.className = 'p-2 bg-purple-100 text-purple-600 rounded-lg';
        listViewBtn.className = 'p-2 text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg';
    });

    listViewBtn.addEventListener('click', () => {
        filesGrid.className = 'space-y-4 mb-8';
        listViewBtn.className = 'p-2 bg-purple-100 text-purple-600 rounded-lg';
        gridViewBtn.className = 'p-2 text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg';
    });

    // Upload modal functionality
    function openUploadModal() {
        document.getElementById('upload-modal').classList.remove('hidden');
        document.getElementById('upload-modal').classList.add('flex');
    }

    function closeUploadModal() {
        document.getElementById('upload-modal').classList.add('hidden');
        document.getElementById('upload-modal').classList.remove('flex');
        document.getElementById('upload-form').reset();
        document.getElementById('price-section').classList.add('hidden');
    }

    // Drag and drop functionality
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('file-input');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        dropArea.classList.add('dragover');
    }

    function unhighlight(e) {
        dropArea.classList.remove('dragover');
    }

    dropArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }

    fileInput.addEventListener('change', function(e) {
        handleFiles(this.files);
    });

    function handleFiles(files) {
        ([...files]).forEach(uploadFilePreview);
    }

    function uploadFilePreview(file) {
        console.log('File selected:', file.name, file.size, file.type);
        // Here you would typically show a preview or progress bar
    }

    // Pricing type change handler
    document.querySelectorAll('input[name="pricing_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const priceSection = document.getElementById('price-section');
            if (this.value === 'paid') {
                priceSection.classList.remove('hidden');
            } else {
                priceSection.classList.add('hidden');
            }

            // Update radio button styles
            document.querySelectorAll('input[name="pricing_type"]').forEach(r => {
                const circle = r.parentElement.querySelector('.w-4.h-4 > div');
                if (r.checked) {
                    circle.classList.remove('bg-transparent');
                    circle.classList.add('bg-purple-600');
                    r.parentElement.classList.add('border-purple-300');
                } else {
                    circle.classList.add('bg-transparent');
                    circle.classList.remove('bg-purple-600');
                    r.parentElement.classList.remove('border-purple-300');
                }
            });
        });
    });

    function uploadFile() {
        const form = document.getElementById('upload-form');
        const formData = new FormData(form);

        // Here you would typically send the form data to your server
        console.log('Uploading file with data:', Object.fromEntries(formData));

        // Simulate upload success
        alert('فایل با موفقیت آپلود شد!');
        closeUploadModal();
    }

    // Bulk selection functionality
    let selectedFiles = new Set();

    document.querySelectorAll('.file-card input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const fileId = this.closest('.file-card').dataset.id || Math.random().toString();

            if (this.checked) {
                selectedFiles.add(fileId);
            } else {
                selectedFiles.delete(fileId);
            }

            updateBulkActions();
        });
    });

    function updateBulkActions() {
        const count = selectedFiles.size;
        // Update bulk action buttons visibility/state based on selection count
        console.log(`${count} files selected`);
    }

    // Per page change handler
    document.getElementById('per-page').addEventListener('change', function() {
        console.log('Per page changed to:', this.value);
        // Would trigger page reload with new per_page parameter
    });
</script>
<script src="/js/modules/sweetalert2.js"></script>
<script>

    function confirmDelete(e) {
        e.preventDefault();
        Swal.fire({
            title: 'حذف فایل',
            text: 'آیا مطمئن هستید که می‌خواهید این فایل را حذف کنید؟',
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


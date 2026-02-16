@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Box -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">مدیریت گروه‌های کاربری</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-400">مشاهده و مدیریت گروه‌های کاربران</p>
                </div>
                <div class="hidden sm:flex items-center gap-6 text-sm">
                    <div class="text-center">
                        <div class="font-semibold text-purple-600 dark:text-purple-400">{{count($groups)}}</div>
                        <div class="text-gray-500 dark:text-gray-400">کل گروه‌ها</div>
                    </div>

                </div>
            </div>

            <div class="flex items-center gap-4">

                <a href="{{route('admin.groups.create')}}" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg hover:from-purple-700 hover:to-indigo-700 transition shadow-lg text-sm font-medium">
                    <i class="fas fa-plus ml-2"></i>
                    گروه جدید
                </a>
            </div>
        </div>
    </div>
{{--

    <!-- Filters and Search -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
            <div class="flex items-center gap-4 w-full sm:w-auto">
                <div class="relative flex-1 sm:flex-none sm:w-80">
                    <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="searchGroups" placeholder="جستجو در گروه‌ها..."
                           oninput="filterGroups()"
                           class="w-full pr-10 pl-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <select id="statusFilter" onchange="filterGroups()"
                        class="px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                    <option value="all">همه وضعیت‌ها</option>
                    <option value="active">فعال</option>
                    <option value="inactive">غیرفعال</option>
                </select>

                <select id="sortBy" onchange="sortGroups()"
                        class="px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                    <option value="name">مرتب‌سازی بر اساس نام</option>
                    <option value="members">تعداد اعضا</option>
                    <option value="created">تاریخ ایجاد</option>
                </select>

                <button onclick="toggleView()" id="viewToggle"
                        class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                    <i class="fas fa-th-large"></i>
                </button>
            </div>
        </div>
    </div>
--}}

    <!-- Groups Grid -->
    <div id="groupsGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @foreach($groups as $group)
        <!-- Premium Users Group -->
        <div class="group-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-all duration-300" data-status="active" data-name="کاربران پریمیوم" data-members="245" data-created="2024-01-15">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center">
                        <i class="fas {{$group->icon}} text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{$group->name}}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{$group->description}}</p>
                    </div>
                </div>

            </div>

            <div class="space-y-3 mb-6">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">تعداد اعضا:</span>
                    <span class="font-semibold text-gray-900 dark:text-white">{{$group->users_count}} نفر</span>
                </div>
{{--
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">آخرین پیامک:</span>
                    <span class="text-sm text-gray-900 dark:text-white">۲ روز پیش</span>
                </div>
--}}
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">تاریخ ایجاد:</span>
                    <span class="text-sm text-gray-900 dark:text-white">{{\Morilog\Jalali\Jalalian::forge($group->created_at)->ago()}}</span>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{route('admin.groups.edit',$group->id)}}"
                        class="flex-1 px-3 py-2 bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300 rounded-lg hover:bg-purple-200 dark:hover:bg-purple-800 transition text-sm font-medium">
                    <i class="fas fa-eye ml-1"></i>
                    مشاهده و ویرایش
                </a>
                <form action="{{ route('admin.groups.destroy',$group->id) }}" onsubmit="event.preventDefault();confirmDelete(event);" method="post" id="{{'delete-'.$group->id}}">@csrf @method('delete')
                <button
                        class="px-3 py-2 bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-200 dark:hover:bg-red-800 transition">
                    <i class="fas fa-trash"></i>
                </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Empty State (Hidden by default) -->
    <div id="emptyState" class="hidden text-center py-16">
        <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-users text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">گروهی یافت نشد</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-6">هیچ گروهی با معیارهای جستجو مطابقت ندارد.</p>
        <button onclick="clearFilters()"
                class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
            پاک کردن فیلترها
        </button>
    </div>
</div>

</div>
<script src="/js/modules/sweetalert2.js"></script>
<script>

    function confirmDelete(e) {
        e.preventDefault();
        Swal.fire({
            title: 'حذف گروه',
            text: 'آیا مطمئن هستید که می‌خواهید این گروه را حذف کنید؟',
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

    let selectedIcon = 'fa-users';
    let currentView = 'grid';

    // Filter groups
    function filterGroups() {
        const searchTerm = document.getElementById('searchGroups').value.toLowerCase();
        const statusFilter = document.getElementById('statusFilter').value;
        const groupCards = document.querySelectorAll('.group-card');
        let visibleCount = 0;

        groupCards.forEach(card => {
            const name = card.getAttribute('data-name').toLowerCase();
            const status = card.getAttribute('data-status');

            const matchesSearch = name.includes(searchTerm);
            const matchesStatus = statusFilter === 'all' || status === statusFilter;

            if (matchesSearch && matchesStatus) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide empty state
        const emptyState = document.getElementById('emptyState');
        const groupsGrid = document.getElementById('groupsGrid');

        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
            groupsGrid.classList.add('hidden');
        } else {
            emptyState.classList.add('hidden');
            groupsGrid.classList.remove('hidden');
        }
    }

    // Sort groups
    function sortGroups() {
        const sortBy = document.getElementById('sortBy').value;
        const groupsGrid = document.getElementById('groupsGrid');
        const groupCards = Array.from(document.querySelectorAll('.group-card'));

        groupCards.sort((a, b) => {
            switch (sortBy) {
                case 'name':
                    return a.getAttribute('data-name').localeCompare(b.getAttribute('data-name'));
                case 'members':
                    return parseInt(b.getAttribute('data-members')) - parseInt(a.getAttribute('data-members'));
                case 'created':
                    return new Date(b.getAttribute('data-created')) - new Date(a.getAttribute('data-created'));
                default:
                    return 0;
            }
        });

        // Re-append sorted cards
        groupCards.forEach(card => groupsGrid.appendChild(card));
    }

    // Toggle view (grid/list)
    function toggleView() {
        const viewToggle = document.getElementById('viewToggle');
        const groupsGrid = document.getElementById('groupsGrid');

        if (currentView === 'grid') {
            currentView = 'list';
            viewToggle.innerHTML = '<i class="fas fa-th"></i>';
            groupsGrid.className = 'space-y-4';

            // Update card styles for list view
            document.querySelectorAll('.group-card').forEach(card => {
                card.className = card.className.replace('hover:shadow-xl transition-all duration-300', 'hover:shadow-lg transition-all duration-300');
            });
        } else {
            currentView = 'grid';
            viewToggle.innerHTML = '<i class="fas fa-th-large"></i>';
            groupsGrid.className = 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6';

            // Restore card styles for grid view
            document.querySelectorAll('.group-card').forEach(card => {
                card.className = card.className.replace('hover:shadow-lg transition-all duration-300', 'hover:shadow-xl transition-all duration-300');
            });
        }
    }

    // Clear filters
    function clearFilters() {
        document.getElementById('searchGroups').value = '';
        document.getElementById('statusFilter').value = 'all';
        document.getElementById('sortBy').value = 'name';
        filterGroups();
        sortGroups();
    }


    // Modal functions
    function openCreateGroupModal() {
        document.getElementById('createGroupModal').classList.remove('hidden');
    }

    function closeCreateGroupModal() {
        document.getElementById('createGroupModal').classList.add('hidden');
        document.getElementById('createGroupForm').reset();
        selectedIcon = 'fa-users';
        updateIconSelection();
    }

    function selectIcon(iconClass) {
        selectedIcon = iconClass;
        updateIconSelection();
    }

    function updateIconSelection() {
        document.querySelectorAll('.icon-option').forEach(option => {
            option.classList.remove('bg-purple-100', 'dark:bg-purple-900', 'border-purple-500');
            option.classList.add('border-gray-300', 'dark:border-gray-600');
        });

        const selectedOption = document.querySelector(`[onclick="selectIcon('${selectedIcon}')"]`);
        if (selectedOption) {
            selectedOption.classList.add('bg-purple-100', 'dark:bg-purple-900', 'border-purple-500');
            selectedOption.classList.remove('border-gray-300', 'dark:border-gray-600');
        }
    }

    // Handle create group form
    document.getElementById('createGroupForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const groupName = document.getElementById('groupName').value;
        const groupDescription = document.getElementById('groupDescription').value;

        if (!groupName.trim()) {
            alert('لطفاً نام گروه را وارد کنید');
            return;
        }

        // Simulate creating group
        alert(`گروه "${groupName}" با موفقیت ایجاد شد!`);
        closeCreateGroupModal();
    });

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        updateIconSelection();
    });
</script>
@endsection

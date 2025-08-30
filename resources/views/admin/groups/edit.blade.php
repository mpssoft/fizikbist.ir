@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-edit text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">ویرایش گروه کاربری</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-400">ویرایش اطلاعات گروه و مدیریت اعضا</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    <i class="fas fa-calendar ml-1"></i>
                    <span>ایجاد شده: {{ $group->created_at->format('Y/m/d') }}</span>
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    <i class="fas fa-clock ml-1"></i>
                    <span>آخرین بروزرسانی: {{ $group->updated_at->format('Y/m/d') }}</span>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.errors')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Group Edit Form -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-edit text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">اطلاعات گروه</h2>
                </div>

                <form id="editGroupForm" class="space-y-6" method="post" action="{{route('admin.groups.update',$group->id)}}">
                    @method('PUT')
                    @csrf
                    <!-- Group Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-tag text-blue-500 ml-2"></i>
                            نام گروه *
                        </label>
                        <input type="text" id="groupName" name="name" required
                               value="{{ $group->name }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                               placeholder="نام گروه را وارد کنید...">
                        <div id="nameError" class="hidden text-red-500 text-sm mt-1"></div>
                    </div>

                    <!-- Group Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-align-left text-green-500 ml-2"></i>
                            توضیحات
                        </label>
                        <textarea id="groupDescription" name="description" rows="4"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 resize-none transition"
                                  placeholder="توضیحات گروه را وارد کنید...">{{ $group->description }}</textarea>
                    </div>

                    <!-- Group Icon -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-icons text-purple-500 ml-2"></i>
                            آیکون گروه
                        </label>
                        <div class="grid grid-cols-8 gap-2">
                            <button type="button" onclick="selectIcon('fa-users')" class="icon-option p-3 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-purple-100 dark:hover:bg-purple-900 transition {{ $group->icon == 'fa-users' ? 'bg-purple-100 dark:bg-purple-900 border-purple-500' : '' }}">
                                <i class="fas fa-users text-gray-600 dark:text-gray-400"></i>
                            </button>
                            <button type="button" onclick="selectIcon('fa-crown')" class="icon-option p-3 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-purple-100 dark:hover:bg-purple-900 transition {{ $group->icon == 'fa-crown' ? 'bg-purple-100 dark:bg-purple-900 border-purple-500' : '' }}">
                                <i class="fas fa-crown text-gray-600 dark:text-gray-400"></i>
                            </button>
                            <button type="button" onclick="selectIcon('fa-gem')" class="icon-option p-3 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-purple-100 dark:hover:bg-purple-900 transition {{ $group->icon == 'fa-gem' ? 'bg-purple-100 dark:bg-purple-900 border-purple-500' : '' }}">
                                <i class="fas fa-gem text-gray-600 dark:text-gray-400"></i>
                            </button>
                            <button type="button" onclick="selectIcon('fa-star')" class="icon-option p-3 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-purple-100 dark:hover:bg-purple-900 transition {{ $group->icon == 'fa-star' ? 'bg-purple-100 dark:bg-purple-900 border-purple-500' : '' }}">
                                <i class="fas fa-star text-gray-600 dark:text-gray-400"></i>
                            </button>
                            <button type="button" onclick="selectIcon('fa-heart')" class="icon-option p-3 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-purple-100 dark:hover:bg-purple-900 transition {{ $group->icon == 'fa-heart' ? 'bg-purple-100 dark:bg-purple-900 border-purple-500' : '' }}">
                                <i class="fas fa-heart text-gray-600 dark:text-gray-400"></i>
                            </button>
                            <button type="button" onclick="selectIcon('fa-shield')" class="icon-option p-3 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-purple-100 dark:hover:bg-purple-900 transition {{ $group->icon == 'fa-shield' ? 'bg-purple-100 dark:bg-purple-900 border-purple-500' : '' }}">
                                <i class="fas fa-shield text-gray-600 dark:text-gray-400"></i>
                            </button>
                            <button type="button" onclick="selectIcon('fa-briefcase')" class="icon-option p-3 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-purple-100 dark:hover:bg-purple-900 transition {{ $group->icon == 'fa-briefcase' ? 'bg-purple-100 dark:bg-purple-900 border-purple-500' : '' }}">
                                <i class="fas fa-briefcase text-gray-600 dark:text-gray-400"></i>
                            </button>
                            <button type="button" onclick="selectIcon('fa-graduation-cap')" class="icon-option p-3 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-purple-100 dark:hover:bg-purple-900 transition {{ $group->icon == 'fa-graduation-cap' ? 'bg-purple-100 dark:bg-purple-900 border-purple-500' : '' }}">
                                <i class="fas fa-graduation-cap text-gray-600 dark:text-gray-400"></i>
                            </button>
                        </div>
                        <input type="hidden" id="selectedIcon" name="icon" value="{{ $group->icon }}">
                    </div>

                    <!-- User Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-search text-orange-500 ml-2"></i>
                            جستجو و افزودن کاربران جدید
                        </label>
                        <div class="relative">
                            <input type="text" id="userSearch"
                                   class="w-full px-4 py-3 pr-10 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                   placeholder="نام، ایمیل یا شماره تلفن کاربر را جستجو کنید..."
                                   oninput="searchUsers(this.value)"
                                   autocomplete="off">
                            <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <div id="searchLoading" class="hidden absolute left-3 top-1/2 transform -translate-y-1/2">
                                <i class="fas fa-spinner loading-spinner text-purple-500"></i>
                            </div>

                            <!-- Search Results Dropdown -->
                            <div id="searchResults" class="hidden absolute top-full left-0 right-0 mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl shadow-lg z-10 search-dropdown">
                                <!-- Results will be populated here -->
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex gap-4 pt-6">
                        <button type="button" onclick="window.history.back()"
                                class="flex-1 px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium rounded-xl hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                            <i class="fas fa-arrow-right ml-2"></i>
                            بازگشت
                        </button>

                        <button type="submit"
                                class="flex-1 px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white font-medium rounded-xl hover:from-orange-700 hover:to-red-700 focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition shadow-lg">
                            <i class="fas fa-save ml-2"></i>
                            <span id="submitButtonText">بروزرسانی گروه</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Group Members -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 sticky top-8">
                <!-- Users List Header -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-friends text-white text-sm"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">اعضای فعلی گروه</h3>
                        </div>
                        <span id="userCount" class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-xs font-medium">
                {{ $group->users()->count() }} کاربر
              </span>
                    </div>
                </div>

                <!-- Users List Content -->
                <div class="p-6">
                    <div id="selectedUsersList" class="space-y-3">
                        @if($group->users()->count() > 0)
                            @foreach($group->users()->get() as $user)
                                <div class="user-item bg-gray-50 dark:bg-gray-700 rounded-xl p-3 border border-gray-200 dark:border-gray-600" data-user-id="{{ $user->id }}">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                                            @if($user->avatar)
                                                <img src="{{ $user->avatar }}" class="w-full h-full rounded-full object-cover" alt="{{ $user->name }}">
                                            @else
                                                <i class="fas fa-user text-white text-sm"></i>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="font-medium text-gray-900 dark:text-white text-sm truncate">{{ $user->name }}</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 truncate">{{ $user->email }}</div>
                                            @if($user->phone)
                                                <div class="text-xs text-gray-500 dark:text-gray-500">{{ $user->phone }}</div>
                                            @endif
                                        </div>
                                        <button onclick="removeUser({{ $user->id }})"
                                                class="p-1 rounded-lg bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-800 transition">
                                            <i class="fas fa-times text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Empty State -->
                            <div id="emptyUsersState" class="text-center py-8">
                                <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-user-plus text-gray-400 text-2xl"></i>
                                </div>
                                <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">هیچ کاربری در گروه نیست</h4>
                                <p class="text-xs text-gray-600 dark:text-gray-400">از قسمت جستجو کاربران را پیدا کرده و اضافه کنید</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
@endsection
@push('scripts')
    <script src="/js/modules/sweetalert2.js"></script>
<script>
    let selectedUsers = [];
    let selectedIcon = '{{ $group->icon }}';
    let searchTimeout;
    let removedUsers = [];
    let addedUsers = [];

    // Initialize selected users from existing group members
    @foreach($group->users()->get() as $user)
    selectedUsers.push({
        id: {{ $user->id }},
        name: '{{ $user->name }}',
        email: '{{ $user->email }}',
        phone: '{{ $user->phone ?? '' }}'
    });
    @endforeach

    // CSRF Token setup for AJAX requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Icon selection
    function selectIcon(iconClass) {
        selectedIcon = iconClass;
        document.getElementById('selectedIcon').value = iconClass;

        // Update UI
        document.querySelectorAll('.icon-option').forEach(option => {
            option.classList.remove('bg-purple-100', 'dark:bg-purple-900', 'border-purple-500');
            option.classList.add('border-gray-300', 'dark:border-gray-600');
        });

        const selectedOption = document.querySelector(`[onclick="selectIcon('${iconClass}')"]`);
        if (selectedOption) {
            selectedOption.classList.add('bg-purple-100', 'dark:bg-purple-900', 'border-purple-500');
            selectedOption.classList.remove('border-gray-300', 'dark:border-gray-600');
        }
    }

    // Search users with AJAX
    function searchUsers(query) {
        clearTimeout(searchTimeout);

        if (query.length < 2) {
            hideSearchResults();
            return;
        }

        // Show loading
        document.getElementById('searchLoading').classList.remove('hidden');

        searchTimeout = setTimeout(() => {
            // Simulate AJAX call - Replace with actual endpoint
            fetch('{{route('admin.users.search')}}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ query: query })
            })
                .then(response => response.json())
                .then(data => {
                    displaySearchResults(data.users);
                    document.getElementById('searchLoading').classList.add('hidden');
                })
                .catch(error => {
                    Swal.fire({
                        title: 'خطا',
                        text: error.message || 'خطا در جستجو!',
                        icon: 'error',
                    });

                    document.getElementById('searchLoading').classList.add('hidden');
                });
        }, 300);
    }


    // Display search results
    function displaySearchResults(users) {
        const resultsContainer = document.getElementById('searchResults');

        if (users.length === 0) {
            resultsContainer.innerHTML = `
          <div class="p-4 text-center text-gray-500 dark:text-gray-400">
            <i class="fas fa-search text-2xl mb-2"></i>
            <p class="text-sm">کاربری یافت نشد</p>
          </div>
        `;
        } else {
            resultsContainer.innerHTML = users.map(user => `
          <div class="p-3 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer border-b border-gray-200 dark:border-gray-600 last:border-b-0"
               onclick="addUser(${user.id}, '${user.name}', '${user.email}', '${user.phone}')">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                ${user.avatar ? `<img src="${user.avatar}" class="w-full h-full rounded-full object-cover">` : `<i class="fas fa-user text-white text-sm"></i>`}
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-medium text-gray-900 dark:text-white truncate">${user.name}</div>
                <div class="text-sm text-gray-600 dark:text-gray-400 truncate">${user.email}</div>
                <div class="text-xs text-gray-500 dark:text-gray-500">${user.phone}</div>
              </div>
              ${selectedUsers.some(u => u.id === user.id) ?
                '<i class="fas fa-check text-green-500"></i>' :
                '<i class="fas fa-plus text-purple-500"></i>'
            }
            </div>
          </div>
        `).join('');
        }

        resultsContainer.classList.remove('hidden');
    }

    // Hide search results
    function hideSearchResults() {
        document.getElementById('searchResults').classList.add('hidden');
    }

    // Add user to selected list
    function addUser(id, name, email, phone) {
        // Check if user already exists
        if (selectedUsers.some(user => user.id === id)) {
            Swal.fire({
                toast: true,
                position: 'top-start',
                icon: 'warning',
                title: 'کاربر تکراری',
                text: 'این کاربر قبلا اضافه شده است',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });

            return;
        }

        // Add user to selected list
        selectedUsers.push({ id, name, email, phone });

        // Update UI
        updateSelectedUsersList();
        updateUserCount();

        // Clear search
        document.getElementById('userSearch').value = '';
        hideSearchResults();
    }

    // Remove user from selected list
    function removeUser(userId) {
        selectedUsers = selectedUsers.filter(user => user.id !== userId);
        updateSelectedUsersList();
        updateUserCount();
    }

    // Update selected users list UI
    function updateSelectedUsersList() {
        const container = document.getElementById('selectedUsersList');
        const emptyState = document.getElementById('emptyUsersState');

        if (selectedUsers.length === 0) {
            emptyState.classList.remove('hidden');
            container.innerHTML = '<div id="emptyUsersState" class="text-center py-8"><div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-user-plus text-gray-400 text-2xl"></i></div><h4 class="text-sm font-medium text-gray-900 dark:text-white mb-2">هنوز کاربری اضافه نشده</h4><p class="text-xs text-gray-600 dark:text-gray-400">از قسمت جستجو کاربران را پیدا کرده و اضافه کنید</p></div>';
        } else {
            container.innerHTML = selectedUsers.map(user => `
          <div class="user-item bg-gray-50 dark:bg-gray-700 rounded-xl p-3 border border-gray-200 dark:border-gray-600 fade-in">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-white text-sm"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="font-medium text-gray-900 dark:text-white text-sm truncate">${user.name}</div>
                <div class="text-xs text-gray-600 dark:text-gray-400 truncate">${user.email}</div>
              </div>
              <button onclick="removeUser(${user.id})"
                      class="p-1 rounded-lg bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-800 transition">
                <i class="fas fa-times text-xs"></i>
              </button>
            </div>
          </div>
        `).join('');
        }
    }

    // Update user count
    function updateUserCount() {
        const count = selectedUsers.length;
        const countElement = document.getElementById('userCount');
        countElement.textContent = `${count} کاربر`;

        if (count > 0) {
            countElement.className = 'px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-xs font-medium';
        } else {
            countElement.className = 'px-2 py-1 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full text-xs font-medium';
        }
    }

    // Handle form submission
    document.getElementById('editGroupForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = {
            name: document.getElementById('groupName').value.trim(),
            description: document.getElementById('groupDescription').value.trim(),
            icon: selectedIcon,
            users: selectedUsers.map(user => user.id),

        };

        // Validation
        if (!formData.name) {
            Swal.fire({
                toast: true,
                position: 'top-center',
                icon: 'warning',
                title: 'نام گروه؟!',
                text: 'نام گروه الزامی است',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
            return;
        }

        if (formData.users.length === 0) {
            Swal.fire({
                toast: true,
                position: 'top-center',
                icon: 'warning',
                title: 'انتخاب کاربر',
                text: 'لطفا حداقل یک کاربر انتخاب کنید',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
            return;
        }

        // Show loading state
        const submitButton = document.querySelector('button[type="submit"]');
        const submitButtonText = document.getElementById('submitButtonText');
        const originalText = submitButtonText.textContent;

        submitButton.disabled = true;
        submitButtonText.innerHTML = '<i class="fas fa-spinner loading-spinner ml-2"></i>در حال ایجاد...';

        // Submit to Laravel route
        fetch('{{route('admin.groups.update',$group->id)}}', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({formData,_method: 'PUT',})
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        toast: true,
                        position: 'bottom-start',
                        icon: 'success',
                        title: 'گروه جدید',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                    // Redirect to groups list or show success message
                    //window.location.href = '/admin/groups';
                } else {

                    Swal.fire({
                        toast: true,
                        position: 'bottom-start',
                        icon: 'error',
                        title: ' ',
                        text:data.message || 'خطا در ایجاد گروه',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    toast: true,
                    position: 'bottom-start',
                    icon: 'error',
                    title: ' ',
                    text:data.message || 'خطا در ایجاد گروه',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            })
            .finally(() => {
                // Restore button state
                submitButton.disabled = false;
                submitButtonText.textContent = originalText;
            });
    });

    // Show validation error
    function showError(elementId, message) {
        const errorElement = document.getElementById(elementId);
        errorElement.textContent = message;
        errorElement.classList.remove('hidden');

        setTimeout(() => {
            errorElement.classList.add('hidden');
        }, 5000);
    }

    // Hide search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#userSearch') && !e.target.closest('#searchResults')) {
            hideSearchResults();
        }
    });

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        updateUserCount();
    });</script>
@endpush

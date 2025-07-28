// Global variables
let currentUser = null;
let courses = [];
let users = [];
let currentPurchaseCourseId = null;

// Initialize data from localStorage
function initializeData() {
    courses = JSON.parse(localStorage.getItem('courses')) || [
        {
            id: 1,
            name: 'فیزیک پایه دهم - ترم اول',
            grade: 'grade10',
            price: 500000,
            discount: 20,
            description: 'آموزش کامل فیزیک پایه دهم شامل حرکت، نیرو و انرژی'
        },
        {
            id: 2,
            name: 'فیزیک پایه یازدهم - مکانیک',
            grade: 'grade11',
            price: 600000,
            discount: 0,
            description: 'آموزش تخصصی مکانیک برای پایه یازدهم'
        },
        {
            id: 3,
            name: 'آماده‌سازی کنکور فیزیک',
            grade: 'konkur',
            price: 800000,
            discount: 15,
            description: 'دوره جامع آماده‌سازی کنکور با حل تست‌های متنوع'
        }
    ];
    
    users = JSON.parse(localStorage.getItem('users')) || [];
    
    // Save initial data
    localStorage.setItem('courses', JSON.stringify(courses));
    localStorage.setItem('users', JSON.stringify(users));
}

// Navigation functions
function showSection(sectionName) {
    document.querySelectorAll('.section').forEach(section => {
        section.classList.add('hidden');
    });
    
    if (sectionName === 'courses') {
        document.getElementById('coursesSection').classList.remove('hidden');
        displayCourses();
    } else if (sectionName === 'home') {
        document.getElementById('homeSection').classList.remove('hidden');
    }
}

function showLogin() {
    document.querySelectorAll('.section').forEach(section => {
        section.classList.add('hidden');
    });
    document.getElementById('loginSection').classList.remove('hidden');
    document.getElementById('loginForm').classList.remove('hidden');
    document.getElementById('registerForm').classList.add('hidden');
}

function showRegister() {
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('registerForm').classList.remove('hidden');
}

function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('active');
}

// Course functions
function showCourses(grade) {
    showSection('courses');
    
    // Update filter buttons
    document.querySelectorAll('.course-filter-btn').forEach(btn => {
        btn.classList.remove('active');
        btn.classList.add('text-gray-600', 'hover:bg-gray-100');
    });
    
    // Find and activate the correct button
    const buttons = document.querySelectorAll('.course-filter-btn');
    buttons.forEach(btn => {
        if ((grade === 'all' && btn.textContent.trim() === 'همه') ||
            (grade === 'grade10' && btn.textContent.trim() === 'پایه دهم') ||
            (grade === 'grade11' && btn.textContent.trim() === 'پایه یازدهم') ||
            (grade === 'grade12' && btn.textContent.trim() === 'پایه دوازدهم') ||
            (grade === 'konkur' && btn.textContent.trim() === 'کنکور')) {
            btn.classList.add('active');
            btn.classList.remove('text-gray-600', 'hover:bg-gray-100');
        }
    });
    
    displayCourses(grade);
}

function displayCourses(filterGrade = 'all') {
    const grid = document.getElementById('coursesGrid');
    const filteredCourses = filterGrade === 'all' ? courses : courses.filter(course => course.grade === filterGrade);
    
    grid.innerHTML = filteredCourses.map(course => {
        const finalPrice = course.discount > 0 ? course.price * (1 - course.discount / 100) : course.price;
        const gradeNames = {
            'grade10': 'پایه دهم',
            'grade11': 'پایه یازدهم',
            'grade12': 'پایه دوازدهم',
            'konkur': 'کنکور'
        };
        
        return `
            <div class="bg-white rounded-xl shadow-lg card-hover overflow-hidden">
                ${course.image ? 
                    `<div class="h-48 overflow-hidden">
                        <img src="${course.image}" alt="${course.name}" class="w-full h-full object-cover">
                    </div>` :
                    `<div class="h-48 bg-gradient-to-br from-cyan-400 to-blue-500 flex items-center justify-center text-white text-4xl">
                        <i class="fas fa-book-open"></i>
                    </div>`
                }
                <div class="p-6">
                    <div class="text-sm text-cyan-600 font-medium mb-2">${gradeNames[course.grade]}</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">${course.name}</h3>
                    <p class="text-gray-600 mb-4">${course.description}</p>
                    <div class="flex items-center justify-between">
                        <div>
                            ${course.discount > 0 ? `
                                <span class="text-lg font-bold text-green-600">${finalPrice.toLocaleString()} تومان</span>
                                <span class="text-sm text-gray-500 line-through mr-2">${course.price.toLocaleString()}</span>
                                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">${course.discount}% تخفیف</span>
                            ` : `
                                <span class="text-lg font-bold text-cyan-600">${course.price.toLocaleString()} تومان</span>
                            `}
                        </div>
                        <button onclick="buyCourse(${course.id})" class="btn-primary text-white px-4 py-2 rounded-lg font-medium">
                            خرید
                        </button>
                    </div>
                </div>
            </div>
        `;
    }).join('');
}

function buyCourse(courseId) {
    if (!currentUser) {
        alert('برای خرید دوره ابتدا وارد حساب کاربری خود شوید');
        showLogin();
        return;
    }
    
    if (currentUser.username === 'admin') {
        alert('ادمین نمی‌تواند دوره خرید کند');
        return;
    }
    
    const course = courses.find(c => c.id === courseId);
    if (!course) return;
    
    // Check if user already has this course or has pending purchase
    const purchases = JSON.parse(localStorage.getItem('purchases')) || [];
    const existingPurchase = purchases.find(p => p.userId === currentUser.username && p.courseId === courseId);
    
    if (existingPurchase) {
        if (existingPurchase.status === 'approved') {
            alert('شما قبلاً این دوره را خریداری کرده‌اید');
        } else if (existingPurchase.status === 'pending') {
            alert('خرید این دوره در انتظار تایید است');
        } else {
            alert('خرید این دوره رد شده است. می‌توانید مجدداً تلاش کنید');
        }
        return;
    }
    
    showPurchaseForm(courseId);
}

function showPurchaseForm(courseId) {
    currentPurchaseCourseId = courseId;
    const course = courses.find(c => c.id === courseId);
    
    document.querySelectorAll('.section').forEach(section => {
        section.classList.add('hidden');
    });
    document.getElementById('purchaseSection').classList.remove('hidden');
    
    const finalPrice = course.discount > 0 ? course.price * (1 - course.discount / 100) : course.price;
    const gradeNames = {
        'grade10': 'پایه دهم',
        'grade11': 'پایه یازدهم',
        'grade12': 'پایه دوازدهم',
        'konkur': 'کنکور'
    };
    
    document.getElementById('courseDetails').innerHTML = `
        <div class="bg-purple-50 rounded-lg p-6">
            <div class="text-center">
                <div class="text-sm text-purple-600 font-medium mb-2">${gradeNames[course.grade]}</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">${course.name}</h3>
                <p class="text-gray-600 mb-4">${course.description}</p>
                <div class="text-3xl font-bold text-purple-600">
                    ${finalPrice.toLocaleString()} تومان
                    ${course.discount > 0 ? `
                        <span class="text-lg text-gray-500 line-through mr-2">${course.price.toLocaleString()}</span>
                        <span class="bg-red-100 text-red-600 text-sm px-2 py-1 rounded-full">${course.discount}% تخفیف</span>
                    ` : ''}
                </div>
            </div>
        </div>
    `;
    
    // Setup file input preview
    document.getElementById('receiptFile').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('receiptPreview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
}

function submitPurchase() {
    const fileInput = document.getElementById('receiptFile');
    if (!fileInput.files[0]) {
        alert('لطفاً فیش واریزی را آپلود کنید');
        return;
    }
    
    const reader = new FileReader();
    reader.onload = function(e) {
        // Course purchase
        const purchase = {
            id: Date.now(),
            userId: currentUser.username,
            courseId: currentPurchaseCourseId,
            receiptImage: e.target.result,
            status: 'pending',
            purchaseDate: new Date().toISOString()
        };
        
        const purchases = JSON.parse(localStorage.getItem('purchases')) || [];
        purchases.push(purchase);
        localStorage.setItem('purchases', JSON.stringify(purchases));
        
        alert('پرداخت شما با موفقیت ثبت شد!\nتا 24 ساعت آینده دوره خریداری شده پس از بررسی توسط ادمین فعال خواهد شد.');
        
        // Reset purchase ID
        currentPurchaseCourseId = null;
        
        showUserDashboard();
    };
    reader.readAsDataURL(fileInput.files[0]);
}

// Authentication functions
function handleLogin(event) {
    event.preventDefault();
    
    const username = document.getElementById('loginUsername').value;
    const password = document.getElementById('loginPassword').value;
    
    // Check admin login
    if (username === 'admin' && password === 'Amin8708QQ') {
        currentUser = { username: 'admin', isAdmin: true };
        updateAuthButtons();
        showAdminPanel();
        return;
    }
    
    // Check user login
    const user = users.find(u => u.username === username && u.password === password);
    if (user) {
        currentUser = user;
        updateAuthButtons();
        showUserDashboard();
    } else {
        alert('نام کاربری یا رمز عبور اشتباه است');
    }
}

function updateAuthButtons() {
    const authButtons = document.getElementById('authButtons');
    const userPanelLink = document.getElementById('userPanelLink');
    const mobileUserPanelLink = document.getElementById('mobileUserPanelLink');
    
    if (currentUser) {
        if (currentUser.isAdmin) {
            authButtons.innerHTML = `
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="text-gray-700">خوش آمدید، ادمین</span>
                    <button onclick="logout()" class="btn-danger text-white px-4 py-2 rounded-lg font-medium">
                        <i class="fas fa-sign-out-alt mr-2"></i>خروج
                    </button>
                </div>
            `;
            userPanelLink.classList.add('hidden');
            mobileUserPanelLink.classList.add('hidden');
        } else {
            authButtons.innerHTML = `
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="text-gray-700">خوش آمدید، ${currentUser.name || currentUser.username}</span>
                    <button onclick="logout()" class="btn-danger text-white px-4 py-2 rounded-lg font-medium">
                        <i class="fas fa-sign-out-alt mr-2"></i>خروج
                    </button>
                </div>
            `;
            userPanelLink.classList.remove('hidden');
            mobileUserPanelLink.classList.remove('hidden');
        }
    } else {
        authButtons.innerHTML = `
            <button onclick="showLogin()" class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                ورود / ثبت نام
            </button>
        `;
        userPanelLink.classList.add('hidden');
        mobileUserPanelLink.classList.add('hidden');
    }
}

function handleRegister(event) {
    event.preventDefault();
    
    const name = document.getElementById('registerName').value;
    const username = document.getElementById('registerUsername').value;
    const password = document.getElementById('registerPassword').value;
    const phone = document.getElementById('registerPhone').value;
    
    // Check if username already exists
    if (users.find(u => u.username === username)) {
        alert('این نام کاربری قبلاً استفاده شده است');
        return;
    }
    
    // Create new user
    const newUser = {
        name,
        username,
        password,
        phone,
        courses: []
    };
    
    users.push(newUser);
    localStorage.setItem('users', JSON.stringify(users));
    
    alert('ثبت نام با موفقیت انجام شد! اکنون می‌توانید وارد شوید');
    showLogin();
}

function logout() {
    currentUser = null;
    updateAuthButtons();
    showSection('home');
}

// Admin functions
function showAdminPanel() {
    document.querySelectorAll('.section').forEach(section => {
        section.classList.add('hidden');
    });
    document.getElementById('adminSection').classList.remove('hidden');
    displayPendingPurchases();
    displayUsers();
    displayCoursesManagement();
    
    // Setup course image preview
    document.getElementById('courseImage').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('coursePreviewImg').src = e.target.result;
                document.getElementById('courseImagePreview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
}

function addCourse(event) {
    event.preventDefault();
    
    const name = document.getElementById('courseName').value;
    const grade = document.getElementById('courseGrade').value;
    const price = parseInt(document.getElementById('coursePrice').value);
    const discount = parseInt(document.getElementById('courseDiscount').value) || 0;
    const description = document.getElementById('courseDescription').value;
    const imageFile = document.getElementById('courseImage').files[0];
    
    const newCourse = {
        id: courses.length > 0 ? Math.max(...courses.map(c => c.id)) + 1 : 1,
        name,
        grade,
        price,
        discount,
        description,
        image: null
    };
    
    if (imageFile) {
        const reader = new FileReader();
        reader.onload = function(e) {
            newCourse.image = e.target.result;
            courses.push(newCourse);
            localStorage.setItem('courses', JSON.stringify(courses));
            alert('دوره جدید با موفقیت اضافه شد!');
            event.target.reset();
            document.getElementById('courseImagePreview').classList.add('hidden');
            displayCoursesManagement();
        };
        reader.readAsDataURL(imageFile);
    } else {
        courses.push(newCourse);
        localStorage.setItem('courses', JSON.stringify(courses));
        alert('دوره جدید با موفقیت اضافه شد!');
        event.target.reset();
        displayCoursesManagement();
    }
}

function displayCoursesManagement() {
    const container = document.getElementById('coursesManagement');
    const gradeNames = {
        'grade10': 'پایه دهم',
        'grade11': 'پایه یازدهم',
        'grade12': 'پایه دوازدهم',
        'konkur': 'کنکور'
    };
    
    container.innerHTML = courses.map(course => `
        <div class="bg-gray-50 rounded-lg p-6 border">
            <div class="grid md:grid-cols-4 gap-4 items-center">
                <div class="flex items-center space-x-4 space-x-reverse">
                    ${course.image ? 
                        `<img src="${course.image}" alt="${course.name}" class="w-16 h-16 object-cover rounded-lg">` :
                        `<div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-lg flex items-center justify-center text-white text-xl">
                            <i class="fas fa-book-open"></i>
                        </div>`
                    }
                    <div>
                        <h4 class="font-semibold text-gray-800">${course.name}</h4>
                        <p class="text-sm text-gray-600">${gradeNames[course.grade]}</p>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="font-bold text-cyan-600">${course.price.toLocaleString()} تومان</p>
                    ${course.discount > 0 ? `<p class="text-sm text-red-600">${course.discount}% تخفیف</p>` : ''}
                </div>
                
                <div class="text-sm text-gray-600">
                    ${course.description.substring(0, 50)}...
                </div>
                
                <div class="flex space-x-2 space-x-reverse">
                    <button onclick="editCourse(${course.id})" class="btn-primary text-white px-3 py-1 rounded text-sm">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="deleteCourse(${course.id})" class="btn-danger text-white px-3 py-1 rounded text-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `).join('');
}

function editCourse(courseId) {
    const course = courses.find(c => c.id === courseId);
    if (!course) return;
    
    document.getElementById('courseName').value = course.name;
    document.getElementById('courseGrade').value = course.grade;
    document.getElementById('coursePrice').value = course.price;
    document.getElementById('courseDiscount').value = course.discount;
    document.getElementById('courseDescription').value = course.description;
    
    // Change form to edit mode
    const form = document.querySelector('#adminSection form');
    form.onsubmit = function(event) {
        event.preventDefault();
        updateCourse(courseId);
    };
    
    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-save mr-2"></i>ویرایش دوره';
    submitBtn.onclick = () => updateCourse(courseId);
}

function updateCourse(courseId) {
    const courseIndex = courses.findIndex(c => c.id === courseId);
    if (courseIndex === -1) return;
    
    const name = document.getElementById('courseName').value;
    const grade = document.getElementById('courseGrade').value;
    const price = parseInt(document.getElementById('coursePrice').value);
    const discount = parseInt(document.getElementById('courseDiscount').value) || 0;
    const description = document.getElementById('courseDescription').value;
    const imageFile = document.getElementById('courseImage').files[0];
    
    courses[courseIndex] = {
        ...courses[courseIndex],
        name,
        grade,
        price,
        discount,
        description
    };
    
    if (imageFile) {
        const reader = new FileReader();
        reader.onload = function(e) {
            courses[courseIndex].image = e.target.result;
            localStorage.setItem('courses', JSON.stringify(courses));
            alert('دوره با موفقیت ویرایش شد!');
            resetCourseForm();
            displayCoursesManagement();
        };
        reader.readAsDataURL(imageFile);
    } else {
        localStorage.setItem('courses', JSON.stringify(courses));
        alert('دوره با موفقیت ویرایش شد!');
        resetCourseForm();
        displayCoursesManagement();
    }
}

function deleteCourse(courseId) {
    if (confirm('آیا مطمئن هستید که می‌خواهید این دوره را حذف کنید؟')) {
        courses = courses.filter(c => c.id !== courseId);
        localStorage.setItem('courses', JSON.stringify(courses));
        alert('دوره با موفقیت حذف شد!');
        displayCoursesManagement();
    }
}

function resetCourseForm() {
    const form = document.querySelector('#adminSection form');
    form.reset();
    form.onsubmit = addCourse;
    
    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-plus mr-2"></i>افزودن دوره';
    submitBtn.onclick = null;
    
    document.getElementById('courseImagePreview').classList.add('hidden');
}

function displayPendingPurchases() {
    const purchases = JSON.parse(localStorage.getItem('purchases')) || [];
    const pendingPurchases = purchases.filter(p => p.status === 'pending');
    const container = document.getElementById('pendingPurchases');
    
    if (pendingPurchases.length === 0) {
        container.innerHTML = '<p class="text-gray-500 text-center py-8">هیچ خرید در انتظار تایید وجود ندارد</p>';
        return;
    }
    
    const allPendingHTML = [];
    
    // Course purchases
    pendingPurchases.forEach(purchase => {
        const user = users.find(u => u.username === purchase.userId);
        const course = courses.find(c => c.id === purchase.courseId);
        const purchaseDate = new Date(purchase.purchaseDate).toLocaleDateString('fa-IR');
        
        allPendingHTML.push(`
            <div class="bg-white border rounded-lg p-6 shadow-sm">
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <h4 class="font-semibold text-gray-800 mb-2">اطلاعات کاربر</h4>
                        <p class="text-sm text-gray-600">نام: ${user ? user.name : 'نامشخص'}</p>
                        <p class="text-sm text-gray-600">نام کاربری: ${purchase.userId}</p>
                        <p class="text-sm text-gray-600">شماره: ${user ? user.phone : 'نامشخص'}</p>
                        <p class="text-sm text-gray-600">تاریخ خرید: ${purchaseDate}</p>
                    </div>
                    
                    <div>
                        <h4 class="font-semibold text-gray-800 mb-2">اطلاعات دوره</h4>
                        <p class="text-sm text-gray-600">نام دوره: ${course ? course.name : 'دوره حذف شده'}</p>
                        <p class="text-sm text-gray-600">قیمت: ${course ? course.price.toLocaleString() : 'نامشخص'} تومان</p>
                        ${course && course.discount > 0 ? `<p class="text-sm text-green-600">تخفیف: ${course.discount}%</p>` : ''}
                    </div>
                    
                    <div>
                        <h4 class="font-semibold text-gray-800 mb-2">فیش واریزی</h4>
                        <img src="${purchase.receiptImage}" alt="فیش واریزی" class="w-full h-32 object-contain border rounded mb-4">
                        <div class="mb-3">
                            <label class="block text-xs font-medium text-gray-700 mb-1">کد لایسنس دوره:</label>
                            <input type="text" id="licenseCode_${purchase.id}" class="w-full px-2 py-1 border rounded text-sm" placeholder="کد لایسنس را وارد کنید">
                        </div>
                        <div class="flex space-x-2 space-x-reverse">
                            <button onclick="approvePurchase(${purchase.id})" class="flex-1 bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition text-sm">
                                تایید
                            </button>
                            <button onclick="rejectPurchase(${purchase.id})" class="flex-1 bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 transition text-sm">
                                رد
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `);
    });
    
    container.innerHTML = allPendingHTML.join('');
}

function approvePurchase(purchaseId) {
    const licenseCodeInput = document.getElementById(`licenseCode_${purchaseId}`);
    const licenseCode = licenseCodeInput ? licenseCodeInput.value.trim() : '';
    
    if (!licenseCode) {
        alert('لطفاً کد لایسنس دوره را وارد کنید');
        return;
    }
    
    const purchases = JSON.parse(localStorage.getItem('purchases')) || [];
    const purchaseIndex = purchases.findIndex(p => p.id === purchaseId);
    
    if (purchaseIndex !== -1) {
        purchases[purchaseIndex].status = 'approved';
        purchases[purchaseIndex].licenseCode = licenseCode;
        localStorage.setItem('purchases', JSON.stringify(purchases));
        
        // Add course to user's courses
        const purchase = purchases[purchaseIndex];
        const userIndex = users.findIndex(u => u.username === purchase.userId);
        if (userIndex !== -1) {
            if (!users[userIndex].courses) users[userIndex].courses = [];
            if (!users[userIndex].courses.includes(purchase.courseId)) {
                users[userIndex].courses.push(purchase.courseId);
            }
            localStorage.setItem('users', JSON.stringify(users));
        }
        
        alert('خرید با موفقیت تایید شد و کد لایسنس ثبت گردید!');
        displayPendingPurchases();
        displayUsers();
    }
}

function rejectPurchase(purchaseId) {
    const purchases = JSON.parse(localStorage.getItem('purchases')) || [];
    const purchaseIndex = purchases.findIndex(p => p.id === purchaseId);
    
    if (purchaseIndex !== -1) {
        purchases[purchaseIndex].status = 'rejected';
        localStorage.setItem('purchases', JSON.stringify(purchases));
        
        alert('خرید رد شد');
        displayPendingPurchases();
    }
}

function displayUsers() {
    const tbody = document.getElementById('usersTableBody');
    const purchases = JSON.parse(localStorage.getItem('purchases')) || [];
    
    tbody.innerHTML = users.map(user => {
        // Get approved courses for this user
        const approvedPurchases = purchases.filter(p => p.userId === user.username && p.status === 'approved');
        const userCourses = approvedPurchases.map(purchase => {
            const course = courses.find(c => c.id === purchase.courseId);
            return course ? course.name : 'دوره حذف شده';
        }).join(', ') || 'هیچ دوره‌ای خریداری نشده';
        
        return `
            <tr class="border-b">
                <td class="px-4 py-3">${user.name}</td>
                <td class="px-4 py-3">${user.username}</td>
                <td class="px-4 py-3">${user.phone}</td>
                <td class="px-4 py-3">${userCourses}</td>
            </tr>
        `;
    }).join('');
}

// User dashboard functions
function showUserDashboard() {
    document.querySelectorAll('.section').forEach(section => {
        section.classList.add('hidden');
    });
    document.getElementById('userSection').classList.remove('hidden');
    displayUserDashboard();
}

function displayUserDashboard() {
    // Update header info
    const userHeaderInfo = document.getElementById('userHeaderInfo');
    userHeaderInfo.innerHTML = `
        <div>
            <h2 class="text-2xl font-bold">${currentUser.name}</h2>
            <p class="text-gray-300">@${currentUser.username}</p>
        </div>
    `;
    
    // Update detailed user info
    const userDetailedInfo = document.getElementById('userDetailedInfo');
    userDetailedInfo.innerHTML = `
        <div class="space-y-4">
            <div class="flex items-center space-x-3 space-x-reverse">
                <i class="fas fa-user text-cyan-400 text-xl"></i>
                <div>
                    <div class="text-sm text-gray-300">نام کامل</div>
                    <div class="font-medium">${currentUser.name}</div>
                </div>
            </div>
            <div class="flex items-center space-x-3 space-x-reverse">
                <i class="fas fa-at text-purple-400 text-xl"></i>
                <div>
                    <div class="text-sm text-gray-300">نام کاربری</div>
                    <div class="font-medium">${currentUser.username}</div>
                </div>
            </div>
        </div>
        <div class="space-y-4">
            <div class="flex items-center space-x-3 space-x-reverse">
                <i class="fas fa-phone text-green-400 text-xl"></i>
                <div>
                    <div class="text-sm text-gray-300">شماره تماس</div>
                    <div class="font-medium">${currentUser.phone}</div>
                </div>
            </div>
            <div class="flex items-center space-x-3 space-x-reverse">
                <i class="fas fa-calendar text-blue-400 text-xl"></i>
                <div>
                    <div class="text-sm text-gray-300">تاریخ عضویت</div>
                    <div class="font-medium">امروز</div>
                </div>
            </div>
        </div>
    `;
    
    const userCoursesDiv = document.getElementById('userCourses');
    const purchases = JSON.parse(localStorage.getItem('purchases')) || [];
    const userPurchases = purchases.filter(p => p.userId === currentUser.username);
    
    // Update stats
    const activeCourses = userPurchases.filter(p => p.status === 'approved').length;
    const pendingCourses = userPurchases.filter(p => p.status === 'pending').length;
    const totalCourses = userPurchases.length;
    
    document.getElementById('activeCourses').textContent = activeCourses;
    document.getElementById('pendingCourses').textContent = pendingCourses;
    document.getElementById('totalCourses').textContent = totalCourses;
    
    if (userPurchases.length > 0) {
        const gradeNames = {
            'grade10': 'پایه دهم',
            'grade11': 'پایه یازدهم',
            'grade12': 'پایه دوازدهم',
            'konkur': 'کنکور'
        };
        
        const courseCards = userPurchases.map(purchase => {
            const course = courses.find(c => c.id === purchase.courseId);
            if (!course) return '';
            
            let statusBadge = '';
            let actionButton = '';
            let licenseSection = '';
            
            if (purchase.status === 'pending') {
                statusBadge = '<span class="bg-yellow-500/20 text-yellow-300 text-xs px-3 py-1 rounded-full border border-yellow-500/30">⏳ در انتظار تایید</span>';
                actionButton = '<button class="bg-gray-500 text-white px-4 py-2 rounded-lg cursor-not-allowed text-sm" disabled>در انتظار تایید</button>';
            } else if (purchase.status === 'approved') {
                statusBadge = '<span class="bg-green-500/20 text-green-300 text-xs px-3 py-1 rounded-full border border-green-500/30">✅ فعال</span>';
                actionButton = `<button onclick="showCourseGuide('${purchase.licenseCode}', '${course.name}')" class="btn-success text-white px-4 py-2 rounded-lg text-sm">📚 آموزش استفاده</button>`;
                licenseSection = `
                    <div class="mt-4 p-3 bg-green-500/10 border border-green-500/30 rounded-lg">
                        <div class="text-xs text-green-300 mb-1">کد لایسنس:</div>
                        <div class="font-mono text-sm text-green-400 bg-black/30 px-2 py-1 rounded">${purchase.licenseCode}</div>
                    </div>
                `;
            } else if (purchase.status === 'rejected') {
                statusBadge = '<span class="bg-red-500/20 text-red-300 text-xs px-3 py-1 rounded-full border border-red-500/30">❌ رد شده</span>';
                actionButton = '<button onclick="buyCourse(' + course.id + ')" class="btn-primary text-white px-4 py-2 rounded-lg text-sm">🔄 خرید مجدد</button>';
            }
            
            return `
                <div class="glass-effect rounded-xl p-6 border-r-4 ${purchase.status === 'approved' ? 'border-green-400' : purchase.status === 'pending' ? 'border-yellow-400' : 'border-red-400'} card-hover">
                    <div class="flex justify-between items-start mb-3">
                        <div class="text-sm text-cyan-400 font-medium">${gradeNames[course.grade]}</div>
                        ${statusBadge}
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">${course.name}</h3>
                    <p class="text-gray-300 text-sm mb-4">${course.description}</p>
                    ${licenseSection}
                    <div class="mt-4">
                        ${actionButton}
                    </div>
                </div>
            `;
        }).filter(html => html !== '').join('');
        
        userCoursesDiv.innerHTML = courseCards;
    } else {
        userCoursesDiv.innerHTML = `
            <div class="col-span-full text-center py-12">
                <div class="text-6xl mb-4">📚</div>
                <p class="text-gray-300 text-lg mb-4">هنوز هیچ دوره‌ای خریداری نکرده‌اید</p>
                <button onclick="showSection('courses')" class="btn-primary text-white px-6 py-3 rounded-xl font-medium">
                    <i class="fas fa-search mr-2"></i>مشاهده دوره‌ها
                </button>
            </div>
        `;
    }
}

function showCourseGuide(licenseCode, courseName) {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4';
    modal.innerHTML = `
        <div class="glass-effect rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-8 text-white">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold flex items-center">
                        <i class="fas fa-graduation-cap mr-3 text-purple-400"></i>
                        راهنمای استفاده از دوره
                    </h2>
                    <button onclick="this.closest('.fixed').remove()" class="text-gray-400 hover:text-white text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="space-y-6">
                    <!-- Course Info -->
                    <div class="bg-purple-500/20 border border-purple-500/30 rounded-lg p-4">
                        <h3 class="font-bold text-purple-300 mb-2">📖 دوره: ${courseName}</h3>
                    </div>
                    
                    <!-- License Code Section -->
                    <div class="bg-green-500/20 border border-green-500/30 rounded-lg p-4">
                        <h3 class="font-bold text-green-300 mb-3">🔑 کد لایسنس شما</h3>
                        <div class="bg-black/40 rounded-lg p-3 mb-3">
                            <div class="font-mono text-lg text-center text-green-400 select-all">${licenseCode}</div>
                        </div>
                        <button onclick="navigator.clipboard.writeText('${licenseCode}'); alert('کد لایسنس کپی شد!')" class="w-full btn-success text-white py-2 rounded-lg text-sm">
                            <i class="fas fa-copy mr-2"></i>کپی کد لایسنس
                        </button>
                        
                        <div class="mt-4 p-3 bg-yellow-500/20 border border-yellow-500/30 rounded-lg">
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <i class="fas fa-exclamation-triangle text-yellow-400 mt-1"></i>
                                <div class="text-sm text-yellow-300">
                                    <strong>هشدار مهم:</strong> این کد لایسنس شخصی شما است و نباید با دیگران به اشتراک گذاشته شود.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Usage Guide -->
                    <div class="bg-blue-500/20 border border-blue-500/30 rounded-lg p-4">
                        <h3 class="font-bold text-blue-300 mb-3">📱 راهنمای استفاده</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">1</span>
                                <div>
                                    <strong>دانلود برنامه:</strong> به سایت 
                                    <a href="https://spotplayer.ir/" target="_blank" class="text-cyan-400 hover:text-cyan-300 underline">spotplayer.ir</a>
                                    مراجعه کرده و برنامه را دانلود کنید.
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">2</span>
                                <div>
                                    <strong>نصب برنامه:</strong> برنامه SpotPlayer را روی دستگاه خود نصب کنید.
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">3</span>
                                <div>
                                    <strong>وارد کردن کد:</strong> کد لایسنس بالا را در برنامه وارد کنید.
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">4</span>
                                <div>
                                    <strong>شروع یادگیری:</strong> حالا می‌توانید به تمام ویدیوهای دوره دسترسی داشته باشید!
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Important Notes -->
                    <div class="bg-red-500/20 border border-red-500/30 rounded-lg p-4">
                        <h3 class="font-bold text-red-300 mb-3">⚠️ نکات مهم و هشدارها</h3>
                        <div class="space-y-2 text-sm text-red-200">
                            <div class="flex items-start space-x-2 space-x-reverse">
                                <i class="fas fa-shield-alt text-red-400 mt-1"></i>
                                <div>کد لایسنس شما شخصی است و نباید با دیگران به اشتراک گذاشته شود.</div>
                            </div>
                            <div class="flex items-start space-x-2 space-x-reverse">
                                <i class="fas fa-clock text-red-400 mt-1"></i>
                                <div>دسترسی به دوره تا پایان دوره تحصیلی معتبر است.</div>
                            </div>
                            <div class="flex items-start space-x-2 space-x-reverse">
                                <i class="fas fa-mobile-alt text-red-400 mt-1"></i>
                                <div>هر کد لایسنس فقط روی یک دستگاه قابل استفاده است.</div>
                            </div>
                            <div class="flex items-start space-x-2 space-x-reverse">
                                <i class="fas fa-ban text-red-400 mt-1"></i>
                                <div>در صورت سوء استفاده، دسترسی شما قطع خواهد شد.</div>
                            </div>
                            <div class="flex items-start space-x-2 space-x-reverse">
                                <i class="fas fa-headset text-red-400 mt-1"></i>
                                <div>برای مشکلات فنی با پشتیبانی تماس بگیرید.</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Support -->
                    <div class="bg-gray-500/20 border border-gray-500/30 rounded-lg p-4">
                        <h3 class="font-bold text-gray-300 mb-3">🆘 پشتیبانی</h3>
                        <p class="text-sm text-gray-300 mb-3">
                            در صورت بروز مشکل در استفاده از برنامه یا کد لایسنس، با ما تماس بگیرید:
                        </p>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <i class="fas fa-phone text-green-400"></i>
                                <a href="tel:09148797767" class="text-cyan-400 hover:text-cyan-300">۰۹۱۴۸۷۹۷۷۶۷</a>
                            </div>
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <i class="fas fa-envelope text-blue-400"></i>
                                <a href="mailto:hosseinssp@gmail.com" class="text-cyan-400 hover:text-cyan-300">hosseinssp@gmail.com</a>
                            </div>
                            <div class="text-xs text-gray-400 mt-2">
                                ساعات پاسخگویی: روزهای کاری ۹ صبح تا ۹ شب
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 flex space-x-3 space-x-reverse">
                    <a href="https://spotplayer.ir/" target="_blank" class="flex-1 btn-primary text-white py-3 rounded-lg text-center font-medium">
                        <i class="fas fa-download mr-2"></i>دانلود SpotPlayer
                    </a>
                    <button onclick="this.closest('.fixed').remove()" class="flex-1 bg-gray-600 text-white py-3 rounded-lg font-medium hover:bg-gray-700 transition">
                        <i class="fas fa-check mr-2"></i>متوجه شدم
                    </button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
}

// Initialize the application
document.addEventListener('DOMContentLoaded', function() {
    initializeData();
    displayCourses();
});
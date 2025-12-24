@extends('layouts.admin.master')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

<!-- Header -->
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-5">
    <div class="bg-white dark:bg-gray-800 text-white border border-gray-200 dark:border-gray-700 py-8 px-6 rounded-2xl shadow-lg">
        <div class="flex items-center gap-4">
            <form method="GET" action="/tricks">
                <button type="submit" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition">
                    <i class="fas fa-arrow-right text-white"></i>
                </button>
            </form>
            <div>
                <h1 class="text-3xl font-bold">افزودن مقاله جدید</h1>
                <p class="text-lg opacity-90">مقاله کاربردی خود را با ویرایشگر پیشرفته بسازید</p>
            </div>
        </div>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 ">

    <form method="POST" action="{{route('admin.blogs.store')}}"  class="space-y-8">
        @csrf

        <!-- Title & Category -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                    <i class="fas fa-info-circle text-blue-600 dark:text-blue-400"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">اطلاعات اصلی</h2>
            </div>

            <!-- Title -->
            <div class="form-group mb-5">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fas fa-heading ml-2 text-purple-600"></i>
                    عنوان مقاله *
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       required
                       maxlength="100"
                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-lg"
                       placeholder="مثال: رمز عبور قوی و امن بسازید">

            </div>

            <!-- Category -->
            <div class="form-group mb-5">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-tags ml-2 text-purple-600"></i>
                    دسته‌بندی *
                </label>

                <select name="category" id="category" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    <option value="آشپزی">علمی</option>
                    <option value="آشپزی">فیزیک</option>
                    <option value="آشپزی">ریاضی</option>
                    <option value="آشپزی">تکنولوژی</option>
                    <option value="آشپزی">سلامت</option>
                    <option value="آشپزی">سبک زندگی</option>
                </select>

            </div>

            <!-- Description -->
            <div class="form-group mb-5">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fas fa-align-left ml-2 text-purple-600"></i>
                    توضیح کوتاه *
                </label>
                <textarea id="description"
                          name="description"
                          required
                          maxlength="200"
                          rows="3"
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white resize-none"
                          placeholder="توضیح کوتاهی از مقاله که در کارت نمایش داده می‌شود..."></textarea>
                <div class="char-counter mt-1" id="description-counter">0/200 کاراکتر</div>
            </div>

        </div>

        <!-- TinyMCE Content Editor -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center">
                    <i class="fas fa-edit text-green-600 dark:text-green-400"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">محتوای مقاله</h2>
                <div class="mr-auto">
                    <span class="text-sm text-gray-500 dark:text-gray-400">ویرایشگر پیشرفته TinyMCE</span>
                </div>
            </div>

            <div class="form-group">
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-paragraph ml-2 text-purple-600"></i>
                    شرح کامل مقاله *
                </label>

                <!-- TinyMCE Editor -->
                <textarea id="content" name="content" class="tinymce-editor">
            <p>شرح کامل و مرحله به مرحله مقاله را اینجا بنویسید...</p>
            <p><br></p>
            <p><strong>مثال:</strong></p>
            <ol>
              <li>مرحله اول: ...</li>
              <li>مرحله دوم: ...</li>
              <li>مرحله سوم: ...</li>
            </ol>
            <p><br></p>
            <p><strong>نکته مهم:</strong> ...</p>
          </textarea>

                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-info-circle ml-1"></i>
                    از ابزارهای ویرایشگر برای قالب‌بندی متن، افزودن تصاویر، جداول و لینک استفاده کنید
                </div>
            </div>
        </div>

        <!-- Image Upload -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center">
                    <i class="fas fa-image text-orange-600 dark:text-orange-400"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">تصویر شاخص</h2>
            </div>

            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-camera ml-2 text-purple-600"></i>
                    تصویر اصلی مقاله
                </label>

                <div class="drag-area border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center transition-all duration-300" id="drag-area">
                    <div id="upload-content">
                        <div class="flex items-stretch space-x-2">
                            <input type="text" id="image_label" name="cover_image" dir="ltr"
                                   class="flex-1 px-4 py-2 rounded-l-md border border-gray-300 dark:border-gray-600
                  bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100
                  focus:outline-none focus:ring-2 focus:ring-purple-500 transition"
                                   placeholder="Image">

                            <button type="button" id="button-image"
                                    class="px-4 py-2 rounded-r-md border border-l-0 border-gray-300 dark:border-gray-600
                   bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100
                   hover:bg-gray-200 dark:hover:bg-gray-700
                   focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
                                Select
                            </button>
                        </div>
                    </div>

                    <div id="image-preview" class="hidden">
                        <img id="preview-img" class="image-preview mx-auto mb-4" alt="پیش‌نمایش تصویر">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4" id="file-info"></p>
                        <button type="button" onclick="removeImage()" class="px-4 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                            <i class="fas fa-trash ml-2"></i>
                            حذف تصویر
                        </button>
                    </div>
                </div>

                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-lightbulb ml-1"></i>
                    این تصویر در کارت مقاله و صفحه جزئیات نمایش داده می‌شود. برای تصاویر داخل متن از ویرایشگر استفاده کنید.
                </div>
            </div>
        </div>

        <!-- Tags -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center">
                    <i class="fas fa-hashtag text-indigo-600 dark:text-indigo-400"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">برچسب‌ها</h2>
            </div>

            <div class="form-group">
                <label for="tag-input" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    <i class="fas fa-tags ml-2 text-purple-600"></i>
                    افزودن برچسب
                </label>

                <div class="flex gap-2 mb-3">
                    <input type="text" name="tags"
                           class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                           placeholder="علمی , ریاضی ..."
                          >

                </div>

                <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-lightbulb ml-1"></i>
                    برچسب ها را با کاما (,) از هم جدا کنید
                </div>
            </div>
        </div>

        <!-- State -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cog text-purple-600 dark:text-purple-400"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">وضعیت انتشار</h2>
            </div>

            <select name="status" id="status" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                <option value="published">منتشر شده</option>
                <option value="draft">غیر فعال</option>

            </select>

        </div>
        <div class="bg-white mb-5 dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
        <!-- Action Buttons -->
        <div class="flex items-center justify-between gap-4 pt-6 ">


                <a href="{{route('admin.blogs.index')}}" class="px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition font-medium">
                    <i class="fas fa-times ml-2"></i>
                    انصراف
                </a>


            <div class="flex items-center gap-3">


                <button type="submit"  class="px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg hover:from-purple-700 hover:to-indigo-700 transition font-medium shadow-lg">
                    <i class="fas fa-paper-plane ml-2"></i>
                    انتشار مقاله
                </button>

            </div>

        </div>
        </div>
    </form>

</div>
</div>
@endsection
@push('scripts')
    <script src="https://cdn.tiny.cloud/1/{{env('TINYMC_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        // Initialize TinyMCE with Laravel File Manager
        tinymce.init({
            selector: '.tinymce-editor',
            height: 400,
            language: 'fa',
            directionality: 'rtl',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons'
            ],
            toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | link image media | table | emoticons | code fullscreen preview',
            content_style: 'body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; font-size: 14px; direction: rtl; text-align: right; }',

            // Laravel File Manager Integration
            file_picker_callback (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                tinymce.activeEditor.windowManager.openUrl({
                    url : '/file-manager/tinymce5',
                    title : 'Laravel File manager',
                    width : x * 0.8,
                    height : y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content, { text: message.text })
                    }
                })
            },

            // Additional settings
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            branding: false,
            menubar: false,
            statusbar: true,
            resize: true,

            // Image settings
            image_advtab: true,
            image_caption: true,
            image_title: true,

            // Table settings
            table_default_attributes: {
                'class': 'table table-bordered'
            },
            table_default_styles: {
                'border-collapse': 'collapse',
                'width': '100%'
            },

            // Setup callback
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });

        // Character counters
        function updateCounter(inputId, counterId, maxLength) {
            const input = document.getElementById(inputId);
            const counter = document.getElementById(counterId);

            input.addEventListener('input', function() {
                const currentLength = this.value.length;
                counter.textContent = `${currentLength}/${maxLength} کاراکتر`;
                counter.style.color = currentLength > maxLength * 0.9 ? '#ef4444' : '#6b7280';
            });
        }

        updateCounter('title', 'title-counter', 100);
        updateCounter('description', 'description-counter', 200);

        // Image upload functionality
        const dragArea = document.getElementById('drag-area');
        const imageInput = document.getElementById('image_label');
        const uploadContent = document.getElementById('upload-content');
        const imagePreview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        const fileInfo = document.getElementById('file-info');

        // Drag and drop events
        dragArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dragArea.classList.add('dragover');
        });

        dragArea.addEventListener('dragleave', () => {
            dragArea.classList.remove('dragover');
        });

        dragArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dragArea.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleImageUpload(files[0]);
            }
        });

        imageInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleImageUpload(e.target.files[0]);
            }
        });

        function handleImageUpload(file) {
            if (!file.type.startsWith('image/')) {
                alert('لطفاً فقط فایل تصویری انتخاب کنید.');
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                alert('حجم فایل نباید بیش از 5 مگابایت باشد.');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                fileInfo.textContent = `${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
                uploadContent.classList.add('hidden');
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        function removeImage() {
            imageInput.value = '';
            previewImg.src = '';
            fileInfo.textContent = '';
            uploadContent.classList.remove('hidden');
            imagePreview.classList.add('hidden');
        }


        // Status radio button styling
        document.querySelectorAll('input[name="status"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('label[for^="published"], label[for^="draft"], label[for^="pending"]').forEach(label => {
                    label.classList.remove('border-purple-500', 'bg-purple-50');
                    label.classList.add('border-gray-300');
                });

                if (this.checked) {
                    const label = document.querySelector(`label[for="${this.id}"]`);
                    label.classList.remove('border-gray-300');
                    label.classList.add('border-purple-500', 'bg-purple-50');
                }
            });
        });

        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            // Update TinyMCE content
            tinymce.triggerSave();

            // Validation
            const title = document.getElementById('title').value.trim();
            const category = document.querySelector('input[name="category"]:checked');
            const description = document.getElementById('description').value.trim();
            const content = tinymce.get('content').getContent();

            if (!title || !category || !description || !content.trim()) {
                e.preventDefault();
                alert('لطفاً تمام فیلدهای ضروری را تکمیل کنید.');
                return false;
            }

            if (title.length > 100) {
                e.preventDefault();
                alert('عنوان مقاله نباید بیش از ۱۰۰ کاراکتر باشد.');
                return false;
            }

            if (description.length > 200) {
                e.preventDefault();
                alert('توضیح کوتاه نباید بیش از ۲۰۰ کاراکتر باشد.');
                return false;
            }
        });

        // Set Laravel File Manager for TinyMCE
        window.SetUrl = function (url) {
            // This function will be called by Laravel File Manager
            // when a file is selected
            document.getElementById('image').value = url;
        };

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
    </script>
@endpush


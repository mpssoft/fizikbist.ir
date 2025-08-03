<!DOCTYPE html>
<html lang="fa" dir="rtl" x-data="{ sidebarOpen: false, dark: true ,toggleButton: false}" :class="{ 'dark': dark }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="/fontawesome-6.0.0-web/css/all.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        tailwind.config = {
            darkMode: 'class',
        };

    </script>


    <style>
        body {
            font-family: sans-serif, 'Vazirmatn';
        }
        body.sidebar-open {
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-white dark:bg-slate-900 text-black dark:text-white transition-colors duration-300" x-init="$watch('sidebarOpen', value => document.body.classList.toggle('sidebar-open', value))">
<div class="flex min-h-screen">
    <!-- Sidebar -->
@include('layouts.admin.sidebar')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navbar -->
        @include('layouts.admin.navbar')
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
@include('sweetalert::alert')
@yield('script')

@stack('scripts')
</body>
</html>


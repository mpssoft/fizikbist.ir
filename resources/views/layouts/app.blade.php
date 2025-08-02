<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <script src="https://cdn.tailwindcss.com"></script>
{{--        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">--}}
        <link href="./fontawesome-6.0.0-web/css/all.min.css" rel="stylesheet">
        <link href="/css/fizik_styles.css" rel="stylesheet">
        <!-- Scripts -->
        @yield('style')
    </head>
    <body class="main-bg min-h-screen font-sans antialiased" dir="rtl">
        <div class="min-h-screen ">
            @include('layouts.frontend.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset



            <!-- Page Content -->
            <main>
                @yield('content')
                {{ $slot ?? '' }}
            </main>

            @include("layouts.frontend.footer")
        </div>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="/js/jquery/jquery.min.js"> </script>
    <script src="/js/script.js" ></script>

        @stack('scripts')

    </body>
</html>
@include('sweetalert::alert')
@yield('script')


<!DOCTYPE html>
<html lang="fa" dir="rtl"
      x-data="{ dark: localStorage.getItem('dark')
          ? localStorage.getItem('dark') === 'true'
          : true , sidebarOpen: false ,toggleButton: false }"
      x-init="$watch('dark', value => localStorage.setItem('dark', value))"
      :class="{ 'dark': dark, 'transition-colors duration-300': true }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="/css/fizik_styles.css" rel="stylesheet">
    <link rel="stylesheet" href="/fontawesome-6.0.0-web/css/all.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        tailwind.config = {
            darkMode: 'class',
        };

    </script>


</head>
<body class="bg-white dark:bg-slate-900 text-black dark:text-white transition-colors duration-300" x-init="$watch('sidebarOpen', value => document.body.classList.toggle('sidebar-open', value))">
<div class="flex min-h-screen max-w-[2620px] mx-auto">
    <!-- Sidebar -->

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navbar -->
        @include('layouts.admin.navbar')
        <div class="flex h-full">
        @include('layouts.admin.sidebar')
        <div class="content w-full md:w-[80%] ">
            @yield('content')
        </div>
        </div>
    </div>
</div>
<script src="/js/jquery/jquery.min.js"> </script>
<script>
    function number_format(str) {

        // Ensure the value can be parsed as a float
        if (!isNaN(str) && str != "") {
            // Parse the value to a float and format it
            var floatValue = parseFloat(str);

            if (!isNaN(floatValue)) {
                var formattedValue = floatValue
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Add commas as thousand separators

                return (formattedValue); // return formatted value back
            }
        }
    }
    $(document).ready(function() {

        $(document).on('input','.format_number', function () {
            var $input = $(this);
            var value = $input.val().replace(/,/g, ""); // Remove existing commas

            // Allow typing of the decimal point
            if (value === ".") {
                return; // Do nothing if the user has only typed a decimal point
            }

            // Ensure the value is a valid number or can be parsed as one
            if (!isNaN(value) && value != "") {
                // Split the value into integer and decimal parts (if any)

                var parts = value.split('.');
                var integerPart = parts[0]; // The integer part before the decimal
                var decimalPart = parts[1]; // The decimal part after the point, if any

                // Add commas to the integer part
                var formattedInteger = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                // Recombine the integer part with the decimal part (if it exists)
                var formattedValue = decimalPart !== undefined ? formattedInteger + '.' + decimalPart : formattedInteger;

                $input.val( formattedValue); // Set formatted value back to input


        }
    });
    });
</script>
@include('sweetalert::alert')
@yield('script')

@stack('scripts')

</body>
</html>


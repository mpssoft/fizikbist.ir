<!DOCTYPE html>
<html lang="fa" dir="rtl"

      x-data="{  dark: localStorage.getItem('dark')
          ? localStorage.getItem('dark') === 'true'
          : true , sidebarOpen: false ,toggleButton: false ,cart: false }"
      x-init="$watch('dark', value => localStorage.setItem('dark', value))"
      :class="{ 'dark': dark, 'transition-colors duration-300': true }"
>
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
@include('layouts.user.sidebar')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navbar -->
        @include('layouts.user.navbar')
        <div class="content">
            @yield('content')
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

<script src="/js/modules/sweetalert2.js"></script>
<script>
    function fetchCart() {
        fetch("{{ route('shop.cart.items') }}")
            .then(res => res.text()) // 👈 since response is HTML
            .then(html => {
                document.getElementById('cartItems').innerHTML = html;
                $("#itemsCount").html($("#count").val());
            });
    }
    $(document).ready(function(){
        fetchCart();
    });

    function addToCart(model,id,cart) {
        let btn = document.getElementById('btn-' + id);
        let spinner = btn.querySelector('.spinner-' + id);

        spinner.classList.remove('hidden');


        url = "/cart/add/" + model + "/" + id;
        fetch(url, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },

        })
            .then(res => res.json())
            .then(data => {
                if(cart){
                    window.location.href = "/cart";
                }
                if (window.location.pathname === "/cart") {
                    window.location.reload();
                }
                if (data.success) {

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });

                    fetchCart();
                    $("#itemsCount").html(data.count).fadeOut('slow').fadeIn('slow');

                } else {

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: data.message ?? "Something went wrong!",
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            })
            .catch((data) => {

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: "Server error!" + data,
                    showConfirmButton: false,
                    timer: 3000
                });
            })
            .finally(() => spinner.classList.add('hidden'));
    }
    function removeItem(model,id)
    {

        Swal.fire({
            title: 'حذف !',
            text: 'آیا این آیتم از سبد خرید حذف شود؟',
            icon: 'warning',
            showCancelButton: true,

            confirmButtonText: 'بله، حذف کن',
            cancelButtonText: 'لغو'
        }).then((result) => {
            if (result.isConfirmed) {

                url = "/cart/remove/";
                $("#spin-"+id).removeClass('!hidden');

                fetch(url, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ _method: 'DELETE', type: model ,id : id})

                })
                    .then(res => res.json())
                    .then(data => {
                        if (window.location.pathname === "/cart") {
                            window.location.reload();
                        }
                        if (data.success) {

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });
                            fetchCart();
                            $("#itemsCount").html(data.count).fadeOut('slow').fadeIn('slow');
                        } else {

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: "Something went wrong!",
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    })
                    .catch((data) => {

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: "Server error!",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }).finally(()=>{
                    $("#spin-"+id).addClass('!hidden');
                });

            }
        });
    }

</script>
<script>
    document.querySelectorAll('[data-expire]').forEach(function (el) {
        let expireDate = new Date(el.getAttribute('data-expire')).getTime();

        let timer = setInterval(function () {
            let now = new Date().getTime();
            let distance = expireDate - now;

            if (distance < 0) {
                clearInterval(timer);
                el.innerHTML = "Expired";
                el.classList.remove("text-red-600");
                el.classList.add("text-gray-500");
                return;
            }

            let days    = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Pad single digits with leading zeros
            hours   = hours.toString().padStart(2, '0');
            minutes = minutes.toString().padStart(2, '0');
            seconds = seconds.toString().padStart(2, '0');

            el.innerHTML = ` ${days}d ${hours}h ${minutes}m ${seconds}s`;
            el.innerHTML = `
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-slate-200/30 to-slate-300/10 overflow-hidden w-[40px] dark:from-slate-400/30 dark:to-slate-500/10 backdrop-blur-sm border border-slate-300/20 dark:border-slate-400/20 px-3 py-2 rounded-lg  font-bold mb-1 shadow-lg">${seconds.toString().padStart(2, '0')}</div>
                        <div class="text-xs opacity-80">ثانیه</div>
                    </div>
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-slate-200/30 to-slate-300/10 dark:from-slate-400/30 dark:to-slate-500/10 backdrop-blur-sm border border-slate-300/20 dark:border-slate-400/20 px-3 py-2 rounded-lg  font-bold mb-1 shadow-lg">${minutes.toString().padStart(2, '0')}</div>
                        <div class="text-xs opacity-80">دقیقه</div>
                    </div>
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-slate-200/30 to-slate-300/10 dark:from-slate-400/30 dark:to-slate-500/10 backdrop-blur-sm border border-slate-300/20 dark:border-slate-400/20 px-3 py-2 rounded-lg  font-bold mb-1 shadow-lg">${hours.toString().padStart(2, '0')}</div>
                        <div class="text-xs opacity-80">ساعت</div>
                    </div>

                   <div class="text-center">
                        <div class="bg-gradient-to-br from-slate-200/30 to-slate-300/10 dark:from-slate-400/30 dark:to-slate-500/10 backdrop-blur-sm border border-slate-300/20 dark:border-slate-400/20 px-3 py-2 rounded-lg  font-bold mb-1 shadow-lg">${days.toString().padStart(2, '0')}</div>
                        <div class="text-xs opacity-80">روز</div>
                    </div>
                `;
        }, 1000);
    });


</script>

</body>
</html>


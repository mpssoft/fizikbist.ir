@extends("layouts.app")

@section("content")
<section id="loginSection" class="section">
    <div class="min-h-screen flex items-center justify-center px-4 py-16 gradient-bg hero-pattern">
        <div class="max-w-md w-full">
            <div class="auth-container rounded-3xl shadow-2xl p-8 neon-glow">
                <div class="text-center mb-8">
                    <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-atom text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-2">ورود به سیستم</h2>
                    <p class="text-gray-300">به دنیای فیزیک خوش آمدید</p>
                </div>

                <!-- Login Form -->
                <div id="loginForm">
                    <form  class="space-y-6"  method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">
                                <i class="fas fa-user mr-2"></i>نام کاربری
                            </label>
                            <input type="text" id="loginUsername"  value="{{old('email')}}" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="نام کاربری خود را وارد کنید" required="">
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">
                                <i class="fas fa-lock mr-2"></i>رمز عبور
                            </label>
                            <input type="password" id="loginPassword" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="رمز عبور خود را وارد کنید" required="">
                        </div>

                        <button type="submit" class="w-full btn-primary text-white py-3 rounded-xl font-semibold text-lg">
                            <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Log in') }}
                        </button>
                        <div class="flex items-center justify-end mt-4 ">

                            @if (Route::has('password.request'))
                                <a class=" text-sm text-gray-300 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                    <div class="text-right mt-6">
                        <p class="text-gray-300">
                            حساب کاربری ندارید؟
                            <button onclick="showRegister()" class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors">ثبت نام کنید</button>
                        </p>
                    </div>
                </div>

                <!-- Register Form -->
                <div id="registerForm" class="hidden">
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-bold text-white mb-2">ثبت نام</h2>
                        <p class="text-gray-300">حساب کاربری جدید بسازید</p>
                    </div>
                    <form onsubmit="handleRegister(event)" class="space-y-4">
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">
                                <i class="fas fa-id-card mr-2"></i>نام و نام خانوادگی
                            </label>
                            <input type="text" id="registerName" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="نام کامل خود را وارد کنید" required="">
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">
                                <i class="fas fa-user mr-2"></i>نام کاربری
                            </label>
                            <input type="text" id="registerUsername" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="نام کاربری دلخواه" required="">
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">
                                <i class="fas fa-lock mr-2"></i>رمز عبور
                            </label>
                            <input type="password" id="registerPassword" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="رمز عبور قوی انتخاب کنید" required="">
                        </div>
                        <div>
                            <label class="block text-gray-300 text-sm font-medium mb-2">
                                <i class="fas fa-phone mr-2"></i>شماره تماس
                            </label>
                            <input type="tel" id="registerPhone" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all" placeholder="09123456789" required="">
                        </div>
                        <button type="submit" class="w-full btn-success text-white py-3 rounded-xl font-semibold text-lg">
                            <i class="fas fa-user-plus mr-2"></i>ثبت نام
                        </button>
                    </form>
                    <div class="text-center mt-6">
                        <p class="text-gray-300">
                            قبلاً ثبت نام کرده‌اید؟
                            <button onclick="showLogin()" class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors">وارد شوید</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script type="module">
        $.ajaxSetup({
            headers :{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','.delete-action',function (e){
            e.preventDefault();

            let id = $(this).attr('id');
            let url = $(this).attr('href');
            Swal.fire({
                title : 'حذف',
                text : 'آیا مطمئن هستید؟',
                icon: 'warning',
                cancelButtonText  :'لغو',
                confirmButtonText: 'حذف',
                confirmButtonColor:'red',
                cancelButtonColor :'blue',
                showCancelButton:true
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        url : url,
                        method : 'DELETE',
                        success : function(response) {
                            Swal.fire({
                                text : response.data.message,
                                showConfirmButton:false,
                                color:'#fff',
                                background: '#28a745',
                                icon:'success',
                                toast:true,
                                timer:1000
                            });
                            $(`tr[data='${id}']`).remove();
                        },
                        error: function(response){

                        }
                    });
                }
            });
        });

    </script>
@endpush
@endsection
@section('script')
    {{ $script ?? '' }}
@endsection
@section('head')
    {{ $head ?? '' }}
@endsection

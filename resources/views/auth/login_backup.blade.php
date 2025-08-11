@extends("layouts.app")

@section("content")
    <section id="loginSection" class="section">
        <div class="min-h-screen flex items-center justify-center px-4 py-16 gradient-bg hero-pattern">
            <div class="max-w-md w-full">
                <div class="auth-container rounded-3xl shadow-2xl p-8 neon-glow">
                    <div class="text-center mb-8">
                        <div
                            class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-atom text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-2">ورود به سیستم</h2>
                        <p class="text-gray-300">به دنیای فیزیک خوش آمدید</p>
                    </div>

                    <!-- Login Form -->
                    <div  id="loginForm">
                        @include("layouts.errors")
                        <form class="space-y-6" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <label class="block text-gray-300 text-sm font-medium mb-2">
                                    <i class="fas fa-user mr-2"></i> نام کاربری (ایمیل)
                                </label>
                                <input type="text" id="loginUsername" name="email" value="{{old('email')}}"
                                       class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all"
                                       placeholder="نام کاربری خود را وارد کنید">
                            </div>
                            <div>
                                <label class="block text-gray-300 text-sm font-medium mb-2">
                                    <i class="fas fa-user mr-2"></i> نام کاربری (ایمیل)
                                </label>
                                <input type="text" name="login"
                                       class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all"
                                       placeholder="Email or Mobile" required autofocus>
                            </div>
                            <div>
                                <label class="block text-gray-300 text-sm font-medium mb-2">
                                    <i class="fas fa-lock mr-2"></i>رمز عبور
                                </label>
                                <input type="password" id="loginPassword" name="password"
                                       class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none input-glow transition-all"
                                       placeholder="رمز عبور خود را وارد کنید" required="">
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="remember" name="remember" type="checkbox" class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember" class="block text-gray-300 text-sm font-medium mb-2">
                                    {{__('Remember me')}}
                                </label>
                            </div>

                            <button type="submit"
                                    class="w-full btn-primary text-white py-3 rounded-xl font-semibold text-lg">
                                <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Log in') }}
                            </button>
                            <div class="flex items-center justify-end mt-4 ">

                                @if (Route::has('password.request'))
                                    <a class=" text-sm text-gray-300 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                       href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                        <div class="text-right mt-6">
                            <p class="text-gray-300">
                                حساب کاربری ندارید؟
                                <a href="{{route('register')}}"
                                        class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors">ثبت نام
                                    کنید
                                </a>
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.delete-action', function (e) {
                e.preventDefault();

                let id = $(this).attr('id');
                let url = $(this).attr('href');
                Swal.fire({
                    title: 'حذف',
                    text: 'آیا مطمئن هستید؟',
                    icon: 'warning',
                    cancelButtonText: 'لغو',
                    confirmButtonText: 'حذف',
                    confirmButtonColor: 'red',
                    cancelButtonColor: 'blue',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            success: function (response) {
                                Swal.fire({
                                    text: response.data.message,
                                    showConfirmButton: false,
                                    color: '#fff',
                                    background: '#28a745',
                                    icon: 'success',
                                    toast: true,
                                    timer: 1000
                                });
                                $(`tr[data='${id}']`).remove();
                            },
                            error: function (response) {

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

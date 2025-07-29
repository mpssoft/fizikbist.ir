@extends("layouts.app")

@section("content")
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">معرفی استاد</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        استاد حسین نژاداسد با بیش از ۱۰ سال تجربه در تدریس فیزیک و تخصص در روش‌های نوین آموزش،
                        آماده است تا شما را در مسیر تسلط بر فیزیک و کسب نتایج عالی در کنکور همراهی کند.
                    </p>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 ml-3"></i>
                            <span>کارشناسی ارشد فیزیک</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 ml-3"></i>
                            <span>بیش از ۱۰ سال تجربه تدریس</span>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="w-64 h-64 mx-auto bg-gradient-to-br from-purple-400 to-blue-500 rounded-full flex items-center justify-center text-white text-6xl">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="text-xl font-semibold mt-4 text-gray-800">استاد حسین نژاداسد</h3>
                    <p class="text-gray-600">دبیر فیزیک</p>
                </div>
            </div>
        </div>
    </div>
@endsection

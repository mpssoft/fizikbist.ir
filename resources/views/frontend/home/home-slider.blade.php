@once
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                new Swiper(".swiper-container", {
                    loop: true,
                    effect: 'fade',
                    autoplay: {
                        delay: 5000,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                });
            });
        </script>
    @endpush

@endonce

@if($sliders->count())
    <div class="relative w-full overflow-hidden">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="w-full h-[70vh] md:h-[85vh] bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ $slider->image }}');">
                            <div class="bg-black/50 p-6 rounded-xl text-center max-w-xl mx-auto text-white">
                                <h2 class="text-2xl md:text-4xl font-bold mb-3">{{ $slider->title }}</h2>
                                <p class="mb-4">{{ $slider->description }}</p>
                                @if($slider->link)
                                    <a href="{{ $slider->link }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                                        اطلاعات بیشتر
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Navigation buttons -->
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-pagination !bottom-4"></div>
        </div>
    </div>
@endif


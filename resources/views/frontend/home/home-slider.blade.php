@once
    @push('styles')
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    @push('scripts')
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const swiper = new Swiper(".mySwiper", {
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
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

<div class="w-full max-w-7xl mx-auto px-4 py-6">
    <div class="swiper mySwiper rounded-xl overflow-hidden shadow-xl">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide relative group">
                    <img src="{{ asset('storage/' . $slider->image) }}"
                         alt="{{ $slider->title }}"
                         class="w-full h-72 md:h-96 object-cover" />

                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition duration-300 flex flex-col items-start justify-end p-6 text-white">
                        <h2 class="text-2xl md:text-3xl font-bold mb-1">{{ $slider->title }}</h2>
                        <p class="text-sm md:text-base">{{ $slider->subtitle }}</p>

                        @if($slider->link)
                            <a href="{{ $slider->link }}"
                               class="mt-4 inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-xl text-sm md:text-base transition">
                                مشاهده بیشتر
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation -->
        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

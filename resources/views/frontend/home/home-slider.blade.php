@once
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
        <style>
            /* Custom gradient overlays */
            .gradient-overlay {
                background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.7) 100%);
            }

            /* Enhanced navigation buttons */
            .swiper-button-next,
            .swiper-button-prev {
                width: 50px !important;
                height: 50px !important;
                background: rgba(255, 255, 255, 0.1) !important;
                backdrop-filter: blur(10px) !important;
                border-radius: 50% !important;
                border: 2px solid rgba(255, 255, 255, 0.2) !important;
                transition: all 0.3s ease !important;
            }

            .swiper-button-next:hover,
            .swiper-button-prev:hover {
                background: rgba(255, 255, 255, 0.2) !important;
                transform: scale(1.1) !important;
                border-color: rgba(255, 255, 255, 0.4) !important;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                font-size: 18px !important;
                font-weight: bold !important;
                color: white !important;
            }

            /* Enhanced pagination */
            .swiper-pagination-bullet {
                width: 12px !important;
                height: 12px !important;
                background: rgba(255, 255, 255, 0.4) !important;
                border: 2px solid rgba(255, 255, 255, 0.6) !important;
                opacity: 1 !important;
                transition: all 0.3s ease !important;
            }

            .swiper-pagination-bullet-active {
                background: #f97316 !important;
                border-color: #f97316 !important;
                transform: scale(1.2) !important;
                box-shadow: 0 0 20px rgba(249, 115, 22, 0.6) !important;
            }

            /* Content animations */
            .slide-content {
                animation: slideUp 0.8s ease-out;
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Enhanced button styling */
            .cta-button {
                background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
                box-shadow: 0 8px 25px rgba(249, 115, 22, 0.3);
                transition: all 0.3s ease;
            }

            .cta-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 35px rgba(249, 115, 22, 0.4);
                background: linear-gradient(135deg, #ea580c 0%, #dc2626 100%);
            }

            /* Parallax effect */
            .parallax-bg {
                transition: transform 0.1s ease-out;
            }

            /* Glass morphism effect */
            .glass-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            }

            /* Floating animation for decorative elements */
            .floating {
                animation: floating 3s ease-in-out infinite;
            }

            @keyframes floating {
                0%, 100% {
                    transform: translateY(0px);
                }
                50% {
                    transform: translateY(-10px);
                }
            }

            /* Progress bar */
            .progress-bar {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 4px;
                background: linear-gradient(90deg, #f97316, #ea580c);
                animation: progress 5s linear infinite;
            }

            @keyframes progress {
                0% {
                    width: 0%;
                }
                100% {
                    width: 100%;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const swiper = new Swiper(".swiper-container", {
                    loop: true,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    speed: 1000,
                    parallax: true,
                    on: {
                        slideChange: function () {
                            // Reset progress bar animation
                            const progressBars = document.querySelectorAll('.progress-bar');
                            progressBars.forEach(bar => {
                                bar.style.animation = 'none';
                                setTimeout(() => {
                                    bar.style.animation = 'progress 5s linear infinite';
                                }, 10);
                            });
                        }
                    }
                });

                // Add parallax effect on mouse move
                document.addEventListener('mousemove', (e) => {
                    const slides = document.querySelectorAll('.parallax-bg');
                    const x = e.clientX / window.innerWidth;
                    const y = e.clientY / window.innerHeight;

                    slides.forEach(slide => {
                        const moveX = (x - 0.5) * 20;
                        const moveY = (y - 0.5) * 20;
                        slide.style.transform = `translate(${moveX}px, ${moveY}px) scale(1.05)`;
                    });
                });
            });
        </script>
        <script>(function () {
                function c() {
                    var b = a.contentDocument || a.contentWindow.document;
                    if (b) {
                        var d = b.createElement('script');
                        d.innerHTML = "window.__CF$cv$params={r:'96bff57ae1514434',t:'MTc1NDY2NjAxOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                        b.getElementsByTagName('head')[0].appendChild(d)
                    }
                }

                if (document.body) {
                    var a = document.createElement('iframe');
                    a.height = 1;
                    a.width = 1;
                    a.style.position = 'absolute';
                    a.style.top = 0;
                    a.style.left = 0;
                    a.style.border = 'none';
                    a.style.visibility = 'hidden';
                    document.body.appendChild(a);
                    if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else {
                        var e = document.onreadystatechange || function () {
                        };
                        document.onreadystatechange = function (b) {
                            e(b);
                            'loading' !== document.readyState && (document.onreadystatechange = e, c())
                        }
                    }
                }
            })();</script>
    @endpush

@endonce
<div class="relative w-full overflow-hidden">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            @foreach($sliders as $slider)
                <div class="swiper-slide">
                    <div class="relative w-full h-[70vh] md:h-[85vh] bg-cover bg-center parallax-bg"
                         style="background-image: url('{{ $slider->image }}');">
                        <div class="absolute inset-0 gradient-overlay"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="glass-card p-8 md:p-12 rounded-2xl text-center max-w-2xl mx-4 text-white slide-content">
                                <!-- Decorative floating elements -->
                                <div
                                    class="absolute -top-4 -right-4 w-8 h-8 bg-orange-500 rounded-full floating opacity-60"></div>
                                <div
                                    class="absolute -bottom-2 -left-2 w-6 h-6 bg-blue-500 rounded-full floating opacity-40"
                                    style="animation-delay: 1s;"></div>

                                <h2 class="text-3xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-white to-gray-300 bg-clip-text ">
                                    {{$slider->title}}
                                </h2>
                                <p class="text-lg md:text-xl mb-8 text-gray-200 leading-relaxed">
                                    {{ $slider->subtitle }}
                                </p>
                                @if($slider->link)
                                    <a href="#"
                                       class="inline-block cta-button text-white font-semibold py-4 px-8 rounded-full transition duration-300 text-lg">
                                        اطلاعات بیشتر
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="progress-bar"></div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Enhanced Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Enhanced Pagination -->
        <div class="swiper-pagination !bottom-8"></div>
    </div>
</div>


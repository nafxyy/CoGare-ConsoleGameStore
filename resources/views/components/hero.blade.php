{{-- Hero --}}
<div class="w-full flex flex-col z-0 px-4 pt-[12%]">
    <div class="h-[400px] max-w-[full] relative overflow-hidden">
        <div class="slideshow-container">
            <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS5"
                class="absolute w-full h-full object-cover brightness-50 rounded-lg fade">
            <img src="{{ asset('assets/images/ps4_banner.png') }}" alt="PS4"
                class="absolute w-full h-full object-cover brightness-50 rounded-lg fade">
            <img src="{{ asset('assets/images/game_banner.png') }}" alt="Games"
                class="absolute w-full h-full object-cover brightness-50 rounded-lg fade">

            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>

    {{-- Div 4 Produk --}}
    <div class="flex justify-center items-center text-white h-[450px] relative">
        <p class="absolute top-0 left-0 p-8 font-bold text-black text-3xl">New Arrival</p>
        <div class="flex space-x-8 pt-0">
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
        </div>
    </div>

    {{-- Another Set of Div 4 Produk --}}
    <div class="flex justify-center items-center text-white h-[150px] mb-40 relative mt-4">
        <div class="flex space-x-8 pt-0">
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
            <div class="bg-slate-900 p-6 rounded-md text-center">
                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                <p class="font-bold">PS 4</p>
            </div>
        </div>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("fade");
            var dots = document.getElementsByClassName("dot");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;

            if (slideIndex > slides.length) {
                slideIndex = 1;
            }

            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";

            setTimeout(showSlides, 2000); // Change slide every 3 seconds
        }
    </script>
</div>


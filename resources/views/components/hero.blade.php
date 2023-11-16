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

    {{-- New Arrival Produk --}}
    <div class="w-full flex flex-col z-0 px-4 pt-[5%]">
        <h1 class="text-3xl font-bold text-left mb-8">New Arrival</h1>
        {{-- container 1 --}}
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-12">
            @foreach ($console as $csl)
                <div class="bg-slate-900 p-4 rounded-lg shadow-lg text-center text-white">
                    <img src="{{ asset('assets/images/console/' . $csl->gambar) }}" alt="Console Games" class="w-full h-auto">
                    <h1 class="text-xl font-semibold mt-4">{{ $csl->nama }}</h1>
                    <p class="show4 mt-2">{{ $csl->nama }}</p>
                </div>
            @endforeach

        </div>
        {{-- <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-12">
            @foreach ($gamepad as $gp)
                <div class="bg-slate-900 p-4 rounded-lg shadow-lg text-center text-white">
                    <img src="{{ asset('assets/images/console/' . $gp->gambar) }}" alt="Console Games" class="w-full h-auto">
                    <h1 class="text-xl font-semibold mt-4">{{ $gp->nama }}</h1>
                </div>
            @endforeach

        </div> --}}
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


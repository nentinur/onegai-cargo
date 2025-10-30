@extends('layout')
@section('content')
    <div id="home"
        class="flex flex-col-reverse md:flex-row w-full items-center justify-between px-4 md:px-10 md:min-h-screen bg-gradient-to-t from-blue-100 to-white py-10 md:py-20 gap-8">
        <div class="w-full md:w-1/2">
            <h1 class="text-3xl md:text-5xl font-bold text-primary-dark transition hover:scale-105 duration-300">
                Onegai Indonesia Cargo
            </h1>
            <p class="mt-6 text-base md:text-lg font-bold text-primary-dark">
                Layanan pengiriman barang Indonesia - Jepang, aman dan terpercaya 📦🗾
            </p>
            <p class="mt-4 text-gray-600 max-w-3xl">
                Onegai Cargo adalah solusi termurah
                dan tercepat untuk memenuhi kerinduan akan barang atau makanan dari tanah air. Aman, cepat, dan tanpa
                ribet — barang Anda sampai tujuan dengan senyum.
            </p>
            <p class="mt-4 text-gray-600">
                Yuk, kirim sekarang! Klik tombol di bawah untuk mulai pemesanan.
            </p>
            {{-- <a href="/order"
                class="mt-10 inline-block bg-primary hover:bg-primary-dark text-white px-6 md:px-8 py-3 rounded-lg transition transform hover:scale-105">
                Pesan Sekarang
            </a> --}}
        </div>
        <div class="w-full md:w-1/2 flex justify-center">
            <img src="{{ asset('assets/gif/delivery.gif') }}" alt="" class="w-48 md:w-80 rounded-full">
        </div>
    </div>
{{-- Ulasan --}}


    {{-- Carousel Image --}}
<div id="indicators-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="{{ asset('assets/carousel/1.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('assets/carousel/1.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


    {{-- Tentang Kami Section --}}
    <div id="about"
        class="flex flex-col w-full px-4 md:px-10 min-h-screen bg-gradient-to-b from-blue-100 to-white py-10 md:py-20">
        <div class="flex flex-col md:flex-row items-center justify-between max-w-7xl mx-auto gap-8">
            <div class="w-full md:w-1/2 flex justify-center mb-6 md:mb-0">
                <img src="{{ asset('assets/gif/customer.gif') }}" alt="" class="w-48 md:w-80 rounded-full">
            </div>
            <div class="w-full md:w-1/2">
                <h2
                    class="text-2xl text-center md:text-start md:text-4xl font-bold text-blue-600 transition hover:scale-105 duration-300">
                    Tentang kami</h2>
                <p class="mt-4 text-gray-800 max-w-3xl">
                    Onegai Cargo hadir untuk membantu WNI di Jepang mendapatkan barang dan makanan dari Indonesia tanpa
                    harus
                    khawatir ongkos mahal atau proses rumit.
                    Dengan pengalaman mengirimkan berbagai jenis paket — dari kebutuhan sehari-hari, makanan khas, hingga
                    barang
                    pribadi — kami berkomitmen memberikan pelayanan yang ramah, profesional, dan tepat waktu.
                </p>
            </div>
        </div>
        <h2 class="text-2xl mt-10 md:mt-16 font-bold text-blue-500 text-center transition hover:scale-105 duration-300">
            Kenapa memilih kami?</h2>
        <div class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="bg-white flex flex-col justify-center items-center shadow-lg p-6 rounded-lg transform hover:scale-105 transition">
                <div class="w-12"><img src="{{ asset('assets/icon/save-money-yen-svgrepo-com.svg') }}" alt="">
                </div>
                <h3 class="text-lg md:text-xl font-semibold mt-2 text-blue-400">Harga Ekonomis</h3>
                <p class="mt-1 text-sm text-gray-900 text-center">
                    Ongkir mulai ¥1000/KG — solusi paling murah di Jepang raya.
                </p>
            </div>
            <div
                class="bg-white flex flex-col justify-center items-center shadow-lg p-6 rounded-lg transform hover:scale-105 transition">
                <div class="w-12"><img src="{{ asset('assets/icon/delivery-in-hand-svgrepo-com.svg') }}" alt="">
                </div>
                <h3 class="text-lg md:text-xl font-semibold mt-2 text-blue-400">Layanan Door to Door</h3>
                <p class="mt-1 text-sm text-gray-600 text-center">
                    Dari pengambilan hingga pengantaran, semuanya diurus.
                </p>
            </div>
            <div
                class="bg-white flex flex-col justify-center items-center shadow-lg p-6 rounded-lg transform hover:scale-105 transition">
                <div class="w-12"><img src="{{ asset('assets/icon/delivery-date-svgrepo-com.svg') }}" alt="">
                </div>
                <h3 class="text-lg md:text-xl font-semibold mt-2 text-blue-400">Pengiriman setiap hari</h3>
                <p class="mt-1 text-sm text-gray-600 text-center">
                    Barang kamu segera bergerak, tanpa jeda.
                </p>
            </div>
        </div>
    </div>

    <div class="relative w-full h-96">
    <iframe class="absolute top-0 left-0 w-full h-full"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.2188040565408!2d107.743246!3d-6.9055219999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68dda44ce380c5%3A0x9250a657cfafdc00!2sOnegai%20Cargo!5e0!3m2!1sid!2sid!4v1761571777212!5m2!1sid!2sid"
        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
</div>
    {{-- Kontak Section --}}
    <div id="contact" class="w-full px-4 md:px-10 bg-gradient-to-t from-orange-100 to-white py-10">
        <h2
            class="text-2xl md:text-4xl my-10 md:mt-16 font-bold text-center text-primary-dark transition hover:scale-105 duration-300">
            Kontak kami</h2>
        <div class="flex flex-col md:flex-row px-2 md:px-12 gap-8 md:gap-4 items-center w-full">
            <div class="w-full md:w-1/6 md:px-3 flex justify-center md:justify-between">
                <img src="{{ asset('assets/logo/OIC_BROWN.png') }}" class="w-24 md:w-34" alt="">
            </div>
            <div class="w-full md:w-5/6 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                <div>
                    <h2 class="pl-2 text-lg md:text-xl font-bold text-primary-dark">Alamat</h2>
                    <a class="flex items-start mt-2 text-primary-dark" href="https://maps.app.goo.gl/6TEAKiLTNy6nu9L98"><i
                            class="ph ph-map-pin px-2 mt-2 text-xl"></i><span>Komplek Bumi Langgeng, Blok 19, No.5, RT 04/RW
                            22, Kel. Cimekar, Kec.
                            Cileunyi, Kab. Bandung, 40624</span></a>
                </div>
                <div>
                    <h2 class=" pl-2 text-lg md:text-xl font-bold text-primary-dark">Kontak WhatsApp</h2>
                    <ul class="mt-2 space-y-1.5">
                        <li class="text-primary-dark">
                            <a class="flex items-center"
                                href="https://api.whatsapp.com/send?phone=6282119777677&text=Hallo%20onegai%20cargo%2C%20boleh%20info%20jastip%20indo%20-%20jepang%20nya%3F">
                                <i class="ph ph-whatsapp-logo px-2 text-xl"></i>
                                <span>Admin Onegai 1</span></a>
                        </li>
                        <li class="text-primary-dark">
                            <a class="flex items-center"
                                href="https://api.whatsapp.com/send?phone=6285159952797&text=Hallo%20onegai%20cargo%2C%20boleh%20info%20jastip%20indo%20-%20jepang%20nya%3F">
                                <i class="ph ph-whatsapp-logo px-2 text-xl"></i>
                                <span>Admin Onegai 2</span></a>
                        </li>
                        <li class="text-primary-dark">
                            <a class="flex items-center"
                                href="https://api.whatsapp.com/send?phone=6287823004246&text=Hallo%20onegai%20cargo%2C%20boleh%20info%20jastip%20jepang%20-%20indo%20nya%3F">
                                <i class="ph ph-whatsapp-logo px-2 text-xl"></i>
                                <span>Admin Cargo Japan-Indo</span></a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="pl-2 text-lg md:text-xl font-bold text-primary-dark">Media Sosial</h2>
                    <ul class="mt-2 space-y-1.5">
                        <li class="text-primary-dark">
                            <a class="flex items-center" href="mailto:onegaicargo@gmail.com"><i
                                    class="ph ph-envelope px-2 text-xl"></i><span>onegaicargo@gmail.com</span></a>
                        </li>
                        <li class="text-primary-dark">
                            <a class="flex items-center" href="https://www.instagram.com/onegai.cargo/"><i
                                    class="ph ph-instagram-logo px-2 text-xl"></i><span>onegai.cargo</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-4 w-full">
            <p class="text-center text-primary-dark text-xs md:text-base">Copyright &copy; Onegai Indonesia Cargo 2025. All
                rights reserved</p>
        </div>
    </div>

    
@endsection

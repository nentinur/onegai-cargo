<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Onegai Indonesia Cargo</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/bold/style.css" />
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-white">
    <div class="w-full fixed top-0 left-0 md:h-18 z-10 flex items-center justify-between px-6 bg-white shadow-md">
        <div><img src="{{ asset('assets/logo/OIC_BROWN.png') }}" class="w-12" alt=""></div>
        <!-- Mobile menu button -->
        <div class="md:hidden">
            <button id="menu-btn" class="text-primary-dark focus:outline-none">
                <i class="ph ph-list text-3xl"></i>
            </button>
        </div>
        <!-- Navbar -->
        <nav id="nav-menu" class="hidden md:flex space-x-4 items-center">
            <a href="/" class="font-bold text-primary-dark hover:text-dark-primary">Beranda</a>
            <a href="#about" class="font-bold text-primary-dark hover:text-dark-primary">Tentang Kami</a>
            <a href="#contact" class="font-bold text-primary-dark hover:text-dark-primary">Kontak</a>
            <a href="/tracking" class="font-bold text-primary-dark hover:text-dark-primary">Tracking</a>
            <a href="/order"
                class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg transition transform hover:scale-105">
                Pesan Layanan
            </a>
        </nav>
    </div>
    <!-- Mobile menu dropdown -->
    <div id="mobile-menu" class="md:hidden fixed top-16 left-0 w-full bg-white shadow-lg z-20 hidden">
        <nav class="flex flex-col space-y-2 px-6 py-4">
            <a href="/" class="font-bold text-primary-dark hover:text-dark-primary">Beranda</a>
            <a href="#about" class="font-bold text-primary-dark hover:text-dark-primary">Tentang Kami</a>
            <a href="#contact" class="font-bold text-primary-dark hover:text-dark-primary">Kontak</a>
            <a href="/tracking" class="font-bold text-primary-dark hover:text-dark-primary">Tracking</a>
            <a href="/order"
                class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg transition transform hover:scale-105">
                Pesan Layanan
            </a>
        </nav>
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen w-full pt-24">
        @yield('content')
    </div>

    <script>
        // Toggle mobile menu
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn?.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        // Hide menu on link click
        mobileMenu?.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>
</body>

</html>

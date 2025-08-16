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
</head>

<body class="bg-white">
    <div class="w-full fixed top-0 left-0 h-18 z-10 flex items-center justify-between px-6 bg-white shadow-md">
        <div><img src="{{ asset('assets/logo/OIC_BROWN (TR).png') }}" class="w-12" alt=""></div>
        <nav class="space-x-4">
            <a href="/" class="font-bold text-primary-dark hover:text-dark-primary">Beranda</a>
            <a href="/about" class="font-bold text-primary-dark hover:text-dark-primary">Tentang Kami</a>
            <a href="/services" class="font-bold text-primary-dark hover:text-dark-primary">Layanan</a>
            <a href="/contact" class="font-bold text-primary-dark hover:text-dark-primary">Kontak</a>
            <a href="/order"
                class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg transition transform hover:scale-105">
                Pesan Layanan
            </a>
        </nav>

    </div>

    <div class="flex flex-col items-center justify-center min-h-screen w-full">
        @yield('content')
    </div>
</body>

</html>

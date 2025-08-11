<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Onegai Indonesia Cargo</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white">
    <div class="w-full fixed top-0 left-0 h-18 z-10 flex items-center justify-between px-6 bg-white shadow-md">
        <div><img src="{{ asset('assets/OIC_BROWN (TR).png') }}" class="w-12" alt=""></div>
        <nav class="space-x-4">
            <a href="/" class="text-primary-dark hover:text-dark-primary">Beranda</a>
            <a href="/about" class="text-primary-dark hover:text-dark-primary">Tentang Kami</a>
            <a href="/services" class="text-primary-dark hover:text-dark-primary">Layanan</a>
            <a href="/contact" class="text-primary-dark hover:text-dark-primary">Kontak</a>
        </nav>

    </div>

    <div class="flex flex-col items-center justify-center min-h-screen w-full">
        @yield('content')
    </div>
</body>

</html>

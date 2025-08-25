<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Onegai Indonesia Cargo</title>
    {{-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap');
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#D19C66',
                        'primary-dark': '#6C5232',
                        'primary-light': '#FBC97A',
                    },
                    fontFamily: {
                        sans: ['Quicksand', 'Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script> --}}

    @vite('resources/css/app.css')


    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/bold/style.css" />
</head>

<body class="bg-white">
    <div class="w-full fixed top-0 left-0 h-18 z-10 flex items-center justify-between px-6 bg-white shadow-md">
        <div><img src="{{ asset('assets/logo/OIC_BROWN.png') }}" class="w-12" alt=""></div>
        <nav class="space-x-4">
            <a href="/" class="font-bold text-primary-dark hover:text-dark-primary">Beranda</a>
            <a href="/about" class="font-bold text-primary-dark hover:text-dark-primary">Tentang Kami</a>
            <a href="/services" class="font-bold text-primary-dark hover:text-dark-primary">Layanan</a>
            <a href="/contact" class="font-bold text-primary-dark hover:text-dark-primary">Kontak</a>
            <a href="/tracking" class="font-bold text-primary-dark hover:text-dark-primary">Tracking</a>
            <a href="/login" class="font-bold text-primary-dark hover:text-dark-primary">Login</a>
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

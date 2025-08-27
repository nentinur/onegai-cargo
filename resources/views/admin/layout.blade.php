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
    <div class="w-64 fixed top-0 left-0 h-full z-10 px-6 bg-white shadow-md">
        <div class="flex flex-col items-center p-5 justify-start"><img src="{{ asset('assets/logo/OIC_BROWN.png') }}"
                class="w-16" alt=""></div>

        <div class="p-5">
            <ul class="space-y-2">
                <li>
                    <a href="/" class="font-bold text-primary-dark hover:text-dark-primary">Menu</a>
                </li>
                <li>
                    <a href="/" class="font-bold text-primary-dark hover:text-dark-primary">Menu</a>
                </li>
                <li>
                    <a href="/" class="font-bold text-primary-dark hover:text-dark-primary">Menu</a>
                </li>
                <li>
                    <a href="/" class="font-bold text-primary-dark hover:text-dark-primary">Menu</a>
                </li>
                <li>
                    <div class="space-x-4 mt-5">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg transition transform hover:scale-105"
                                type="submit">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen w-full bg-orange-50">
        @yield('content')
    </div>
</body>

</html>

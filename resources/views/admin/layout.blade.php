<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Onegai Indonesia Cargo</title>
    @vite('resources/css/app.css')

    <!-- DataTables core -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/bold/style.css" />
</head>

<body class="bg-white">
    <div class="w-64 fixed top-0 left-0 h-full z-10 px-6 bg-white shadow-md flex flex-col justify-between">
        <div>
            <div class="pt-10 pl-10"><img src="{{ asset('assets/logo/OIC_BROWN.png') }}" class="w-20" alt="">
            </div>
            <div class="p-5">
                <ul class="space-y-2">
                    <li>
                        <a href="/admin"
                            class="{{ request()->is('admin*') ? 'text-primary-dark font-bold' : 'text-primary hover:text-primary' }} flex items-center"><i
                                class="ph ph-presentation-chart px-2 text-xl"></i>Beranda</a>
                    </li>
                    <li>
                        <a href="/list-order"
                            class="{{ request()->is('list-order*') ? 'text-primary-dark font-bold' : 'text-primary hover:text-primary' }} flex items-center"><i
                                class="ph ph-package px-2 text-xl"></i>Pesanan</a>
                    </li>
                    <li>
                        <a href="/user"
                            class="{{ request()->is('user*') ? 'text-primary-dark font-bold' : 'text-primary hover:text-primary' }} flex items-center"><i
                                class="ph ph-user-circle px-2 text-xl"></i>User</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-5 pb-8">
            <div class="pb-2">
                <div class="flex items-center space-x-3 bg-orange-50 rounded-lg p-3 mt-2">
                    <div class="bg-primary/20 rounded-full p-2">
                        <i class="ph ph-user text-2xl text-primary-dark"></i>
                    </div>
                    <div>
                        <div class="font-bold text-primary-dark text-sm">Admin</div>
                    </div>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg transition transform hover:scale-105 w-full"
                    type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen w-full bg-orange-50 pl-68 pr-6">
        @yield('content')
    </div>
</body>

</html>

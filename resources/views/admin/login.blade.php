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

<body
    class="flex flex-col min-h-screen items-center justify-center bg-gradient-to-br from-orange-100 to-white py-10 px-4">
    <div class="w-full md:max-w-md rounded-2xl shadow p-6 bg-white">
        <div class="w-full flex justify-center p-5">
            <img src="{{ asset('assets/logo/OIC_BROWN.png') }}" class="w-24 md:w-32" alt="">
        </div>
        <h2 class="text-2xl md:text-3xl font-bold text-primary-dark my-3 text-center">Login Admin</h2>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 rounded p-2 mb-2 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-100 text-red-700 rounded p-2 mb-2 text-sm">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="font-bold block text-primary-dark mb-1" for="email">Email</label>
                <input type="text" id="email" name="email"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-primary"
                    required />
            </div>
            <div>
                <label class="font-bold block text-primary-dark mb-1" for="password">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-primary"
                    required />
            </div>
            <button type="submit"
                class="bg-primary text-white px-6 py-2 rounded hover:bg-primary-dark transition transform hover:scale-105 w-full">
                Login
            </button>
        </form>
    </div>
</body>

</html>

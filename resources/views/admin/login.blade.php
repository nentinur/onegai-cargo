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
    class="flex flex-col w-screen h-screen items-center justify-center bg-gradient-to-br from-orange-100 to-white py-20 px-6">
    <div class="min-w-1/3 rounded-2xl shadow p-6 items-center bg-white">
        <div class="w-full flex justify-center p-5">
            <img src="{{ asset('assets/logo/OIC_BROWN.png') }}" class="w-30" alt="">
        </div>
        <h2 class="text-3xl font-bold text-primary-dark mb-6 text-center">Login Admin</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div class="w-full flex items-center justify-between py-2">
                <label class="w-2/6 font-bold block text-primary-dark">Email</label>
                <input type="text" id="email" name="email" class="w-full border rounded px-3 py-2" required />
            </div>
            <div class="w-full flex items-center justify-between py-2">
                <label class="w-2/6 font-bold block text-primary-dark">Password</label>
                <input type="password" id="password" name="password" class="w-full border rounded px-3 py-2"
                    required />
            </div>
            <button type="submit"
                class="bg-primary text-white px-6 py-2 mb-3 rounded hover:bg-primary-dark transition transform hover:scale-105 w-full">
                Login
            </button>
        </form>
    </div>
</body>

</html>

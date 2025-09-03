@extends('layout')
@section('content')
    <div class="min-h-screen w-full bg-gradient-to-t from-orange-100 to-white py-20 px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-primary-dark mb-6 text-center">Daftar Admin</h2>

            @if (session()->has('success'))
                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form class="space-y-4" action="/daftar" method="POST">
                @csrf
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Nama</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Email</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Password</label>
                    <input type="text" name="password" class="w-full border rounded px-3 py-2" />
                </div>
                
                <button type="submit"
                    class="bg-primary text-white px-6 py-2 rounded hover:bg-primary-dark transition transform hover:scale-105 w-full">
                    Daftar
                </button>
            </form>
        </div>
    </div>
@endsection

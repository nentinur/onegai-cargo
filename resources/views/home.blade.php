@extends('layout')
@section('content')
    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-20 px-4">
        <div class="flex w-full items-center justify-between mx-auto">
            <div>
                <h1 class="text-6xl font-bold text-primary-dark transition hover:scale-105 duration-300">
                    Onegai Cargo Indonesia
                </h1>
                <p class="mt-6 text-lg text-primary-dark md:text-xl">
                    Layanan pengiriman barang Indonesia - Jepang, aman dan terpercaya 📦🗾
                </p>
                <a href="/order"
                    class="mt-10 inline-block bg-primary hover:bg-primary text-white px-8 py-3 rounded-lg transition transform hover:scale-105">
                    Pesan Sekarang
                </a>
            </div>
            <div>
                <img src="{{ asset('assets/delivery.gif') }}" alt="" class="w-96">
            </div>
        </div>

        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ([['🚚', 'Cepat & Tepat'], ['🔒', 'Aman & Terlacak'], ['💸', 'Harga Terjangkau']] as [$icon, $title])
                <div class="bg-white shadow-lg p-6 rounded-lg transform hover:scale-105 transition">
                    <div class="text-4xl">{{ $icon }}</div>
                    <h3 class="text-xl font-semibold mt-2 text-primary">{{ $title }}</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Layanan terbaik untuk pengiriman Indonesia - Jepang.
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

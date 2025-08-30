{{-- @dd($tracking) --}}
@extends('layout')
@section('content')

    <div class="min-h-screen w-full bg-gradient-to-t from-orange-100 to-white py-20 px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-primary-dark mb-6 text-center">Cek Pesanan Anda</h2>

            @if (session()->has('success'))
                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/tracking" method="GET" class="space-y-4">
                @csrf
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Nomor Resi</label>
                    <input type="text" name="search" value="{{ $tracking ? $tracking["kode_pesanan"] : "" }}" 
                    class="w-full border rounded px-3 py-2" required />
                </div>
                <button type="submit"
                    class="bg-primary text-white px-6 py-2 mb-3 rounded hover:bg-primary-dark transition transform hover:scale-105 w-full">
                    Search
                </button>
            </form>
            @if ($tracking)
                <div class="space-y-4">
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Nama Pengirim</label>
                    <input type="text" name="sender_name" class="w-full border rounded px-3 py-2" value="{{ $tracking ? $tracking["nama_pemesan"] : "" }}" disabled />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Email Pengirim</label>
                    <input type="text" name="sender_name" class="w-full border rounded px-3 py-2" value="{{ $tracking ? $tracking["email_pemesan"] : "" }}" disabled />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">No Hp Pengirim</label>
                    <input type="text" name="sender_name" class="w-full border rounded px-3 py-2" value="{{ $tracking ? $tracking["no_hp_pemesan"] : "" }}" disabled />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Jumlah Produk</label>
                    <input type="text" name="sender_name" class="w-full border rounded px-3 py-2" value="{{ $tracking ? $tracking["jumlah_produk"] : "" }}" disabled />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Pengiriman Asal</label>
                    <input type="text" name="sender_name" class="w-full border rounded px-3 py-2" value="{{ $tracking ? $tracking["daerah_asal"] : "" }}" disabled />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Pengiriman Tujuan</label>
                    <input type="text" name="sender_name" class="w-full border rounded px-3 py-2" value="{{ $tracking ? $tracking["daerah_tujuan"] : "" }}" disabled />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Status Pengiriman</label>
                    <input type="text" name="sender_name" class="w-full border rounded px-3 py-2" value="{{ $tracking ? $tracking["status_pengiriman"] : "" }}" disabled />
                </div>
                
            </div>
            @endif
            
            
        </div>
    </div>
@endsection

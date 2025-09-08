@extends('layout')
@section('content')
    <div class="min-h-screen w-full bg-gradient-to-t from-orange-100 to-white py-3 md:py-10 px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-primary-dark mb-6 text-center">Form Pemesanan</h2>

            @if (session()->has('success'))
                
                @php
                $phoneNumber = '+6287717121990';
                $kodeResi = request()->query('kode_resi', '');
                $message = 'Hallo admin, Saya mau konfirmasi bahwa saya sudah melakukan order dengan kode resi: ' . $kodeResi . ' Terima kasih.';
                $encodedMessage = urlencode($message);
                $whatsappUrl = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";
                @endphp
                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded max-w-lg mx-auto justify-center text-center">
                    {{ session('success') }} 
                    <div class="flex justify-center">
                        <button onclick="window.open('{{ $whatsappUrl }}', '_blank')" type="button" class="flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.028-.967-.271-.099-.468-.148-.666.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.298-.018-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.149-.666-1.611-.912-2.207-.242-.579-.487-.5-.666-.51-.173-.008-.372-.01-.571-.01-.198 0-.52.075-.792.372-.271.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.099 3.205 5.077 4.373.711.306 1.263.489 1.694.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.413-.074-.124-.271-.198-.568-.347zm-5.421 7.617h-.001a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982 1-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.455 4.436-9.89 9.893-9.89 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.991c-.002 5.455-4.437 9.89-9.893 9.89zm8.413-18.303c-2.066-2.067-4.816-3.202-7.742-3.2-6.032.002-10.947 4.916-10.949 10.948a10.92 10.92 0 001.588 5.77l-1.687 6.163a1.001 1.001 0 00.971 1.263c.082 0 .164-.01.245-.029l6.238-1.637a10.93 10.93 0 005.584 1.523h.005c6.033 0 10.948-4.916 10.95-10.949a10.89 10.89 0 00-3.203-7.77z"/>
                            </svg>
                            Konfirmasi via WhatsApp
                        </button>
                    </div>
                </div>
                <script>
                    window.open("{{ $whatsappUrl }}", "_blank");
                </script>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 mb-4 rounded max-w-lg mx-auto justify-center text-center">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mx-auto max-w-lg grid grid-cols-1 md:grid-cols-2 gap-6 justify-center" action="/order" method="POST">
                @csrf
                <div class="space-y-4 md:col-span-2">
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Nama Penerima</label>
                        <input type="text" name="nama_penerima"
                            class="w-full border border-primary-light rounded px-3 py-2" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Nomor Telpon Penerima</label>
                        <input type="text" name="no_telp_penerima"
                            class="w-full border border-primary-light rounded px-3 py-2" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Alamat Penerima</label>
                        <textarea name="alamat_penerima" class="w-full border border-primary-light rounded px-3 py-2"></textarea>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Berat Barang (kg)</label>
                        <input type="number" name="berat_barang" step="0.1"
                            class="w-full border border-primary-light rounded px-3 py-2" />
                    </div>
                </div>
                <div class="md:col-span-2 flex justify-center">
                    <button type="submit"
                        class="bg-primary text-white px-10 py-2 rounded hover:bg-primary-dark transition transform hover:scale-105">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@php
    session()->forget('success');
@endphp
@endsection

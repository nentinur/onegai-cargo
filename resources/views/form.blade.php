<div class="min-h-screen bg-white py-20 px-6">
    <div class="max-w-2xl mx-auto bg-blue-50 p-8 rounded shadow-lg">
        <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">Form Pemesanan</h2>

        @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-4">
            <div>
                <label class="block text-gray-700">Nama</label>
                <input type="text" wire:model="nama" class="w-full border rounded px-3 py-2" />
                @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" wire:model="email" class="w-full border rounded px-3 py-2" />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700">Alamat Pengiriman</label>
                <textarea wire:model="alamat" class="w-full border rounded px-3 py-2"></textarea>
                @error('alamat')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700">Negara Tujuan</label>
                <input type="text" wire:model="negara_tujuan" class="w-full border rounded px-3 py-2" />
                @error('negara_tujuan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700">Berat Barang (kg)</label>
                <input type="number" wire:model="berat" step="0.1" class="w-full border rounded px-3 py-2" />
                @error('berat')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition transform hover:scale-105 w-full">
                Kirim Pesanan
            </button>
        </form>
    </div>
</div>

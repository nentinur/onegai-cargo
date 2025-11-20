@extends('admin.layout')
@section('content')
    <div class="min-h-screen w-full bg-gradient-to-t from-orange-100 to-white py-3 md:py-10 px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-primary-dark mb-6 text-center">Form Pemesanan</h2>

            @if (session()->has('success'))
                @php
                    $phoneNumber = ['+6282119777677', '+6285159952797'];
                    $kodeResi = request()->query('kode_resi', '');
                    $message =
                        'Hallo admin, Saya mau konfirmasi bahwa saya sudah melakukan order dengan kode resi: ' .
                        $kodeResi .
                        ' Terima kasih.';
                    $encodedMessage = urlencode($message);
                    // $whatsappUrl = "https://wa.me/{$phoneNumber[random()]}?text={$encodedMessage}";
                    $whatsappUrl = "https://wa.me/{$phoneNumber[array_rand($phoneNumber)]}?text={$encodedMessage}";
                @endphp
                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded max-w-lg mx-auto justify-center text-center">
                    {{ session('success') }}
                    <div class="flex justify-center">
                        <button onclick="window.open('{{ $whatsappUrl }}', '_blank')" type="button"
                            class="flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.028-.967-.271-.099-.468-.148-.666.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.298-.018-.458.13-.606.134-.133.298-.347.447-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.149-.666-1.611-.912-2.207-.242-.579-.487-.5-.666-.51-.173-.008-.372-.01-.571-.01-.198 0-.52.075-.792.372-.271.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.099 3.205 5.077 4.373.711.306 1.263.489 1.694.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.413-.074-.124-.271-.198-.568-.347zm-5.421 7.617h-.001a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982 1-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.455 4.436-9.89 9.893-9.89 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.991c-.002 5.455-4.437 9.89-9.893 9.89zm8.413-18.303c-2.066-2.067-4.816-3.202-7.742-3.2-6.032.002-10.947 4.916-10.949 10.948a10.92 10.92 0 001.588 5.77l-1.687 6.163a1.001 1.001 0 00.971 1.263c.082 0 .164-.01.245-.029l6.238-1.637a10.93 10.93 0 005.584 1.523h.005c6.033 0 10.948-4.916 10.95-10.949a10.89 10.89 0 00-3.203-7.77z" />
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

            <form class="mx-auto max-w-lg grid grid-cols-1 md:grid-cols-2 gap-6 justify-center" action="/order"
                method="POST">
                @csrf
                <div class="space-y-4 md:col-span-2">
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Destinasi</label>
                        <select class="w-full border border-primary-light rounded px-3 py-2" name="destinasi" id="destinasi"
                            required>
                            <option value="">Pilih Rute</option>
                            <option value="id_jp">Indonesia - Jepang</option>
                            <option value="jp_id">Jepang - Indonesia</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Estimasi</label>
                        <select class="w-full border border-primary-light rounded px-3 py-2" name="estimasi" id="estimasi"
                            required>
                            <option selected value="1">14 Hari</option>
                            <option value="2">30 Hari</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Nama Penerima</label>
                        <input type="text" name="nama_penerima"
                            class="w-full border border-primary-light rounded px-3 py-2" required />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Nomor Telpon Penerima</label>
                        <input type="text" name="no_telp_penerima"
                            class="w-full border border-primary-light rounded px-3 py-2" required />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Berat Barang (kg)</label>
                        <input type="number" name="berat_barang" step="0.1"
                            class="w-full border border-primary-light rounded px-3 py-2" required />
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="font-bold text-primary-dark">Alamat Penerima</label>
                        <textarea name="alamat_penerima" class="w-full border border-primary-light rounded px-3 py-2" required></textarea>
                    </div>

                    {{-- ================= INDONESIA ================= --}}
                    {{-- <div id="form-indonesia" class="hidden space-y-3">
                        <div class="flex flex-col gap-1">
                            <label for="provinsi" class="font-bold text-primary-dark text-sm">Provinsi</label>
                            <select id="provinsi" class="w-full border border-primary-light rounded px-3 py-2">
                                <option value=""> Pilih Provinsi </option>
                            </select>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="kabupaten" class="font-bold text-primary-dark text-sm">Kabupaten/Kota</label>
                            <select id="kabupaten" class="w-full border border-primary-light rounded px-3 py-2">
                                <option value=""> Pilih Kabupaten/Kota </option>
                            </select>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="kecamatan" class="font-bold text-primary-dark text-sm">Kecamatan</label>
                            <select id="kecamatan" class="w-full border border-primary-light rounded px-3 py-2">
                                <option value=""> Pilih Kecamatan </option>
                            </select>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="kelurahan" class="font-bold text-primary-dark text-sm">Kelurahan/Desa</label>
                            <select id="kelurahan" class="w-full border border-primary-light rounded px-3 py-2">
                                <option value=""> Pilih Kelurahan/Desa </option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-bold text-primary-dark text-sm">Detail Alamat (Nama Jalan, Nomor Rumah,
                                dll.)</label>
                            <textarea name="alamat_penerima" class="w-full border border-primary-light rounded px-3 py-2"></textarea>
                        </div>
                    </div> --}}

                    {{-- ================= JEPANG ================= --}}
                    {{-- <div id="form-jepang" class="hidden space-y-3">
                        <label class="font-bold text-primary-dark">Alamat Penerima</label>
                        <div class="flex flex-col gap-1">
                            <label for="prefecture" class="font-bold text-primary-dark text-sm">Prefektur</label>
                            <select id="prefecture" class="w-full border border-primary-light rounded px-3 py-2">
                                <option value="">Pilih Prefektur</option>
                            </select>
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="city" class="font-bold text-primary-dark text-sm">Kota</label>
                            <select id="city" class="w-full border border-primary-light rounded px-3 py-2">
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-bold text-primary-dark text-sm">Detail Alamat (Nama Jalan, Nomor Rumah,
                                dll.)</label>
                            <textarea name="alamat_penerima" class="w-full border border-primary-light rounded px-3 py-2"></textarea>
                        </div>
                    </div> --}}
                </div>
        </div>
        <div class="md:col-span-2 flex justify-center mt-4">
            <button type="submit"
                class="bg-primary text-white px-10 py-2 rounded hover:bg-primary-dark transition transform hover:scale-105">
                Submit
            </button>
        </div>
        </form>
    </div>
    </div>
    {{-- <script>
        document.getElementById("destinasi").addEventListener("change", function() {
            let indoForm = document.getElementById("form-indonesia");
            let jpnForm = document.getElementById("form-jepang");
            indoForm.classList.add("hidden");
            jpnForm.classList.add("hidden");

            if (this.value === "jp_id") {
                indoForm.classList.remove("hidden");
                // Load provinsi Indonesia dari backend
                fetch("/order/getAddress/jp_id")
                    .then(res => res.json())
                    .then(data => {
                        let provinsi = document.getElementById("provinsi");
                        provinsi.innerHTML = `<option value=\"\">Pilih Provinsi</option>`;
                        data.forEach(p => {
                            provinsi.innerHTML += `<option value=\"${p.id}\">${p.name}</option>`;
                        });
                    });
            } else if (this.value === "id_jp") {
                jpnForm.classList.remove("hidden");
                // Load prefecture Jepang dari backend
                fetch("/order/getAddress/id_jp")
                    .then(res => res.json())
                    .then(data => {
                        let prefecture = document.getElementById("prefecture");
                        prefecture.innerHTML = `<option value=\"\">Pilih Prefektur</option>`;
                        data.forEach(p => {
                            prefecture.innerHTML += `<option value=\"${p.id}\">${p.name}</option>`;
                        });
                    });
            }
        });

        // Indonesia: Provinsi -> Kabupaten
        document.getElementById("provinsi").addEventListener("change", function() {
            let kabupaten = document.getElementById("kabupaten");
            kabupaten.innerHTML = `<option value=\"\">Pilih Kabupaten/Kota</option>`;
            fetch(`/order/getAddress/id/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(k => {
                        kabupaten.innerHTML += `<option value=\"${k.id}\">${k.name}</option>`;
                    });
                });
        });

        // Kabupaten -> Kecamatan
        document.getElementById("kabupaten").addEventListener("change", function() {
            let kecamatan = document.getElementById("kecamatan");
            kecamatan.innerHTML = `<option value=\"\">Pilih Kecamatan</option>`;
            fetch(`/order/getAddress/id/regency/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(d => {
                        kecamatan.innerHTML += `<option value=\"${d.id}\">${d.name}</option>`;
                    });
                });
        });

        // Kecamatan -> Kelurahan
        document.getElementById("kecamatan").addEventListener("change", function() {
            let kelurahan = document.getElementById("kelurahan");
            kelurahan.innerHTML = `<option value=\"\">Pilih Kelurahan/Desa</option>`;
            fetch(`/order/getAddress/id/district/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(v => {
                        kelurahan.innerHTML += `<option value=\"${v.id}\">${v.name}</option>`;
                    });
                });
        });

        // Jepang: Prefecture -> City
        document.getElementById("prefecture").addEventListener("change", function() {
            let city = document.getElementById("city");
            city.innerHTML = `<option value=\"\">Pilih Kota</option>`;
            fetch(`/order/getAddress/jp/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(c => {
                        city.innerHTML += `<option value=\"${c.id}\">${c.name}</option>`;
                    });
                });
        });
    </script> --}}
    @php
        session()->forget('success');
    @endphp
@endsection

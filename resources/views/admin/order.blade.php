@extends('admin.layout')
@section('content')
    <div class="p-5 m-5 bg-white rounded-lg shadow-lg min-h-[95vh] w-full flex flex-col">
        <h1 class="text-4xl font-bold text-main mb-6 text-primary-dark">Order</h1>

        <table id="list" class="hover w-full table-auto">
            <thead>
                <tr class="text-left font-bold bg-secondary">
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">No</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">No Resi</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">Nama</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">Telepon</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">Alamat</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($orders as $order)
                    <tr>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">@php
                            echo $i;
                        @endphp</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">{{ $order->kode_resi }}</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">{{ $order->nama_penerima }}</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">{{ $order->no_telp_penerima }}</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">{{ $order->alamat_penerima }}</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">
                            <div class="flex space-x-2">
                                <button class="bg-primary hover:bg-primary-light text-white px-2 py-1 rounded-lg">
                                    <i class="ph ph-pencil font-bold"></i>
                                </button>
                                <form action="/admin/posts/{{ $order->id }}" method="post" class="inline">
                                    @method('delete')
                                    @csrf
                                    <button class="bg-red-400 hover:bg-red-500 text-white px-2 py-1 rounded-lg" onclick="return confirm('Yakin menghapus data?')">
                                        <i class="ph ph-trash font-bold"></i>
                                    </button>
                                </form>
                            </div>

                        </td>
                        @php
                            $i++;
                        @endphp
                @endforeach
                </tr>
                @php $i++; @endphp

            </tbody>
        </table>

    </div>

    <script>
        $(document).ready(function() {
            $('#list').DataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                dom: `
                    <"flex justify-between items-center mb-2" <"flex items-center space-x-4"l>
                        <"flex items-center space-x-4"fB>
                            >
                            rt
                            <"flex justify-between items-center mt-2"ip>
                    `,
                responsive: true
            });
        });
    </script>
@endsection

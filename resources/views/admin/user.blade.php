@extends('admin.layout')
@section('content')
    <div class="p-5 m-5 bg-white rounded-lg shadow-lg min-h-[95vh] w-full flex flex-col">
        <h1 class="text-4xl font-bold text-main mb-6 text-primary-dark">User</h1>
<button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150 flex items-center justify-center" style="width: 100px;" onclick="openModalTambah()">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
    </svg>
    </button>
        @if (session()->has('error'))
            <div class="bg-red-100 text-red-700 rounded p-2 mb-2 text-sm">
                {{ session('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-700 rounded p-2 mb-2 text-sm">
                {{ session('success') }}
            </div>
        @endif
        
        <table id="list" class="hover w-full table-auto">
            <thead>
                <tr class="text-left font-bold bg-secondary">
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">No</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">Name</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">Email</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">Role</th>
                    <th class="cursor-pointer px-4 py-2 border border-gray-300">Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($users as $user)
                    <tr>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">@php
                            echo $i;
                        @endphp</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">{{ $user->name }}</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">{{ $user->email }}</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">admin</td>
                        <td class="cursor-pointer px-4 py-2 border border-gray-300">
                            <div class="flex space-x-2">
                                <button class="bg-primary hover:bg-primary-light text-white px-2 py-1 rounded-lg"
                                    onclick="openModalEdit('{{ $user->id }}', '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}')">
                                    <i class="ph ph-pencil font-bold"></i>
                                </button>
                                <button class="bg-red-400 hover:bg-red-500 text-white px-2 py-1 rounded-lg"
                                    onclick="openModalDelete({{ $user->id }})">
                                    <i class="ph ph-trash font-bold"></i>
                                </button>
                                
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

        <div id="modalDelete" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden">
            <div class="bg-white w-1/3 rounded-xl shadow-lg p-6 relative">
                <!-- Header -->
                <div class="flex justify-between items-start my-2">
                    <div>
                        <h2 class="text-xl font-semibold text-primary-dark">Hapus User</h2>
                    </div>
                    <button onclick="closeModalDelete()" class="text-gray-500 text-xl font-bold hover:text-black">
                        &times;
                    </button>
                </div>
                <hr>
                <!-- Body -->
                <form action="{{ route('deleteUser') }}" method="POST">
                    @csrf
                    <div class="mt-4 space-y-2">
                        <input name="id" type="text" value="" id="deleteUserId" hidden>
                        <h1>Yakin menghapus data ini?</h1>
                        <h1>User: <span id="deleteName"></span></h1>
                    </div>
                    <!-- Action Buttons -->
                    <div class="flex justify-between gap-2 mt-6">
                        <button onclick="closeModalDelete()" type="button"
                            class="bg-gray-400 text-white px-2 py-1 text-sm rounded hover:bg-gray-600">
                            Batal
                        </button>
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 text-sm rounded hover:bg-red-700">
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="modalTambah" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden">
            <div class="bg-white w-1/3 rounded-xl shadow-lg p-6 relative">
                <!-- Header -->
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-xl font-semibold text-primary-dark">Tambah Data User</h2>
                    </div>
                    <button onclick="closeModalAdd()" class="text-gray-500 text-xl font-bold hover:text-black">
                        &times;
                    </button>
                </div>
                <hr>
                <!-- Body -->
                <form action="{{ route('addUser') }}" method="POST">
                    @csrf
                    <input type="text" name="id" value="" id="editOrderId" hidden>
                    <div class="flex flex-col gap-3 mt-4">
                        <div class="flex flex-col gap-1">
                            <label class="font-bold text-primary-dark">Nama</label>
                            <input type="text" name="nama" id="addNama"
                                class="w-full border border-primary-light rounded px-3 py-2" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-bold text-primary-dark">Email</label>
                            <input type="text" name="email" id="addEmail"
                                class="w-full border border-primary-light rounded px-3 py-2" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-bold text-primary-dark">Password</label>
                            <input type="password" name="password" id="addPassword"
                                class="w-full border border-primary-light rounded px-3 py-2" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-bold text-primary-dark">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="addPassword"
                                class="w-full border border-primary-light rounded px-3 py-2" />
                        </div>
                    </div>
                    <div class="flex justify-between gap-2 mt-6">
                        <button onclick="closeModalAdd()" type="button"
                            class="bg-gray-400 text-white px-2 py-1 text-sm rounded hover:bg-gray-600">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-primary text-white px-2 py-1 text-sm rounded hover:bg-primary-light">
                            Simpan
                        </button>
                </form>
            </div>
        

        <div id="modalEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden">
            <div class="bg-white w-1/3 rounded-xl shadow-lg p-6 relative">
                <!-- Header -->
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-xl font-semibold text-primary-dark">Edit Data User</h2>
                    </div>
                    <button onclick="closeModalEdit()" class="text-gray-500 text-xl font-bold hover:text-black">
                        &times;
                    </button>
                </div>
                <hr>
                <!-- Body -->
                <form action="{{ route('editUser') }}" method="POST">
                    @csrf
                    <input type="text" name="id" value="" id="editOrderId" hidden>
                    <div class="flex flex-col gap-3 mt-4">
                        <div class="flex flex-col gap-1">
                            <label class="font-bold text-primary-dark">Nama</label>
                            <input type="text" name="nama" id="editNama"
                                class="w-full border border-primary-light rounded px-3 py-2" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-bold text-primary-dark">Email</label>
                            <input type="text" name="email" id="editEmail"
                                class="w-full border border-primary-light rounded px-3 py-2" />
                        </div>
                    </div>
                    <div class="flex justify-between gap-2 mt-6">
                        <button onclick="closeModalEdit()" type="button"
                            class="bg-gray-400 text-white px-2 py-1 text-sm rounded hover:bg-gray-600">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-primary text-white px-2 py-1 text-sm rounded hover:bg-primary-light">
                            Simpan
                        </button>
                </form>
            </div>
        </div>
        
    </div>

    <script>
        
        function openModalDelete(id) {
            $('#deleteUserId').val(id);
            document.getElementById("modalDelete").classList.remove("hidden");
        }

        function closeModalDelete() {
            document.getElementById("modalDelete").classList.add("hidden");
        }


        function openModalTambah() {
            document.getElementById("modalTambah").classList.remove("hidden");
        }

        function closeModalAdd() {
            document.getElementById("modalTambah").classList.add("hidden");
        }

        function openModalEdit(id, resi, nama, telepon, alamat) {
            $('#editUserId').val(id);
            $('#editNama').val(nama);
            $('#editEmail').val(telepon);
            document.getElementById("modalEdit").classList.remove("hidden");
        }

        function closeModalEdit() {
            document.getElementById("modalEdit").classList.add("hidden");
        }

    </script>

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

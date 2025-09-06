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
            @if (session()->has('error'))
                <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif
            {{-- Search Form --}}
            <div class="flex justify-center mb-6">
            <form action="/tracking" method="GET" class="space-y-4 flex justify-center">
                @csrf
                <div class="bg-inherit p-4 rounded-lg w-full max-w-md">
                    <div class="relative bg-inherit">
                        <div class="flex justify-center sm:justify-start">
                            <label class="hidden py-1 px-3" for="bar-search"></label>
                            <input class="appearance-none text-md py-1 px-2 focus:outline-none border-2 border-orange-300 focus:border-primary-dark bg-white text-primary-dark placeholder-orange-400 font-semibold rounded-l" type="search" name="search" placeholder="Masukkan Nomor Resi" value="{{ $tracking ? $tracking["kode_resi"] : "" }}" required>
                            <button type="submit" class="bg-primary hover:bg-primary-dark px-5 py-1 text-lg font-bold hover:shadow-2xl cursor-pointer transition duration-250 ease-in-out rounded-r text-white" value="Search" color="blue">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>

            {{-- Display Tracking Info --}}
            
            @if ($tracking)
                <div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
                    <h3 class="text-xl font-semibold mb-4 text-primary-dark">Informasi Pengiriman</h3>
                    
                    
                    <div class="flex mb-4">
                        <label class="w-2/6  block text-primary-dark">Nama Pengirim</label>
                        <span class="w-4/6 font-bold text-primary-dark">{{ $tracking ? $tracking["nama_pengirim"] : "" }}</span>
                    </div>
                    <div class="flex flex-col gap-4">
                        @if (date_diff($tracking["created_at"], now())->days < 3)
                        <div class="bg-orange-50 border border-orange-200 rounded-lg shadow p-4 flex flex-col items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" viewBox="0 0 40 40" fill="none">
                                <rect width="40" height="40" rx="8" fill="#FFEDD5"/>
                                <g>
                                    <circle cx="20" cy="20" r="12" fill="#F97316"/>
                                    <rect x="10" y="18" width="20" height="4" rx="2" fill="#FFF"/>
                                    <rect x="16" y="14" width="8" height="2" rx="1" fill="#FFF"/>
                                    <rect x="16" y="24" width="8" height="2" rx="1" fill="#FFF"/>
                                </g>
                            </svg>
                            <span class="text-sm text-gray-500 mb-1">POSTING/COLLECTION</span>
                            <span class="text-lg font-semibold text-primary-dark">INDONESIA</span>
                        </div>
                        @endif

                        @if (date_diff($tracking["created_at"], now())->days > 3)
                        <div class="bg-orange-50 border border-orange-200 rounded-lg shadow p-4 flex flex-col items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" viewBox="0 0 40 40" fill="none">
                                <rect width="40" height="40" rx="8" fill="#FFEDD5"/>
                                <g>
                                    <circle cx="20" cy="20" r="12" fill="#F97316"/>
                                    <path d="M12 20h16M20 12v16" stroke="#FFF" stroke-width="2" stroke-linecap="round"/>
                                    <rect x="16" y="18" width="8" height="4" rx="2" fill="#FFF"/>
                                    <rect x="18" y="14" width="4" height="2" rx="1" fill="#FFF"/>
                                    <rect x="18" y="24" width="4" height="2" rx="1" fill="#FFF"/>
                                </g>
                            </svg>
                            <span class="text-sm text-gray-500 mb-1">DISPATCH FROM OUTWARD OFFICE</span>
                            <span class="text-lg font-semibold text-primary-dark">JAKARTA SOEKARNO-HATTA</span>
                        </div>
                        @endif

                        @if (date_diff($tracking["created_at"], now())->days > 3)
                        <div class="bg-orange-50 border border-orange-200 rounded-lg shadow p-4 flex flex-col items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" viewBox="0 0 40 40" fill="none">
                                <rect width="40" height="40" rx="8" fill="#FFEDD5"/>
                                <g>
                                    <circle cx="20" cy="20" r="12" fill="#F97316"/>
                                    <path d="M14 20h12M20 14v12" stroke="#FFF" stroke-width="2" stroke-linecap="round"/>
                                    <rect x="16" y="18" width="8" height="4" rx="2" fill="#FFF"/>
                                </g>
                            </svg>
                            <span class="text-sm text-gray-500 mb-1">DISPATCH FROM TRANSIT OFFICE</span>
                            <span class="text-lg font-semibold text-primary-dark">SINGAPORE CHANGI AIRPORT</span>
                        </div>
                        @endif

                        @if (date_diff($tracking["created_at"], now())->days > 4)
                        <div class="bg-orange-50 border border-orange-200 rounded-lg shadow p-4 flex flex-col items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" viewBox="0 0 40 40" fill="none">
                                <rect width="40" height="40" rx="8" fill="#FFEDD5"/>
                                <g>
                                    <circle cx="20" cy="20" r="12" fill="#F97316"/>
                                    <path d="M12 20h16M20 12v16" stroke="#FFF" stroke-width="2" stroke-linecap="round"/>
                                    <rect x="16" y="18" width="8" height="4" rx="2" fill="#FFF"/>
                                    <rect x="18" y="14" width="4" height="2" rx="1" fill="#FFF"/>
                                    <rect x="18" y="24" width="4" height="2" rx="1" fill="#FFF"/>
                                </g>
                            </svg>
                            <span class="text-sm text-gray-500 mb-1">DISPATCH FROM TRANSIT OFFICE</span>
                            <span class="text-lg font-semibold text-primary-dark">BEIJING SHANGHAI INT. AIRPORT</span>
                        </div>
                        @endif

                        @if (date_diff($tracking["created_at"], now())->days > 4)
                        <div class="bg-orange-50 border border-orange-200 rounded-lg shadow p-4 flex flex-col items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" viewBox="0 0 40 40" fill="none">
                                <rect width="40" height="40" rx="8" fill="#FFEDD5"/>
                                <g>
                                    <circle cx="20" cy="20" r="12" fill="#F97316"/>
                                    <path d="M20 14v12M14 20h12" stroke="#FFF" stroke-width="2" stroke-linecap="round"/>
                                    <rect x="16" y="18" width="8" height="4" rx="2" fill="#FFF"/>
                                    <rect x="18" y="24" width="4" height="2" rx="1" fill="#FFF"/>
                                </g>
                            </svg>
                            <span class="text-sm text-gray-500 mb-1">ARRIVAL AT INWARD OFFICE EXCHANGE</span>
                            <span class="text-lg font-semibold text-primary-dark">OSAKA INT</span>
                        </div>
                        @endif

                        @if (date_diff($tracking["created_at"], now())->days > 4)
                        <div class="bg-orange-50 border border-orange-200 rounded-lg shadow p-4 flex flex-col items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" viewBox="0 0 40 40" fill="none">
                                <rect width="40" height="40" rx="8" fill="#FFEDD5"/>
                                <g>
                                    <circle cx="20" cy="20" r="12" fill="#F97316"/>
                                    <path d="M14 26v-8a6 6 0 1112 0v8" stroke="#FFF" stroke-width="2" stroke-linecap="round"/>
                                    <rect x="16" y="26" width="8" height="2" rx="1" fill="#FFF"/>
                                </g>
                            </svg>
                            <span class="text-sm text-gray-500 mb-1">HELD BY IMPORT CUSTOMS</span>
                            <span class="text-lg font-semibold text-primary-dark">OSAKA INT</span>
                        </div>
                        @endif

                        @if (date_diff($tracking["created_at"], now())->days > 5)
                        <div class="bg-orange-50 border border-orange-200 rounded-lg shadow p-4 flex flex-col items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mb-2" viewBox="0 0 40 40" fill="none">
                                <rect width="40" height="40" rx="8" fill="#FFEDD5"/>
                                <g>
                                    <circle cx="20" cy="20" r="12" fill="#F97316"/>
                                    <rect x="14" y="18" width="12" height="4" rx="2" fill="#FFF"/>
                                    <rect x="18" y="14" width="4" height="2" rx="1" fill="#FFF"/>
                                    <rect x="18" y="24" width="4" height="2" rx="1" fill="#FFF"/>
                                    
                                </g>
                            </svg>
                            <span class="text-sm text-gray-500 mb-1">PROCESSING AT DELIVERY</span>
                            <span class="text-lg font-semibold text-primary-dark">JAPAN AREA</span>
                        </div>
                        @endif
                    </div>
                </div>
            @endif
            
            
        
        </div>
    </div>
@endsection

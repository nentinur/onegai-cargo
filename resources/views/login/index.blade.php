{{-- @dd($tracking) --}}
@extends('layout')
@section('content')

    <div class="min-h-screen w-full bg-gradient-to-t from-orange-100 to-white py-20 px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-primary-dark mb-6 text-center">Login</h2>

            
            <form action="/tracking" method="GET" class="space-y-4">
                @csrf
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Email</label>
                    <input type="text" name="email" 
                    class="w-full border rounded px-3 py-2" required />
                </div>
                <div class="flex ">
                    <label class="w-2/6 font-bold block text-primary-dark">Password</label>
                    <input type="text" name="password" 
                    class="w-full border rounded px-3 py-2" required />
                </div>
                <button type="submit"
                    class="bg-primary text-white px-6 py-2 mb-3 rounded hover:bg-primary-dark transition transform hover:scale-105 w-full">
                    Search
                </button>
            </form>
            
            
            
        </div>
    </div>
@endsection

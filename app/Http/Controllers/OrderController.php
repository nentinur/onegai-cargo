<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // return request()->all();
        $validatedData = $request->validate([
            'nama_pengirim' => 'required|min:5|max:255',
            'email_pengirim' => 'required|email',
            'no_telp_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'nama_penerima' => 'required',
            'no_telp_penerima' => 'required',
            'alamat_penerima' => 'required',
            'berat_barang' => 'required|integer',
        ]);

        // $validatedData['kode_resi'] = 'ONE-' . strtoupper(uniqid());
        $validatedData['kode_resi'] = 'ONE-' . strtoupper(uniqid());
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();
        Customer::create($validatedData);
    }
}

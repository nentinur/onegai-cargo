<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

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
        $validatedData['kode_resi'] = 'ONE-' . strtoupper(substr(uniqid(), 0, 6));
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();
        Customer::create($validatedData);
        Mail::raw(
            'Terima kasih telah melakukan pemesanan. Kode resi Anda: ' . $validatedData['kode_resi'],
            function ($message) use ($validatedData) {
                $message->to('khafidz.edu@gmail.com', $validatedData['nama_pengirim'])
                    ->subject('Kode Resi Pemesanan');
            }
        );
        $waNumber = '6282120345259';
        $message = 'Kode resi Anda: ' . $validatedData['kode_resi'];
        $waApiUrl = 'https://api.whatsapp.com/send?phone=' . $waNumber . '&text=' . urlencode($message);
        // Jika ingin redirect ke WhatsApp, gunakan:
        // return redirect($waApiUrl);
        // Jika hanya ingin mengirim, gunakan package pihak ketiga atau API WhatsApp Business.
        return redirect('/order')->with('success', 'Order berhasil dibuat! Kode resi Anda: ' . $validatedData['kode_resi']);
    }
}

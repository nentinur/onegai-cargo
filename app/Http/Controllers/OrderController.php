<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // return request()->all();
        $validatedData = $request->validate([
            // 'nama_pengirim' => 'required|min:5|max:255',
            // 'email_pengirim' => 'required|email',
            // 'no_telp_pengirim' => 'required',
            // 'alamat_pengirim' => 'required',
            'nama_penerima' => 'required|min:4|max:255',
            'no_telp_penerima' => 'required',
            'alamat_penerima' => 'required',
            'berat_barang' => 'required|integer',
        ]);

        // inisialisasi kode_resi
        $validatedData['kode_resi'] = 'ONE-' . date('dm') . strtoupper(Str::random(4)) . date('y');
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();
        // dd($validatedData);

        // Pastikan kode_resi unik
        while (Customer::where('kode_resi', $validatedData['kode_resi'])->exists()) {
            $validatedData['kode_resi'] = 'ONE-' . date('dm') . strtoupper(Str::random(4)) . date('y');
        }
        // Kirim notifikasi email
        // User::first()->notify(new OrderNotification($data));



        // Mail::raw(
        //     'Terima kasih telah melakukan pemesanan. Kode resi Anda: ' . $validatedData['kode_resi'],
        //     function ($message) use ($validatedData) {
        //         $message->to('khafidz.edu@gmail.com', $validatedData['nama_pengirim'])
        //             ->subject('Kode Resi Pemesanan');
        //     }
        // );
        // $waNumber = '6282120345259';
        // $message = 'Kode resi Anda: ' . $validatedData['kode_resi'];
        // $waApiUrl = 'https://api.whatsapp.com/send?phone=' . $waNumber . '&text=' . urlencode($message);
        // Jika ingin redirect ke WhatsApp, gunakan:
        // return redirect($waApiUrl);
        // Jika hanya ingin mengirim, gunakan package pihak ketiga atau API WhatsApp Business.



        // Mail::to($validatedData['email_pengirim'])->send(new \App\Mail\OrderNotification($data)); 

        if (Customer::create($validatedData)) {
            // Customer berhasil dibuat
            $data = [
                'subject' => 'Order Confirmation',
                'greeting' => 'Nama Penerima ' . $validatedData['nama_penerima'] . '!',
                'body' => 'Telah melakukan order dengan nomer resi: ' . $validatedData['kode_resi'],
            ];
            Notification::route('mail', 'aisyiahmissi@gmail.com') //'khafidz.edu@gmail.com') //
                ->notify(new OrderNotification($data));
            return redirect('/order?kode_resi=' . $validatedData['kode_resi'])
                ->with('success', 'Order berhasil dibuat! Kode resi Anda: ' . $validatedData['kode_resi']);
        } else {
            // Gagal membuat Customer
            return redirect('/order')->with('error', 'Gagal membuat order. Silakan coba lagi.');
        }
    }
}

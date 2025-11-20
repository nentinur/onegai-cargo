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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

use function Laravel\Prompts\table;

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
            'destinasi' => 'required',
            'estimasi' => 'required'
        ]);

        // inisialisasi kode_resi
        $validatedData['kode_resi'] = 'ONE-' . date('dm') . strtoupper(Str::random(4)) . date('y');
        $validatedData['created_at'] = now();
        $validatedData['updated_at'] = now();

        // Pastikan kode_resi unik
        while (Customer::where('kode_resi', $validatedData['kode_resi'])->exists()) {
            $validatedData['kode_resi'] = 'ONE-' . date('dm') . strtoupper(Str::random(4)) . date('y');
        }

        if (Customer::create($validatedData)) {
            // Customer berhasil dibuat
            $data = [
                'subject' => 'Order Confirmation',
                'greeting' => 'Nama Penerima ' . $validatedData['nama_penerima'] . '!',
                'body' => 'Telah melakukan order dengan nomer resi: ' . $validatedData['kode_resi'],
            ];

            // Kirim notifikasi email
            Notification::route('mail', 'aisyiahmissi@gmail.com') //'khafidz.edu@gmail.com') //
                ->notify(new OrderNotification($data));
            return redirect('/order?kode_resi=' . $validatedData['kode_resi'])
                ->with('success', 'Order berhasil dibuat! Kode resi Anda: ' . $validatedData['kode_resi']);
        } else {
            // Gagal membuat Customer
            return redirect('/order')->with('error', 'Gagal membuat order. Silakan coba lagi.');
        }
    }

    public function editOrder(Request $request)
    {
        $id = $request->id;
        $order = Customer::find($id);

        if (!$order) {
            return back()->with(['error' => 'Pesanan tidak ditemukan!']);
        }

        $validatedData = $request->validate([
            'nama_penerima' => 'required|min:4|max:255',
            'no_telp_penerima' => 'required',
            'destinasi' => 'required',
            'estimasi' => 'required',
            'alamat_penerima' => 'required',
        ]);

        $order->nama_penerima = $validatedData['nama_penerima'];
        $order->no_telp_penerima = $validatedData['no_telp_penerima'];
        $order->destinasi = $validatedData['destinasi'];
        $order->estimasi = $validatedData['estimasi'];
        $order->alamat_penerima = $validatedData['alamat_penerima'];
        $order->updated_at = now();
        $order->save();

        return back()->with(['success' => 'Pesanan Berhasil diupdate!']);
    }

    public function deleteOrder(Request $request)
    {
        $id = $request->id;
        $order = Customer::find($id);

        if (!$order) {
            return back()->with(['error' => 'Pesanan tidak ditemukan!']);
        }

        $order->delete();

        return back()->with(['success' => 'Pesanan Berhasil dihapus!']);
    }

    public function getAddress($country)
    {
        if ($country === 'jp_id') {
            $address = DB::table('provinces')->get();
        } elseif ($country === 'id_jp') {
            $address = DB::table('prefectures')->get();
        } else {
            return response()->json(['error' => 'Country not supported'], 400);
        }
        return response()->json($address);
    }

    public function getRegencies($provinceId)
    {
        $regencies = DB::table('regencies')->where('province_id', $provinceId)->get();
        return response()->json($regencies);
    }

    public function getDistricts($regencyId)
    {
        $districts = DB::table('districts')->where('regency_id', $regencyId)->get();
        return response()->json($districts);
    }

    public function getVillages($districtId)
    {
        $villages = DB::table('villages')->where('district_id', $districtId)->get();
        return response()->json($villages);
    }

    public function getCities($prefectureId)
    {
        $cities = DB::table('cities')->where('prefecture_id', $prefectureId)->get();
        return response()->json($cities);
    }
}

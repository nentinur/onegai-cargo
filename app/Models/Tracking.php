<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    /** @use HasFactory<\Database\Factories\TrackingFactory> */
    use HasFactory;
    protected $fillable = [
        'kode_pesanan',
        'nama_pemesan',
        'email_pemesan',
        'no_hp_pemesan',
        'alamat_pemesan',
        'nama_produk',
        'jumlah_produk',
        'daerah_asal',
        'daerah_tujuan',
        'status_pengiriman',
    ];
    // public static function find($resi)
    // {
    //     return self::where('kode_pesanan', $resi)->first();
    // }
}

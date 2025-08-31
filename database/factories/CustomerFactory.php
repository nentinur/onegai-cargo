<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'kode_resi' => 'ONE-' . $this->faker->regexify('[A-Z0-9]{10}'),
            'nama_pengirim' => $this->faker->name,
            'email_pengirim' => $this->faker->unique()->safeEmail,
            'no_telp_pengirim' => $this->faker->phoneNumber,
            'alamat_pengirim' => $this->faker->address,
            'nama_penerima' => $this->faker->name,
            'no_telp_penerima' => $this->faker->phoneNumber,
            'alamat_penerima' => $this->faker->address,
            'berat_barang' => $this->faker->numberBetween(1, 10000), // in grams
            'created_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
            'updated_at' => now(),

            // 'kode_pesanan' => $this->faker->unique()->word,
            // 'nama_pemesan' => $this->faker->name,
            // 'email_pemesan' => $this->faker->unique()->safeEmail,
            // 'no_hp_pemesan' => $this->faker->phoneNumber,
            // 'alamat_pemesan' => $this->faker->address,
            // 'nama_produk' => $this->faker->word,
            // 'jumlah_produk' => $this->faker->numberBetween(1, 100),
            // 'daerah_asal' => $this->faker->city,
            // 'daerah_tujuan' => $this->faker->city,
            // 'status_pengiriman' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'cancelled']),
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}

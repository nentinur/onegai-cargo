<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tracking>
 */
class TrackingFactory extends Factory
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
            'kode_pesanan' => $this->faker->unique()->word,
            'nama_pemesan' => $this->faker->name,
            'email_pemesan' => $this->faker->unique()->safeEmail,
            'no_hp_pemesan' => $this->faker->phoneNumber,
            'alamat_pemesan' => $this->faker->address,
            'nama_produk' => $this->faker->word,
            'jumlah_produk' => $this->faker->numberBetween(1, 100),
            'daerah_asal' => $this->faker->city,
            'daerah_tujuan' => $this->faker->city,
            'status_pengiriman' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'cancelled']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

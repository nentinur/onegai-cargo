<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
            'kode_resi' => 'ONE-' . date('dm') . strtoupper(Str::random(4)) . date('y'),
            'nama_penerima' => $this->faker->name,
            'no_telp_penerima' => $this->faker->phoneNumber,
            'destinasi' => $this->faker->randomElement(['jp_id', 'id_jp']),
            'alamat_penerima' => $this->faker->address,
            'berat_barang' => $this->faker->numberBetween(1, 10000), // in grams
            'created_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
            'updated_at' => now(),
        ];
    }
}

<?php

// database/seeders/IndonesiaSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndonesiaAddressSeeder extends Seeder
{
  public function run(): void
  {
    $provinces_json = file_get_contents(database_path('seeders/data/id_provinces.json'));
    $regencies_json = file_get_contents(database_path('seeders/data/id_regencies.json'));
    $districts_json = file_get_contents(database_path('seeders/data/id_districts.json'));
    $villages_json = file_get_contents(database_path('seeders/data/id_villages.json'));

    $provinces = json_decode($provinces_json, true);
    $regencies = json_decode($regencies_json, true);
    $districts = json_decode($districts_json, true);
    $villages = json_decode($villages_json, true);

    foreach ($provinces as $province) {
      DB::table('provinces')->insert([
        'id' => $province['id'],
        'name' => $province['name'],
      ]);
    }
    foreach ($regencies as $regency) {
      DB::table('regencies')->insert([
        'id' => $regency['id'],
        'province_id' => $regency['province_id'],
        'name' => $regency['name'],
      ]);
    }
    foreach ($districts as $district) {
      DB::table('districts')->insert([
        'id' => $district['id'],
        'regency_id' => $district['regency_id'],
        'name' => $district['name'],
      ]);
    }
    foreach ($villages as $village) {
      DB::table('villages')->insert([
        'id' => $village['id'],
        'district_id' => $village['district_id'],
        'name' => $village['name'],
      ]);
    }
  }
}

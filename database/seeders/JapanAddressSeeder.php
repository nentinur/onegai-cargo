<?php

// database/seeders/JapanSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JapanAddressSeeder extends Seeder
{
  public function run(): void
  {
    $prefectures_json = file_get_contents(database_path('seeders/data/jp_prefectures.json'));
    $cities_json = file_get_contents(database_path('seeders/data/jp_cities.json'));

    $prefectures = json_decode($prefectures_json, true);
    $cities = json_decode($cities_json, true);

    foreach ($prefectures as $prefecture) {
      DB::table('prefectures')->insert([
        'id' => $prefecture['prefecture_id'],
        'name' => $prefecture['prefecture_en'],
      ]);
    }
    foreach ($cities as $city) {
      DB::table('cities')->insert([
        'id' => $city['id'],
        'prefecture_id' => $city['prefecture_id'],
        'name' => $city['city_en'],
      ]);
    }
  }
}

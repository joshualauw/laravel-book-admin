<?php

namespace Database\Seeders;

use App\Models\Gudang;
use Illuminate\Database\Seeder;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gudang::create(
            [
                "nama" => "wareOne",
                "lokasi" => "Surabaya",
                "kapasitas" => "1000",
                "luas" => "100m"
            ]
        );
        Gudang::create(
            [
                "nama" => "wareTwo",
                "lokasi" => "Malang",
                "kapasitas" => "2000",
                "luas" => "200m"
            ]
        );
        Gudang::create(
            [
                "nama" => "wareThree",
                "lokasi" => "New York",
                "kapasitas" => "3000",
                "luas" => "300m"
            ]
        );
        Gudang::create(
            [
                "nama" => "wareFour",
                "lokasi" => "Tokyo",
                "kapasitas" => "4000",
                "luas" => "400m"
            ]
        );
        Gudang::create(
            [
                "nama" => "wareFive",
                "lokasi" => "Jakartai",
                "kapasitas" => "5000",
                "luas" => "500m"
            ]
        );
    }
}

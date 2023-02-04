<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create(
            [
                "kode" => "BNS001",
                "nama" => "Naruto Shippuden",
                "stok" => 10,
                "jenis_satuan" => "buah",
                "kategori_id" => 1,
                "harga" => 25000
            ]
        );
        Barang::create(
            [
                "kode" => "BHP001",
                "nama" => "Harry Potter",
                "stok" => 20,
                "jenis_satuan" => "buah",
                "kategori_id" => 2,
                "harga" => 250000
            ]
        );
        Barang::create(
            [
                "kode" => "BRZ001",
                "nama" => "Re Zero Hajimeru Isekai Seikatsu",
                "stok" => 30,
                "jenis_satuan" => "buah",
                "kategori_id" => 3,
                "harga" => 150000
            ]
        );
        Barang::create(
            [
                "kode" => "BFO001",
                "nama" => "Forbes",
                "stok" => 40,
                "jenis_satuan" => "buah",
                "kategori_id" => 4,
                "harga" => 75000
            ],
        );
        Barang::create(
            [
                "kode" => "BBL001",
                "nama" => "Belajar Laravel",
                "stok" => 50,
                "jenis_satuan" => "buah",
                "kategori_id" => 5,
                "harga" => 120000
            ]
        );
    }
}

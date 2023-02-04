<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create(
            [
                "nama" => "Komik"
            ]
        );
        Kategori::create(
            [
                "nama" => "Novel"
            ]
        );
        Kategori::create(
            [
                "nama" => "Light Novel"
            ]
        );
        Kategori::create(
            [
                "nama" => "Majalah"
            ]
        );
        Kategori::create(
            [
                "nama" => "Pendidikan"
            ]
        );
    }
}

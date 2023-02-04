<?php

namespace Database\Seeders;

use App\Models\DPengambilan;
use Illuminate\Database\Seeder;

class DPengambilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DPengambilan::create([
            "kode" => "BHP001",
            "jumlah" => 3,
            "pengambilan_id" => 1
        ]);

        DPengambilan::create([
            "kode" => "BRZ001",
            "jumlah" => 2,
            "pengambilan_id" => 1
        ]);

        DPengambilan::create([
            "kode" => "BFO001",
            "jumlah" => 4,
            "pengambilan_id" => 1
        ]);

        DPengambilan::create([
            "kode" => "BNS001",
            "jumlah" => 2,
            "pengambilan_id" => 2
        ]);

        DPengambilan::create([
            "kode" => "BRZ001",
            "jumlah" => 3,
            "pengambilan_id" => 2
        ]);

        DPengambilan::create([
            "kode" => "BRZ001",
            "jumlah" => 2,
            "pengambilan_id" => 3
        ]);

        DPengambilan::create([
            "kode" => "BNS001",
            "jumlah" => 4,
            "pengambilan_id" => 4
        ]);

        DPengambilan::create([
            "kode" => "BBL001",
            "jumlah" => 1,
            "pengambilan_id" => 5
        ]);

        //KHUSUS RETUR
        DPengambilan::create([
            "kode" => "BBL001",
            "jumlah" => 1,
            "pengambilan_id" => 6
        ]);
        DPengambilan::create([
            "kode" => "BFO001",
            "jumlah" => 1,
            "pengambilan_id" => 7
        ]);
        DPengambilan::create([
            "kode" => "BNS001",
            "jumlah" => 1,
            "pengambilan_id" => 8
        ]);
        DPengambilan::create([
            "kode" => "BRZ001",
            "jumlah" => 2,
            "pengambilan_id" => 9
        ]);
        DPengambilan::create([
            "kode" => "BBL001",
            "jumlah" => 1,
            "pengambilan_id" => 10
        ]);
    }
}

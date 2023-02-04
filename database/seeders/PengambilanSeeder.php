<?php

namespace Database\Seeders;

use App\Models\Pengambilan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PengambilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengambilan::create([
            "nik" => "PJW001",
            "nik_kd" => "PJW001",
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now(),
            "cancelled_at" => null,
            "created_at" => "2021-11-5 08:24:20"
        ]);

        Pengambilan::create([
            "nik" => "PNR001",
            "nik_kd" => "PJW001",
            "status" => "menunggu",
            "noticed_status" => "menunggu",
            "accepted_status" => "menunggu",
            "noticed_at" => null,
            "accepted_at" => null,
            "cancelled_at" => null,
            "created_at" => "2021-11-10 08:24:20"
        ]);

        Pengambilan::create([
            "nik" => "PAL001",
            "nik_kd" => "PAL001",
            "status" => "menunggu",
            "noticed_status" => "diterima",
            "accepted_status" => "menunggu",
            "noticed_at" => Carbon::now(),
            "accepted_at" => null,
            "cancelled_at" => null,
            "created_at" => "2021-11-15 08:24:20"
        ]);

        Pengambilan::create([
            "nik" => "PDT001",
            "nik_kd" => "PAL001",
            "status" => "menunggu",
            "noticed_status" => "menunggu",
            "accepted_status" => "menunggu",
            "noticed_at" => null,
            "accepted_at" => null,
            "cancelled_at" => null,
            "created_at" => "2021-11-29 08:24:20"
        ]);

        Pengambilan::create([
            "nik" => "PBA001",
            "nik_kd" => "PBA001",
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now(),
            "cancelled_at" => null,
            "created_at" => "2021-11-25 08:24:20"
        ]);

        //KHUSUS RETUR
        Pengambilan::create([
            "nik" => "PBA001",
            "nik_kd" => "PBA001",
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now(),
            "cancelled_at" => null,
            "created_at" => "2021-11-30 08:24:20"
        ]);

        Pengambilan::create([
            "nik" => "PDT001",
            "nik_kd" => "PAL001",
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now(),
            "cancelled_at" => null
        ]);

        Pengambilan::create([
            "nik" => "PBA001",
            "nik_kd" => "PBA001",
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now(),
            "cancelled_at" => null
        ]);

        Pengambilan::create([
            "nik" => "PNR001",
            "nik_kd" => "PJW001",
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now(),
            "cancelled_at" => null
        ]);

        Pengambilan::create([
            "nik" => "PDT001",
            "nik_kd" => "PAL001",
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now(),
            "cancelled_at" => null
        ]);
    }
}

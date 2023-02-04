<?php

namespace Database\Seeders;

use App\Models\Retur;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Retur::create([
            "pengambilan_id" => 6,
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now()
        ]);
        Retur::create([
            "pengambilan_id" => 7,
            "status" => "menunggu",
            "noticed_status" => "menunggu",
            "accepted_status" => "menunggu",
            "noticed_at" => null,
            "accepted_at" => null
        ]);
        Retur::create([
            "pengambilan_id" => 8,
            "status" => "menunggu",
            "noticed_status" => "diterima",
            "accepted_status" => "menunggu",
            "noticed_at" => Carbon::now(),
            "accepted_at" => null
        ]);
        Retur::create([
            "pengambilan_id" => 9,
            "status" => "menunggu",
            "noticed_status" => "menunggu",
            "accepted_status" => "menunggu",
            "noticed_at" => null,
            "accepted_at" => null
        ]);
        Retur::create([
            "pengambilan_id" => 10,
            "status" => "diterima",
            "noticed_status" => "diterima",
            "accepted_status" => "diterima",
            "noticed_at" => Carbon::now(),
            "accepted_at" => Carbon::now()
        ]);
    }
}

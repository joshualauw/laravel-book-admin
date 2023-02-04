<?php

namespace Database\Seeders;

use App\Models\JAccess;
use App\Models\Kategori;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            BarangSeeder::class,
            DepartemenSeeder::class,
            GudangSeeder::class,
            JabatanSeeder::class,
            KategoriSeeder::class,
            PegawaiSeeder::class,
            PengambilanSeeder::class,
            DPengambilanSeeder::class,
            ReturSeeder::class,
            AccessSeeder::class,
            JAccessSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create(
            [
                "nama" => "Kepala",
                "prioritas" => 1
            ]
        );
        Jabatan::create(
            [
                "nama" => "Manager",
                "prioritas" => 2
            ]
        );
        Jabatan::create(
            [
                "nama" => "Instructor",
                "prioritas" => 3
            ]
        );
        Jabatan::create(
            [
                "nama" => "Reguler",
                "prioritas" => 4
            ]
        );
        Jabatan::create(
            [
                "nama" => "Newbie",
                "prioritas" => 5
            ]
        );
    }
}

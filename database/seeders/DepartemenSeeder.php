<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departemen::create(
            [
                "nama" => "Gudang"
            ]
        );
        Departemen::create(
            [
                "nama" => "Pemasaran"
            ]
        );
        Departemen::create(
            [
                "nama" => "Keamanan"
            ]
        );
        Departemen::create(
            [
                "nama" => "Human Assets"
            ]
        );
        Departemen::create(
            [
                "nama" => "Accounting"
            ]
        );
    }
}

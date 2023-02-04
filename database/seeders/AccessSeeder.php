<?php

namespace Database\Seeders;

use App\Models\Access;
use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SUPER USER
        Access::create([
            "nik" => "PAD001",
            "jabatan_id" => 1,
            "master" => "barang",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);
        Access::create([
            "nik" => "PAD001",
            "jabatan_id" => 1,
            "master" => "kategori",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);
        Access::create([
            "nik" => "PAD001",
            "jabatan_id" => 1,
            "master" => "pegawai",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);
        Access::create([
            "nik" => "PAD001",
            "jabatan_id" => 1,
            "master" => "gudang",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);
        Access::create([
            "nik" => "PAD001",
            "jabatan_id" => 1,
            "master" => "departemen",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);
        Access::create([
            "nik" => "PAD001",
            "jabatan_id" => 1,
            "master" => "jabatan",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);

        //PEGAWAI 1
        Access::create([
            "nik" => "PJW001",
            "jabatan_id" => 1,
            "master" => "barang",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);

        Access::create([
            "nik" => "PJW001",
            "jabatan_id" => 1,
            "master" => "kategori",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);

        Access::create([
            "nik" => "PJW001",
            "jabatan_id" => 1,
            "master" => "pegawai",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);

        Access::create([
            "nik" => "PJW001",
            "jabatan_id" => 1,
            "master" => "gudang",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);

        Access::create([
            "nik" => "PJW001",
            "jabatan_id" => 1,
            "master" => "departemen",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);

        Access::create([
            "nik" => "PJW001",
            "jabatan_id" => 1,
            "master" => "jabatan",
            "create" => true,
            "read" => true,
            "update" => true,
            "delete" => true,
        ]);

        //PEGAWAI 2
        Access::create([
            "nik" => "PNR001",
            "jabatan_id" => 2,
            "master" => "barang",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PNR001",
            "jabatan_id" => 2,
            "master" => "kategori",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PNR001",
            "jabatan_id" => 2,
            "master" => "pegawai",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PNR001",
            "jabatan_id" => 2,
            "master" => "gudang",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PNR001",
            "jabatan_id" => 2,
            "master" => "departemen",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PNR001",
            "jabatan_id" => 2,
            "master" => "jabatan",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        //PEGAWAI 3
        Access::create([
            "nik" => "PAL001",
            "jabatan_id" => 1,
            "master" => "barang",
            "create" => false,
            "read" => true,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PAL001",
            "jabatan_id" => 1,
            "master" => "kategori",
            "create" => false,
            "read" => true,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PAL001",
            "jabatan_id" => 1,
            "master" => "pegawai",
            "create" => false,
            "read" => true,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PAL001",
            "jabatan_id" => 1,
            "master" => "gudang",
            "create" => false,
            "read" => true,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PAL001",
            "jabatan_id" => 1,
            "master" => "departemen",
            "create" => false,
            "read" => true,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PAL001",
            "jabatan_id" => 1,
            "master" => "jabatan",
            "create" => false,
            "read" => true,
            "update" => false,
            "delete" => false,
        ]);

        //PEGAWAI 4
        Access::create([
            "nik" => "PDT001",
            "jabatan_id" => 2,
            "master" => "barang",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PDT001",
            "jabatan_id" => 2,
            "master" => "kategori",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PDT001",
            "jabatan_id" => 2,
            "master" => "pegawai",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PDT001",
            "jabatan_id" => 2,
            "master" => "gudang",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PDT001",
            "jabatan_id" => 2,
            "master" => "departemen",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PDT001",
            "jabatan_id" => 2,
            "master" => "jabatan",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        //PEGAWAI 5
        Access::create([
            "nik" => "PBA001",
            "jabatan_id" => 1,
            "master" => "barang",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PBA001",
            "jabatan_id" => 1,
            "master" => "kategori",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PBA001",
            "jabatan_id" => 1,
            "master" => "pegawai",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PBA001",
            "jabatan_id" => 1,
            "master" => "gudang",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PBA001",
            "jabatan_id" => 1,
            "master" => "departemen",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);

        Access::create([
            "nik" => "PBA001",
            "jabatan_id" => 1,
            "master" => "jabatan",
            "create" => false,
            "read" => false,
            "update" => false,
            "delete" => false,
        ]);
    }
}

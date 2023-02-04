<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create(
            [
                "nik" => "PAD001",
                "username" => "admin",
                "password" => "nimda",
                "nama" => "administrator",
                "alamat" => "sidoarjo",
                "jabatan_id" => 1,
                "departemen_id" => null,
                "no_telp" => "0813912",
                "tgl_lahir" => "2001-1-3"
            ]
        );

        Pegawai::create(
            [
                "nik" => "PJW001",
                "username" => "joshua",
                "password" => "Joshua@1",
                "nama" => "Joshua William",
                "alamat" => "wiyung",
                "jabatan_id" => 1,
                "departemen_id" => 1,
                "no_telp" => "081001",
                "tgl_lahir" => "2001-4-5"
            ]
        );
        Pegawai::create(
            [
                "nik" => "PNR001",
                "username" => "nathan",
                "password" => "Nathan@2",
                "nama" => "Nathanael Richard",
                "alamat" => "wiyung",
                "jabatan_id" => 2,
                "departemen_id" => 1,
                "no_telp" => "081002",
                "tgl_lahir" => "2002-11-20"
            ]
        );
        Pegawai::create(
            [
                "nik" => "PAL001",
                "username" => "alex",
                "password" => "Alex@3",
                "nama" => "Alexander",
                "alamat" => "manukan",
                "jabatan_id" => 1,
                "departemen_id" => 2,
                "no_telp" => "081003",
                "tgl_lahir" => "2001-8-2"
            ]
        );
        Pegawai::create(
            [
                "nik" => "PDT001",
                "username" => "dominic",
                "password" => "Dom@4",
                "nama" => "Dominic Torreto",
                "alamat" => "darmo",
                "jabatan_id" => 2,
                "departemen_id" => 2,
                "no_telp" => "081004",
                "tgl_lahir" => "2001-12-3"
            ]
        );
        Pegawai::create(
            [
                "nik" => "PBA001",
                "username" => "bambang",
                "password" => "Bam@5",
                "nama" => "Bambang",
                "alamat" => "babatan",
                "jabatan_id" => 1,
                "departemen_id" => 3,
                "no_telp" => "081005",
                "tgl_lahir" => "2001-4-5"
            ]
        );
    }
}

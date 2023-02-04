<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Rules\dateRule;
use App\Rules\uniqueRule;
use Faker\UniqueGenerator;
use App\Rules\nikFormatRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class FormValidation extends Controller
{
    public static function pegawaiValidate($request, $parent)
    {
        $rules = [
            // "nik" => ['required', 'regex:/^([P])([A-Z]){2}([0-9]){3}$/'],
            "username" => ['required', 'min:4', 'max:16', 'regex:/^([a-z0-9._])*$/', Rule::unique("pegawai", "username")->ignore($request->id, "nik")],
            "password" => ['required', 'min:3', 'max:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[@#$%^&+=]).*$/'],
            "nama" => ['required', 'regex:/^([A-Z][a-z.,\s]+)+$/'],
            "jabatan_id" => 'required',
            "departemen_id" => 'required',
            "alamat" => ['regex:/^([A-Za-z0-9.])*$/'],
            "no_telp" => ['min:5', 'max:16', 'regex:/^([0-9-+ ])*$/', Rule::unique("pegawai", "username")->ignore($request->id, "nik")],
            'tgl_lahir' => ['required', 'date', new dateRule($request->tgl_lahir)]
        ];

        $parent->validate($request, $rules);
    }

    public static function barangValidate($request, $parent)
    {
        $rules = [
            // "kode" => ['required', 'regex:/^([B])([A-Z]){2}([0-9]){3}$/'],
            "nama" => ['required', 'regex:/^([A-Z][a-z.\s]+)+$/'],
            "stok" => ['required', 'gt:0'],
            "kategori" => ['required'],
            "jenis_satuan" => ["alpha-num"],
            "harga" => ['required', 'gt:0'],
        ];
        $parent->validate($request, $rules);
    }

    public static function kategoriValidate($request, $parent)
    {
        $rules = [
            "nama" => ['required', 'regex:/^([a-zA-Z0-9 ])*$/'],
        ];

        $parent->validate($request, $rules);
    }


    public static function autogen($string, $table, $prefix, $column)
    {
        $pid = $table::withTrashed()->select($column)->get();
        if (strpos($string, " ")) {
            $str = substr($string, 0, 1) . substr($string, strpos($string, " ") + 1, 1);
        } else {
            $str = substr($string, 0, 2);
        }
        $str = strtoupper($str);

        $list = [];
        foreach ($pid as $id) {
            $substr = substr($id->$column, 1, 2);
            if ($substr == $str) {
                array_push($list, substr($id->$column, 3, 3));
            }
        }

        if (count($list) != 0) {
            $ctr = max($list) + 1;
        } else {
            $ctr = 1;
        }

        return $prefix . $str . str_pad($ctr, 3, "0", STR_PAD_LEFT);
    }
}

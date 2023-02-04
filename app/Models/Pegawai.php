<?php

namespace App\Models;

use App\Models\Access;
use App\Models\Jabatan;
use App\Models\Departemen;
use App\Models\Pengambilan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "pegawai";
    protected $primaryKey = "nik";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
        "nik", "username", "password", "nama", "alamat", "jabatan_id", "departemen_id", "no_telp", "tgl_lahir"
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function pengambilan()
    {
        return $this->hasMany(Pengambilan::class, "nik");
    }

    public function access()
    {
        return $this->hasMany(Access::class, "nik");
    }

    public function menyetujui()
    {
        return $this->hasMany(Pengambilan::class, "nik_kd", "nik");
    }
}

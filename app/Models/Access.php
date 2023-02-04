<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Access extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "access";
    protected $fillable = [
        "nik", "jabatan_id", "master", "create", "read", "update", "delete", "jcreate", "jread", "jupdate", "jdelete"
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, "nik");
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}

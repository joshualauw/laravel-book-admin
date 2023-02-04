<?php

namespace App\Models;

use App\Models\Access;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "jabatan";
    protected $fillable = [
        "nama", "prioritas"
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }

    public function access()
    {
        return $this->hasMany(JAccess::class);
    }
}

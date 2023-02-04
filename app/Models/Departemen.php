<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departemen extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "departemen";
    protected $fillable = [
        "nama"
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}

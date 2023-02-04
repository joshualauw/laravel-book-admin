<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DPengambilan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "dpengambilan";
    protected $fillable = [
        "kode", "jumlah", "pengambilan_id"
    ];

    public function pengambilan()
    {
        return $this->belongsTo(Pengambilan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, "kode");
    }
}

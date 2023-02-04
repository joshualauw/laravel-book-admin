<?php

namespace App\Models;

use App\Models\DPengambilan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "barang";
    protected $primaryKey = "kode";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "kode", "nama", "stok", "jenis_satuan", "kategori_id", "harga"
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function dpengambilan()
    {
        return $this->hasMany(DPengambilan::class, "kode");
    }
}

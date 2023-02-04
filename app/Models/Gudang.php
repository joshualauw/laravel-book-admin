<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gudang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "gudang";
    protected $fillable = [
        "nama", "lokasi", "kapasitas", "luas"
    ];
}

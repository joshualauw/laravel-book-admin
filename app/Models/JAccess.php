<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JAccess extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "jaccess";
    protected $fillable = [
        "jabatan_id", "master", "create", "read", "update", "delete"
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}

<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengambilan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "pengambilan";
    protected $fillable = [
        "nik", "nik_kd", "status",  "noticed_status",  "accepted_status", "noticed_at", "accepted_at", "cancelled_at"
    ];

    public function pemohon()
    {
        return $this->belongsTo(Pegawai::class, "nik");
    }

    public function dpengambilan()
    {
        return $this->hasMany(DPengambilan::class);
    }

    public function retur()
    {
        return $this->hasOne(Retur::class, "pengambilan_id");
    }

    public function penyetuju()
    {
        return $this->belongsTo(Pegawai::class, "nik_kd", "nik");
    }

    public function statusColor($statusType)
    {
        $status = $this->$statusType;
        if ($status == "menunggu") {
            return "#c29519";
        } else if ($status == "diterima") {
            return "#4dab3a";
        } else {
            return "#f22c16";
        }
    }

    public function checkStatus()
    {
        if ($this->noticed_status == "diterima" && $this->accepted_status == "diterima") {
            $this->status = "diterima";
        }
        if ($this->noticed_status == "ditolak" || $this->accepted_status == "ditolak") {
            $this->status = "ditolak";
        }
        return $this->status;
    }
}

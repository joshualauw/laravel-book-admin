<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retur extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "retur";
    protected $fillable = [
        "pengambilan_id", "status", "noticed_status", "accepted_status", "noticed_at", "accepted_at"
    ];

    public function pengambilan()
    {
        return $this->belongsTo(Pengambilan::class, "pengambilan_id");
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

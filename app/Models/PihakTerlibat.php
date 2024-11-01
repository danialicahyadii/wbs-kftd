<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PihakTerlibat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pengaduan()
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'pengaduan_id');
    }
    public function scopeUnseen($query)
    {
        return $query->where('is_seen', false);
    }
    public function replies()
    {
        return $this->hasMany(Komentar::class, 'parent_id'); // Asumsi kolom 'parent_id' digunakan untuk menandakan balasan
    }

}

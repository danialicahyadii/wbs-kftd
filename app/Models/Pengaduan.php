<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function fileBukti()
    {
        return $this->hasMany(FileBukti::class);
    }

    public function statusPengaduan()
    {
        return $this->belongsTo(Status::class, 'status');
    }

}

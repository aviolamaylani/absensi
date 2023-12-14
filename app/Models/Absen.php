<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
        'keterangan',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}

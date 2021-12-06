<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    // use HasFactory;

    protected $fillable = [
        'rs_nama', 'rs_kondisi', 'rs_lokasi'
    ];

    protected $hidden = [
        //
    ];

    protected $table = 'tbl_rs';

    public function pesan()
    {
        return $this->hasMany(Pemesanan::class, 'rs_id', 'id');
    }
    public function user()
    {
        return $this->hasMany(Pemesanan::class, 'user_asalrs', 'id');
    }
}

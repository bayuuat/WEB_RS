<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    // use HasFactory;

    protected $fillable = [
        'rs_nama', 'rs_kondisi', 'rs_lokasi', 'rs_optimal'
    ];

    protected $hidden = [
        //
    ];

    protected $table = 'tbl_rs';

    public $timestamps = false;

    public function pesan()
    {
        return $this->hasMany(Pemesanan::class, 'rs_id', 'id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'user_asalrs', 'id');
    }
    public function alat()
    {
        return $this->hasMany(Logistik::class, 'rs_id', 'id');
    }
}

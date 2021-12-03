<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanan_nama', 'pemesanan_telp', 'pemesanan_deskripsi', 'rs_id'
    ];

    protected $hidden = [
        //
    ];

    protected $table = 'tbl_pesan';

    public $timestamps = false;

    public function rumahsakit()
    {
        return $this->belongsTo(RumahSakit::class, 'rs_id', 'id');
    }
}

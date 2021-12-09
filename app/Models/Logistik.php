<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'alat_kondisi', 'rs_id'
    ];

    protected $hidden = [
        //
    ];

    protected $table = 'tbl_alat';

    public $timestamps = false;

    public function rumahsakit()
    {
        return $this->belongsTo(RumahSakit::class, 'rs_id', 'id');
    }
}

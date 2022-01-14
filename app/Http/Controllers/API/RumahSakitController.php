<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Logistik;
use App\Models\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RumahSakitController extends Controller
{
    public function all()
    {
        $items = DB::select('select tbl_rs.id, SUM(case tbl_alat.alat_kondisi when 0 then 1 else 0 end) as tersedia from tbl_rs
          left join tbl_alat on tbl_rs.id = tbl_alat.rs_id GROUP BY tbl_rs.id');
        $rumah = RumahSakit::with('logistik');
        if ($items) {
            return ResponseFormatter::success(
                $items,
                'Data alat berhasil diambil',
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data alat tidak diterima',
                404
            );
        }
    }
}

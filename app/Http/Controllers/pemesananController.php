<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PemesananRequest;
use App\Models\Logistik;
use App\Models\Pemesanan;
use App\Models\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class pemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = RumahSakit::all()->where('id', '>', 1);
        $alat_tersedia = Logistik::all()->where('alat_kondisi', '=', 0);

        // var_dump($items);

        return view('pages.home', [
            'items' => $items,
            'alat_siap' => $alat_tersedia
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pemesanan($id)
    {
        $item = RumahSakit::findOrFail($id);

        return view('pages.pesan', [
            'item' => $item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemesananRequest $request, $id)
    {
        $data = $request->all();
        $data['rs_id'] = $id;

        $send = Pemesanan::create($data);
        if ($send) {
            return redirect('/')->with('success', 'Tunggu beberapa saat, pihak rumah sakit akan menghubungi!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

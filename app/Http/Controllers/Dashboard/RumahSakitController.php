<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PemesananRequest;
use App\Http\Requests\RumahSakitRequest;
use App\Models\Pemesanan;
use App\Models\RumahSakit;
use App\Models\User;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RumahSakit::all();
        return view('dashboard.rumahsakit.index', [
            'items' => $items
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
        return view('dashboard.rumahsakit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RumahSakitRequest $request)
    {
        $data = $request->all();
        $data['rs_kondisi'] = 0;

        RumahSakit::create($data);

        return redirect()->route('rs.index');
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
        $item = RumahSakit::findOrFail($id);

        return view('dashboard.rumahsakit.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RumahSakitRequest $request, $id)
    {
        $data = $request->all();

        $item = RumahSakit::findOrFail($id);
        $item->update($data);

        return redirect()->route('rs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RumahSakit::findOrFail($id);
        $item->delete();

        return redirect()->route('rs.index');
    }
}

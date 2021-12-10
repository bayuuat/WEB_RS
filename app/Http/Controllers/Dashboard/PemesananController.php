<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PemesananRequest;
use App\Models\Pemesanan;
use App\Models\RumahSakit;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\support\facades\Auth;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->roles;

        if ($role == 'ADMIN') {
            $items = Pemesanan::with(['rumahsakit'])->get();
        } else if ($role == 'USER') {
            $asalrs = Auth::user()->user_asalrs;
            $items = Pemesanan::with(['rumahsakit'])->where('rs_id', '=', $asalrs)->get();
        }

        return view('dashboard.pemesanan.index', [
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
            return redirect('/');
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

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Logistik;
use App\Models\RumahSakit;
use Illuminate\Http\Request;
use illuminate\support\facades\Auth;

class LogistikController extends Controller
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
            $items = Logistik::with(['rumahsakit'])->get();
            $rs = null;
        } else if ($role == 'USER') {
            $asalrs = Auth::user()->user_asalrs;
            $items = Logistik::with(['rumahsakit'])->where('rs_id', '=', $asalrs)->get();
            $rs = RumahSakit::where('id', $asalrs)->first();
        }
        return view('dashboard.logistik.index', [
            'items' => $items,
            'rs' => $rs
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
        $item = RumahSakit::all();
        return view('dashboard.logistik.create', [
            'item' => $item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Auth::user()->roles;

        if ($role == 'ADMIN') {
            $request->validate([
                'rs_id' => 'required',
            ]);

            $input = $request->all();
            $input['alat_kondisi'] = 0;

            $send = Logistik::create($input);
            if ($send) {
                return redirect()->route('logistik.index');
            }
        }

        if ($role == 'USER') {
            $input['rs_id'] = Auth::user()->user_asalrs;
            $input['alat_kondisi'] = 0;

            $send = Logistik::create($input);
            if ($send) {
                return redirect()->route('logistik.index');
            }
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
        $item = Logistik::findOrFail($id);
        $rs = RumahSakit::all();

        return view('dashboard.logistik.edit', [
            'item' => $item,
            'rs' => $rs,
        ]);
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
        $request->validate([
            'rs_id' => 'required',
        ]);

        $input = $request->all();
        $input['alat_kondisi'] = 0;

        $item = Logistik::findOrFail($id);
        $item->update($input);
        return redirect()->route('logistik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Logistik::findOrFail($id);
        $item->delete();

        return redirect()->route('logistik.index');
    }
}

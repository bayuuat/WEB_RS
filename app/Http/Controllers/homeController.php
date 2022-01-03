<?php

namespace App\Http\Controllers;

use App\Http\Requests\RumahSakitRequest;
use App\Models\RumahSakit;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $items = RumahSakit::all();
        return view('dashboard.admin', [
            'items' => $items
        ]);
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);
        $rs = RumahSakit::all();
        return view('dashboard.editprofile', [
            'item' => $item,
            'rs' => $rs,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function optimasi()
    {
        return view('dashboard.optimasi');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateOptimasi(Request $request, $id)
    {
        $data = $request->all();

        $item = RumahSakit::findOrFail($id);
        $item->update($data);

        return redirect()->route('logistik.index');
    }
}

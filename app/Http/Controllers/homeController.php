<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
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

    public function dashboardUser()
    {
        $items = RumahSakit::all();
        return view('dashboard.user', [
            'items' => $items
        ]);
    }
}

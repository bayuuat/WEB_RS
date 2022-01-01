<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $items = RumahSakit::all()->where('id', '>', 1);
        return view('register.index', [
            'item' => $items,
            'title' => 'Register'
        ]);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_nama' => 'required|string|max:50',
            'user_email' => 'required|email|unique:tbl_user',
            'user_ttl' => 'required|date',
            'roles' => 'string|in:ADMIN,USER',
            'user_asalrs' => 'required|string',
            'user_kode' => 'required|unique:tbl_user',
            'password' => 'required|min:5|max:16|confirmed',
            'user_telp' => 'required',
            'user_foto' => 'image',
        ]);

        $validateData['password'] = Hash::make($request->password);
        $validateData['roles'] = 'USER';
        $validateData['user_foto'] = 'image/default.jpg';

        User::create($validateData);

        $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login');
    }

    // public function create()
    // {

    // }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }


    public function store(UserRequest $request)
    {
        $data = request()->all();
        $validateData = $request->validate([
            'user_nama' => 'required|string|max:50',
            'user_email' => 'required|email|unique:tbl_user',
            'user_ttl' => 'required|date',
            'roles' => 'string|in:ADMIN,USER',
            'user_asalrs' => 'required|string',
            'user_kode' => 'string|unique:tbl_user',
            'user_password' => 'required|min:5|max:16',
            'user_telp'=>'required'
        ]);
        
        $validateData['user_password'] = Hash::make($request->user_password);
        $validateData['roles'] = 'ADMIN';

        User::create($validateData);

        $request->session()->flash('success', 'Registration successfull! Please login');



        // return redirect('/');
    }

    // public function create()
    // {

    // }
}
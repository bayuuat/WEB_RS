<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\support\facades\Auth;
use App\Models\Activity;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'user_email' => 'required|email:dns',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $validateData['id_user'] = Auth::user()->id;
            $validateData['activity'] = 1;

            date_default_timezone_set('Asia/Jakarta');
            $validateData['time'] = Carbon::now()->toDateTimeString();
            Activity::create($validateData);

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        $validateData['id_user'] = Auth::user()->id;
        $validateData['activity'] = 2;

        date_default_timezone_set('Asia/Jakarta');
        $validateData['time'] = Carbon::now()->toDateTimeString();
        Activity::create($validateData);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

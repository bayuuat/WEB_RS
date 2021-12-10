<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\RumahSakit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use illuminate\support\facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
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
            $items = User::with(['rumahsakit'])->get();
        } else if ($role == 'USER') {
            $asalrs = Auth::user()->user_asalrs;
            $items = User::with(['rumahsakit'])->where('user_asalrs', '=', $asalrs)->get();
        }

        return view('dashboard.user.index', [
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
        $item = RumahSakit::all();
        return view('dashboard.user.create', [
            'item' => $item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($request->password);
        if ($validated['roles'] == 'ADMIN') {
            $validated['user_asalrs'] = 1;
        }

        $send = User::create($validated);
        if ($send) {
            return redirect()->route('user.index');
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
        $item = User::findOrFail($id);
        $rs = RumahSakit::all();

        return view('dashboard.user.edit', [
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
    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();
        if ($validated['roles'] == 'ADMIN') {
            $validated['user_asalrs'] = 1;
        }

        $item = User::findOrFail($id);
        $item->update($validated);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index');
    }
}

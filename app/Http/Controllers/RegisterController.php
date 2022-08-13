<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index', [
            'title' => 'Daftar Akun',
            'judul' => 'Daftar Akun',
            'request' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8', 'max:20', 'confirmed']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        if ($request->jabatan == 1) {
            User::where('email', $validatedData['email'])->update(['is_marketing' => true]);
        } elseif ($request->jabatan == 2) {
            User::where('email', $validatedData['email'])->update(['is_analis' => true]);
        } elseif ($request->jabatan == 3) {
            User::where('email', $validatedData['email'])->update(['is_komite1' => true]);
        } elseif ($request->jabatan == 4) {
            User::where('email', $validatedData['email'])->update(['is_komite2' => true]);
        }
        return redirect('/register')->with('berhasil', "Berhasil menambahkan akun " . $validatedData['name']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $register
     * @return \Illuminate\Http\Response
     */
    public function show(User $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(User $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $register)
    {
        User::destroy($register->id);

        return redirect('/register')->with('berhasil', 'Berhasil menghapus akun');
    }
}

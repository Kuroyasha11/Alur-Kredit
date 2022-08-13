<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Komite1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('komite1.index', [
            'title' => 'Daftar Pemohon Kredit',
            'judul' => 'Daftar Pemohon Kredit',
            'request' => Applicant::latest()->where('submitmarketing', 1)->where('submitanalis', 1)->where('selesaimanajer', 0)->where('selesaidirut', 0)->get()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $manajer
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $manajer)
    {
        Session::put('show', request()->fullUrl());
        return view('komite1.show', [
            'title' => 'Pemohon Kredit ' . $manajer->nama,
            'judul' => 'Pemohon Kredit ' . $manajer->nama,
            'request' => $manajer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $manajer
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $manajer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $manajer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $manajer)
    {
        if ($request->selesaimanajer == 1 && $request->selesaidirut == 0) {
            $validatedData = $request->validate([
                'selesaimanajer' => 'required'
            ]);

            Applicant::where('id', $manajer->id)->update($validatedData);

            return redirect('/manajer')->with('berhasil', 'Berhasil mengirim data pemohon ke komite dirut');
        } elseif ($request->selesaimanajer == 1 && $request->selesaidirut == 1) {
            $validatedData = $request->validate([
                'selesaimanajer' => 'required',
                'selesaidirut' => 'required'
            ]);

            Applicant::where('id', $manajer->id)->update($validatedData);

            return redirect('/manajer')->with('berhasil', 'Data pemohon telah di approve, silahkan cek menu arsip');
        } elseif ($request->submitanalis == 0) {
            $validatedData = $request->validate([
                'submitanalis' => 'required'
            ]);

            Applicant::where('id', $manajer->id)->update($validatedData);

            return redirect('/manajer')->with('berhasil', 'Berhasil mengirim data pemohon ke analis');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $manajer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $manajer)
    {
        //
    }
}

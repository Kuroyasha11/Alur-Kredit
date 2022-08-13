<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Komite2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('komite2.index', [
            'title' => 'Daftar Pemohon Kredit',
            'judul' => 'Daftar Pemohon Kredit',
            'request' => Applicant::latest()->where('submitmarketing', 1)->where('submitanalis', 1)->where('selesaimanajer', 1)->where('selesaidirut', 0)->get()
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
     * @param  \App\Models\Applicant  $dirut
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $dirut)
    {
        Session::put('show', request()->fullUrl());
        return view('komite2.show', [
            'title' => 'Pemohon Kredit ' . $dirut->nama,
            'judul' => 'Pemohon Kredit ' . $dirut->nama,
            'request' => $dirut
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $dirut
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $dirut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $dirut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $dirut)
    {
        if ($request->selesaidirut == 1) {
            $validatedData = $request->validate([
                'selesaidirut' => 'required'
            ]);

            Applicant::where('id', $dirut->id)->update($validatedData);

            return redirect('/dirut')->with('berhasil', 'Data pemohon telah di approve dan akan tersimpan di admin');
        } elseif ($request->submitanalis == 0 && $request->selesaimanajer == 0) {
            $validatedData = $request->validate([
                'submitanalis' => 'required',
                'selesaimanajer' => 'required'
            ]);

            Applicant::where('id', $dirut->id)->update($validatedData);

            return redirect('/dirut')->with('berhasil', 'Berhasil mengirim data pemohon ke analis');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $dirut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $dirut)
    {
        //
    }
}

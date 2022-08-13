<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('arsip.index', [
            'title' => 'Arsip Pemohon Kredit',
            'judul' => 'Arsip Pemohon Kredit',
            'request' => Applicant::latest()->where('submitmarketing', 1)->where('submitanalis', 1)->where('selesaimanajer', 1)->where('selesaidirut', 1)->get()
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
     * @param  \App\Models\Applicant  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $arsip)
    {
        Session::put('show', request()->fullUrl());
        return view('arsip.show', [
            'title' => 'Pemohon Kredit ' . $arsip->nama,
            'judul' => 'Pemohon Kredit ' . $arsip->nama,
            'request' => $arsip
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $arsip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $arsip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $arsip)
    {
        //
    }
}

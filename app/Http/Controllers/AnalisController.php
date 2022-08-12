<?php

namespace App\Http\Controllers;

use App\Models\Analyst;
use App\Models\Applicant;
use Illuminate\Http\Request;

class AnalisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('analis.index', [
            'title' => 'Daftar Pemohon Kredit',
            'judul' => 'Daftar Pemohon Kredit',
            'request' => Applicant::latest()->where('submit', 1)->where('selesai', 0)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('analis.create', [
            'title' => 'Analis Pemohon Kredit',
            'judul' => 'Analis Pemohon Kredit',
        ]);
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
     * @param  \App\Models\Analyst  $anali
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $anali)
    {
        return view('analis.show', [
            'title' => 'Pemohon Kredit ' . $anali->nama,
            'judul' => 'Pemohon Kredit ' . $anali->nama,
            'request' => $anali
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Analyst  $anali
     * @return \Illuminate\Http\Response
     */
    public function edit(Analyst $anali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Analyst  $anali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analyst $anali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analyst  $anali
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analyst $anali)
    {
        //
    }
}

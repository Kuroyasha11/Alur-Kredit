<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('marketing.index', [
            'title' => 'Daftar Pemohon Kredit',
            'judul' => 'Daftar Pemohon Kredit',
            'request' => Applicant::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketing.create', [
            'title' => 'Daftar Pemohon Kredit',
            'judul' => 'Daftar Pemohon Kredit',
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
     * @param  \App\Models\Applicant  $marketing
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $marketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $marketing
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $marketing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $marketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $marketing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $marketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $marketing)
    {
        //
    }
}
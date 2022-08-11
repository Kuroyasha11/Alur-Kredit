<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Archive;
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
        // $rule1 = [
        //     'nik' => ['required', 'numeric', 'digits:16'],
        //     'nama' => ['required', 'min:3', 'max:25'],
        //     'alamat' => ['required', 'max:100'],
        //     'status' => ['required'],
        //     'namainstansi' => ['required', 'min:3', 'max:100'],
        //     'alamatinstansi' => ['required', 'max:100'],
        //     'jabatan' => ['required'],
        // ];

        $rule2  = [
            'image' => ['required', 'file', 'max:10240']
        ];

        // $validatedData1 = $request->validate($rule1);
        $validatedData2 = $request->validate($rule2);


        $data = $request->file('image');
        $validatedData2['image'] = $request->file('image')->store('arsip');
        // foreach ($data as $item) {
        //     $validatedData2['applicant_id'] = 1;
        //     $validatedData2['nik'] = 442460;
        //     $validatedData2['image'] = $item->store('arsip');

        // }
        Archive::create($validatedData2);

        return redirect('/marketing');
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

<?php

namespace App\Http\Controllers;

use App\Models\Analyst;
use App\Models\Applicant;
use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
            'request' => Applicant::latest()->where('submitmarketing', 1)->where('submitanalis', 0)->where('selesaimanajer', 0)->where('selesaidirut', 0)->get()
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
     * @param  \App\Models\Analyst  $anali
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $anali)
    {
        Session::put('show', request()->fullUrl());
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
        if ($request->input == 1) {
            // Penghasilan
            $rule1 = [
                'gaji' => ['required', 'numeric', 'min:1'],
                'biaya' => ['required', 'numeric', 'min:1'],
                'kewajiban' => ['required', 'numeric', 'min:1'],
            ];

            $validatedData1 = $request->validate($rule1);

            Analyst::where('id', $anali->id)->update($validatedData1);
        } elseif ($request->input == 2) {
            // Permohonan
            $rule1 = [
                'plafon' => ['required', 'numeric', 'min:1'],
                'tenor' => ['required', 'numeric', 'min:1'],
                'angsuran' => ['required', 'numeric', 'min:1'],
            ];

            $validatedData1 = $request->validate($rule1);

            Analyst::where('id', $anali->id)->update($validatedData1);
        } elseif ($request->submitanalis == 1) {
            $validatedData = $request->validate([
                'submitanalis' => 'required'
            ]);

            Applicant::where('id', $anali->applicant_id)->update($validatedData);

            return redirect('/analis')->with('berhasil', 'Berhasil mengirim data pemohon ke komite');
        } elseif ($request->submitmarketing == 0) {
            $validatedData = $request->validate([
                'submitmarketing' => 'required'
            ]);

            Applicant::where('id', $anali->applicant_id)->update($validatedData);

            return redirect('/analis')->with('berhasil', 'Berhasil mengirim data pemohon ke Marketing');
        }

        return redirect(session('show'))->with('berhasil', 'Berhasil memperbarui informasi pemohon');
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

    public function inputdata(Request $inputdata)
    {
        return view('analis.inputdata', [
            'title' => 'Analis Pemohon Kredit',
            'judul' => 'Analis Pemohon Kredit',
            'request' => $inputdata,
            'analis' => Analyst::all()->where('applicant_id', $inputdata->id)->first(),
            'arsip' => Archive::where('applicant_id', $inputdata->id)
        ]);
    }
}

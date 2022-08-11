<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Archive;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'request' => Applicant::latest()->where('submit', 0)->where('selesai', 0)->get()
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
        $rule1 = [
            'nik' => ['required', 'numeric', 'digits:16', 'unique:applicants'],
            'nama' => ['required', 'min:3', 'max:25'],
            'alamat' => ['required', 'max:100'],
            'status' => ['required'],
            'namainstansi' => ['required', 'min:3', 'max:100'],
            'alamatinstansi' => ['required', 'max:100'],
            'jabatan' => ['required'],
        ];

        $validatedData1 = $request->validate($rule1);

        Applicant::insert($validatedData1);

        if ($request->file('image')) {
            $cekid = Applicant::all()->where('nik', $validatedData1['nik'])->where('nama', $validatedData1['nama'])->first();

            $data = $request->file('image');
            foreach ($data as $item) {
                $image = new Archive;

                $path = $item->store('arsip/' . Carbon::now()->isoFormat('DD MMMM Y'));
                $image->image = $path;
                $image->applicant_id = $cekid->id;
                $image->nik = $cekid->nik;

                $image->save();
            }
        }

        return redirect('/marketing')->with('berhasil', 'Berhasil menambah pemohon ' . $validatedData1['nama']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $marketing
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $marketing)
    {
        return view('marketing.show', [
            'title' => 'Pemohon Kredit ' . $marketing->nama,
            'judul' => 'Pemohon Kredit ' . $marketing->nama,
            'request' => $marketing
        ]);
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
        $validatedData = $request->validate([
            'selesai' => 'required'
        ]);

        Applicant::where('id', $marketing->id)->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $marketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $marketing)
    {
        Applicant::destroy($marketing->id);

        Archive::where('applicant_id', $marketing->id)->delete();

        return redirect('/marketing')->with('berhasil', 'Berhasil menghapus data pemohon');
    }
}

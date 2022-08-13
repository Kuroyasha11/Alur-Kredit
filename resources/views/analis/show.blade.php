@extends('layouts.main')

@section('container')
    <div class="col-lg-15">
        <div class="row">
            <div class="d-flex justify-content-start">
                <a href="/analis/create" class="btn btn-success">Analis</a>
                {{-- <form action="/analis/{{ $request->id }}" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="submitanalis" value="1">
                    <button <abbr title="Submit" class="btn btn-success" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-check-lg"></i>
                    </button>
                </form>
                <form action="/analis/{{ $request->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button <abbr title="Delete" class="btn btn-danger mx-2" onclick="return confirm('Are you sure?')">
                        <i class="bi bi-x-circle"></i>
                    </button>
                </form> --}}
            </div>
            <div class="table-responsive col-lg-15 mb-5">
                <table class="table table-sm">
                    <thead>
                        <tr align="center">
                            <th scope="col">Data</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nomor Induk Kependudukan</td>
                            <td>: {{ $request->nik }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $request->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $request->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $request->status }}</td>
                        </tr>
                        <tr>
                            <td>Nama Instansi</td>
                            <td>: {{ $request->namainstansi }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Instansi</td>
                            <td>: {{ $request->alamatinstansi }}</td>
                        </tr>
                        <tr>
                            <td>Golongan/Jabatan</td>
                            <td>: {{ $request->jabatan }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-lg-15">
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <div class="card">
                                <div class="gallery">
                                    @php
                                        $arsip = App\Models\Archive::getArchiveByApplicantId($request->id);
                                    @endphp
                                    @foreach ($arsip as $item)
                                        <img src="/storage/{{ $item->image }}" class="img-preview img-fluid mx-2 my-2"
                                            style="width: :500px; height:150px;">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="/analis" class="btn btn-warning my-2 mx-2">Kembali</a>
                </div>
                <div id="fullpage" onclick="this.style.display='none';"></div>
            </div>
        </div>
    </div>
@endsection

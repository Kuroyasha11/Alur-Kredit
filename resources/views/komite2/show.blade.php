@extends('layouts.main')

@section('container')
    @php
    $total = $request->analyst->gaji - $request->analyst->biaya - $request->analyst->kewajiban;
    @endphp
    <div class="col-lg-15">
        <div class="row">
            <div class="d-flex justify-content-start">
                <!-- Button trigger modal penghasilan-->
                {{-- <button <abbr title="Informasi Penghasilan" type="button" class="btn btn-warning my-2 mx-2"
                    data-bs-toggle="modal" data-bs-target="#penghasilan">
                    <i class="bi bi-cash"></i>
                </button> --}}
                <!-- Button trigger modal permohonan-->
                {{-- <button <abbr title="Permohonan Kredit" type="button" class="btn btn-info my-2 mx-2" data-bs-toggle="modal"
                    data-bs-target="#permohonan">
                    <i class="bi bi-credit-card-2-front-fill"></i>
                </button> --}}
                <form action="/dirut/{{ $request->id }}" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="submitanalis" value="0">
                    <input type="hidden" name="selesaimanajer" value="0">
                    <button <abbr title="Batalkan" class="btn btn-danger my-2 mx-2"
                        onclick="return confirm('Are you sure?')">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </form>
                @if (auth()->user()->is_komite2)
                    <form action="/dirut/{{ $request->id }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="selesaidirut" value="1">
                        <button <abbr title="Submit" class="btn btn-success my-2 mx-2"
                            onclick="return confirm('Are you sure?')">
                            <i class="bi bi-check-lg"></i>
                        </button>
                    </form>
                @endif
                {{-- @if ($request->analyst->gaji != null && $request->analyst->angsuran != null)
                    @if ($total > $request->analyst->angsuran)
                        <form action="/dirut/{{ $request->id }}" method="post">
                            @method('put')
                            @csrf
                            <input type="hidden" name="submitanalis" value="1">
                            <button <abbr title="Submit" class="btn btn-success my-2 mx-2"
                                onclick="return confirm('Are you sure?')">
                                <i class="bi bi-check-lg"></i>
                            </button>
                        </form>
                    @endif
                @endif --}}
                {{-- <form action="/dirut/{{ $request->id }}" method="post">
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
                        @if ($request->analyst->gaji != null)
                            <tr>
                                <td>Gaji Perbulan</td>
                                <td>: @IDR($request->analyst->gaji)</td>
                            </tr>
                        @endif
                        @if ($request->analyst->biaya != null)
                            <tr>
                                <td>Biaya-Biaya Perbulan</td>
                                <td>: @IDR($request->analyst->biaya)</td>
                            </tr>
                        @endif
                        @if ($request->analyst->kewajiban != null)
                            <tr>
                                <td>Kewajiban-Kewajiban Perbulan</td>
                                <td>: @IDR($request->analyst->kewajiban)</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>: <b>@IDR($total)</b></td>
                            </tr>
                        @endif
                        @if ($request->analyst->plafon != null)
                            <tr>
                                <td>Plafon</td>
                                <td>: @IDR($request->analyst->plafon)</td>
                            </tr>
                        @endif
                        @if ($request->analyst->Tenor != null)
                            <tr>
                                <td>Bunga</td>
                                <td>: 30%</td>
                            </tr>
                            <tr>
                                <td>Tenor (Jangka Waktu)</td>
                                <td>: {{ $request->analyst->Tenor }} Bulan</td>
                            </tr>
                        @endif
                        @if ($request->analyst->angsuran != null)
                            <tr>
                                <td>Angsuran Perbulan</td>
                                <td>: <b>@IDR($request->analyst->angsuran)</b></td>
                            </tr>
                        @endif
                        @if ($request->analyst->gaji != null && $request->analyst->angsuran != null)
                            <tr>
                                <td>Hasil Analisa</td>
                                <td>
                                    : @if ($total > $request->analyst->angsuran)
                                        <a href="#" class="btn btn-success">
                                            <h1>APPROVE</h1>
                                        </a>
                                    @elseif ($total < $request->analyst->angsuran)
                                        <a href="#" class="btn btn-danger">
                                            <h1>REJECT</h1>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
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
                    <a href="/dirut" class="btn btn-warning my-2 mx-2">Kembali</a>
                </div>
                <div id="fullpage" onclick="this.style.display='none';"></div>
            </div>
        </div>
    </div>

    <!-- Modal Penghasilan-->
    {{-- <div class="modal fade" id="penghasilan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Penghasilan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dirut/{{ $request->analyst->id }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="input" value="1">
                        <div class="form-group">
                            <label for="gaji">Gaji Perbulan</label>
                            <input type="number" class="form-control @error('gaji') is-invalid @enderror" name="gaji"
                                placeholder="Gaji Perbulan" value="{{ old('gaji', $request->analyst->gaji) }}">
                            @error('gaji')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya-Biaya Perbulan</label>
                            <input type="number" class="form-control @error('biaya') is-invalid @enderror" name="biaya"
                                placeholder="Biaya-Biaya Perbulan" value="{{ old('biaya', $request->analyst->biaya) }}">
                            @error('biaya')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kewajiban">Kewajiban-Kewajiban Perbulan</label>
                            <input type="number" class="form-control @error('kewajiban') is-invalid @enderror"
                                name="kewajiban" placeholder="Kewajiban-Kewajiban Perbulan"
                                value="{{ old('kewajiban', $request->analyst->kewajiban) }}">
                            @error('kewajiban')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal Permohonan-->
    {{-- <div class="modal fade" id="permohonan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Permohonan Kredit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dirut/{{ $request->analyst->id }}" method="post">
                        @method('put')
                        @csrf
                        <input type="hidden" name="input" value="2">
                        <div class="form-group">
                            <label for="plafon">Plafon</label>
                            <input type="number" class="form-control @error('plafon') is-invalid @enderror"
                                name="plafon" placeholder="Plafon"
                                value="{{ old('plafon', $request->analyst->plafon) }}">
                            @error('plafon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tenor">Tenor (Jangka Waktu Bulan) </label>
                            <input type="number" class="form-control @error('tenor') is-invalid @enderror"
                                name="tenor" placeholder="Tenor (Jangka Waktu Bulan)"
                                value="{{ old('tenor', $request->analyst->tenor) }}">
                            @error('tenor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bunga">Bunga (%)</label>
                            <input type="number" class="form-control @error('bunga') is-invalid @enderror"
                                name="bunga" placeholder="Bunga (%)" value="30" readonly>
                            @error('bunga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="angsuran">Angsuran Perbulan</label>
                            <input type="number" class="form-control @error('angsuran') is-invalid @enderror"
                                name="angsuran" placeholder="Angsuran Perbulan"
                                value="{{ old('angsuran', $request->analyst->angsuran) }}">
                            @error('angsuran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

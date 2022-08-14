@extends('layouts.main')

@section('container')
    @php
    $total = $request->analyst->gaji - $request->analyst->biaya - $request->analyst->kewajiban;
    @endphp
    <div class="col-lg-15">
        <div class="row">
            <div class="table-responsive col-lg-15 mb-5">
                <table class="table table-sm" id="tabel-print">
                    <thead>
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Data</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Nomor Induk Kependudukan</td>
                            <td>: {{ $request->nik }}</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Nama</td>
                            <td>: {{ $request->nama }}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Alamat</td>
                            <td>: {{ $request->alamat }}</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Status</td>
                            <td>: {{ $request->status }}</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Nama Instansi</td>
                            <td>: {{ $request->namainstansi }}</td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Alamat Instansi</td>
                            <td>: {{ $request->alamatinstansi }}</td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Golongan/Jabatan</td>
                            <td>: {{ $request->jabatan }}</td>
                        </tr>
                        @if ($request->analyst->gaji != null)
                            <tr>
                                <td>8.</td>
                                <td>Gaji Perbulan</td>
                                <td>: @IDR($request->analyst->gaji)</td>
                            </tr>
                        @endif
                        @if ($request->analyst->biaya != null)
                            <tr>
                                <td>9.</td>
                                <td>Biaya-Biaya Perbulan</td>
                                <td>: @IDR($request->analyst->biaya)</td>
                            </tr>
                        @endif
                        @if ($request->analyst->kewajiban != null)
                            <tr>
                                <td>10.</td>
                                <td>Kewajiban-Kewajiban Perbulan</td>
                                <td>: @IDR($request->analyst->kewajiban)</td>
                            </tr>
                            <tr>
                                <td>11.</td>
                                <td>Total</td>
                                <td>: <b>@IDR($total)</b></td>
                            </tr>
                        @endif
                        @if ($request->analyst->plafon != null)
                            <tr>
                                <td>12.</td>
                                <td>Plafon</td>
                                <td>: @IDR($request->analyst->plafon)</td>
                            </tr>
                        @endif
                        @if ($request->analyst->tenor != null)
                            <tr>
                                <td>13.</td>
                                <td>Bunga</td>
                                <td>: 30%</td>
                            </tr>
                            <tr>
                                <td>14.</td>
                                <td>Tenor (Jangka Waktu)</td>
                                <td>: {{ $request->analyst->tenor }} Bulan</td>
                            </tr>
                        @endif
                        @if ($request->analyst->angsuran != null)
                            <tr>
                                <td>15.</td>
                                <td>Angsuran Perbulan</td>
                                <td>: <b>@IDR($request->analyst->angsuran)</b></td>
                            </tr>
                        @endif
                        @if ($request->analyst->gaji != null && $request->analyst->angsuran != null)
                            <tr>
                                <td>16.</td>
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
                    <a href="/arsip" class="btn btn-warning my-2 mx-2">Kembali</a>
                </div>
                <div id="fullpage" onclick="this.style.display='none';"></div>
            </div>
        </div>
    </div>
@endsection

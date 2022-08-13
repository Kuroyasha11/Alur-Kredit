@extends('layouts.main')

@section('container')
    <div class="col-lg-15">
        {{-- <div class="d-flex justify-content-start my-2">
            <a href="/dirut/create" class="btn btn-success">Tambah</a>
        </div> --}}
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabel-biasa">
                <thead>
                    <tr align="CENTER">
                        <th scope="col" style="width: 5%">No</th>
                        <th scope="col" style="width: 25%">NIK</th>
                        <th scope="col" style="width: 50%">Nama</th>
                        <th scope="col" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($request->count())
                        @foreach ($request as $applicant)
                            <tr>
                                <td align="CENTER">
                                    <b>
                                        {{ $loop->iteration }}
                                    </b>
                                </td>
                                <td align="CENTER">
                                    {{ $applicant->nik }}
                                </td>
                                <td>
                                    @php
                                        $total = $applicant->analyst->gaji - $applicant->analyst->biaya - $applicant->analyst->kewajiban;
                                    @endphp
                                    {{ $applicant->nama }} @if ($applicant->analyst->gaji != null && $applicant->analyst->angsuran != null)
                                        @if ($total > $applicant->analyst->angsuran)
                                            <span class="badge text-bg-success">APPROVE</span>
                                        @elseif ($total < $applicant->analyst->angsuran)
                                            <span class="badge text-bg-danger">REJECT</span>
                                        @endif
                                    @endif
                                </td>
                                <td align="CENTER">
                                    <a <abbr title="Show" href="/dirut/{{ $applicant->id }}" class="btn btn-info"><i
                                            class="bi bi-eye-fill mx-1"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <p class="text-center fs-4">Tidak ada daftar Pemohon</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

@extends('layouts.main')

@section('container')
    <div class="col-lg-15">
        <div class="d-flex justify-content-start my-2">
            <a href="/marketing/create" class="btn btn-success">Tambah</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabel-biasa">
                <thead>
                    <tr align="CENTER">
                        <th scope="col" style="width: 5%">No</th>
                        <th scope="col" style="width: 50%">NIK</th>
                        <th scope="col" style="width: 30%">Nama</th>
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
                                <td>
                                    {{ $applicant->nik }}
                                </td>
                                <td>
                                    {{ $applicant->nama }}
                                </td>
                                <td align="CENTER">
                                    {{-- <a <abbr title="Show" href="/marketing/{{ $applicant->id }}" class="btn btn-info"><i
                                            class="bi bi-eye-fill"></i></a>
                                    <form action="/marketing/{{ $applicant->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button <abbr title="Delete" class="btn btn-danger mx-2"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-x-circle"></i>
                                        </button>
                                    </form> --}}
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

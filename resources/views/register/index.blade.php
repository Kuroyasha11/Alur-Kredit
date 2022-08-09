@extends('layouts.main')

@section('container')
    <div class="table-responsive col-lg-15">
        <table class="table table-hover table-bordered table-biasa">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($request as $user)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            @if ($user->is_admin == 1 && $user->is_analis == 0 && $user->is_komite == 0 && $user->is_marketing == 0)
                                <p>Admin</p>
                            @elseif ($user->is_admin == 0 && $user->is_analis == 1 && $user->is_komite == 0 && $user->is_marketing == 0)
                                <p>Analis</p>
                            @elseif ($user->is_admin == 0 && $user->is_analis == 0 && $user->is_komite == 1 && $user->is_marketing == 0)
                                <p>Komite</p>
                            @elseif ($user->is_admin == 0 && $user->is_analis == 0 && $user->is_komite == 0 && $user->is_marketing == 1)
                                <p>Marketing</p>
                            @endif
                        </td>
                        <td>
                            LOL
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

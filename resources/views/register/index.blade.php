@extends('layouts.main')

@section('container')
    <div class="col-lg-15">
        <div class="d-flex justify-content-start my-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabel-biasa">
                <thead>
                    <tr align="CENTER">
                        <th scope="col" style="width: 5%">No</th>
                        <th scope="col" style="width: 50%">Nama</th>
                        <th scope="col" style="width: 30%">Jabatan</th>
                        <th scope="col" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($request as $user)
                        <tr>
                            <td align="CENTER">
                                <b>
                                    {{ $loop->iteration }}
                                </b>
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
                            <td align="CENTER">
                                <form action="/register/{{ $user->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button <abbr title="Delete" class="btn btn-danger mx-2"
                                        onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="register-box">
                            <div class="card card-outline card-primary">
                                <div class="card-header text-center">
                                    <a href="#" class="h1 text-decoration-none"><b>Register</b></a>
                                </div>
                                <div class="card-body">
                                    <p class="login-box-msg">Register a new member</p>

                                    <form action="/register" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Full Name" name="name" autofocus required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="input-group mb-3">
                                            <label>Jabatan</label>
                                            <select class="form-select @error('jabatan') is-invalid @enderror"
                                                style="width: 100%;" name="jabatan">
                                                <option selected value="1">AO / Marketing</option>
                                                <option value="2">Analis Kredit</option>
                                                <option value="3">Komite Kredit</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" name="email" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Retype password" name="password_confirmation" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>
                                </div>
                                <!-- /.form-box -->
                            </div><!-- /.card -->
                        </div>
                        <!-- /.register-box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

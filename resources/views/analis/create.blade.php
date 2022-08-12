@extends('layouts.main')

@section('container')
    <div class="col-lg-15">
        <div class="row">
            <div class="mx-3 my-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Pemohon Kredit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/marketing" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nik">Nomor Induk Kependudukan</label>
                                <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                    name="nik" placeholder="Masukan NIK" value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Masukan Nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control  @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat" id="alamat"
                                    name="alamat" style="height: 100px">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-select" style="width: 100%;" name="status">
                                    <option selected value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="namainstansi">Nama Instansi</label>
                                <input type="text" class="form-control @error('namainstansi') is-invalid @enderror"
                                    id="namainstansi" name="namainstansi" placeholder="Masukan Nama Instansi"
                                    value="{{ old('namainstansi') }}">
                                @error('namainstansi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamatinstansi">Alamat Instansi</label>
                                <textarea class="form-control  @error('alamatinstansi') is-invalid @enderror" placeholder="Masukan Alamat Instansi"
                                    id="alamatinstansi" name="alamatinstansi" style="height: 100px">{{ old('alamatinstansi') }}</textarea>
                                @error('alamatinstansi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Golongan/Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan" name="jabatan" placeholder="Masukan Golongan/Jabatan"
                                    value="{{ old('jabatan') }}">
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr>
                            <div class="scroll">
                                <div class="col-sm-10">
                                    <div class="card gallery"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Scan Persyaratan</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image[]"
                                            multiple>
                                        <label class="custom-file-label" for="image">Pilih file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary my-2 mx-2">Tambah</button>
                                <a href="/marketing" class="btn btn-warning my-2 mx-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#image').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
    </script>
@endsection

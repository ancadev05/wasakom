@extends('template-dashboard.template-niceadmin')

@section('title')
    Karyawan
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Tambah Karyawan</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card p-3">
           <form action="{{ url('karyawan') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Karyawan:</label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                            id="nama" placeholder="..." value="{{ old('nama') }}">
                        @error('nama')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tempat_lahir">Tempat Lahir:</label>
                        <input class="form-control @error('tempat_lahir') is-invalid @enderror" type="text" name="tempat_lahir"
                            id="tempat_lahir" placeholder="..." value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tgl_lahir">Tanggal Lahir:</label>
                        <input class="form-control @error('tgl_lahir') is-invalid @enderror" type="date" name="tgl_lahir"
                            id="tgl_lahir" value="{{ old('tgl_lahir') }}">
                        @error('tgl_lahir')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="alamat">Alamat:</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat"
                            id="alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="no_wa">No_WA:</label>
                        <input class="form-control @error('no_wa') is-invalid @enderror" type="text" name="no_wa"
                            id="no_wa" value="{{ old('no_wa') }}">
                        @error('no_wa')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email:</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="email" value="{{ old('email') }}">
                        @error('email')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jabatan">Jabatan:</label>
                        <input class="form-control @error('jabatan') is-invalid @enderror" type="text" name="jabatan"
                            id="jabatan" value="{{ old('jabatan') }}">
                        @error('jabatan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control @error('foto') is-invalid @enderror" id="foto"
                            name="foto" type="file">
                        @error('foto')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                        <img id="preview_1" src="#" alt="Image Preview"
                            style="display: none; width: 200px; height: auto;" class="mt-2">
                    </div>
                </div>
            </div>

                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Tambah</button>
                    <a href="{{ url('/karyawan') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
                </div>
           </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#foto').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_1').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection



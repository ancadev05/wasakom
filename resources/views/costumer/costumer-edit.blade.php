@extends('template-dashboard.template-niceadmin')

@section('title')
    Costumer
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Data Costumer</h1>
    </div>

    <section class="section">
        <div class="card p-3">
            <form action="{{ url('costumer/' . $costumer->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama <span
                                    class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                id="nama" value="{{ $costumer->nama }}">
                            @error('nama')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="no_wa">No_Wa <span
                                    class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('no_wa') is-invalid @enderror" type="number" name="no_wa"
                                id="no_wa" value="{{ $costumer->no_wa }}" maxlength="13">
                            @error('no_wa')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat"
                                id="alamat" placeholder="..." rows="3">{{ $costumer->alamat }}</textarea>
                            @error('alamat')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="foto_ktp">Foto KTP</label>
                            <input class="form-control @error('foto_ktp') is-invalid @enderror" type="file" name="foto_ktp"
                                id="foto_ktp" value="{{ old('foto_ktp') }}">
                            @error('foto_ktp')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div> --}}
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-sm btn-primary me-1 shadow-sm">Simpan</button>
                    <a href="{{ url('/costumer') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
                </div>
                
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                // responsive: true
            });

        // new DataTable('#datatables', {
            // responsive: true
        // });
        });
    </script>
@endsection

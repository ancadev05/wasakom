@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Tambah Servisan</h1>
</div>

<section class="section">

    <div class="card p-3">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label" for="tgl_masuk">Tanggal:</label>
                        <input class="form-control @error('tgl_masuk') is-invalid @enderror" type="date" name="tgl_masuk"
                            id="tgl_masuk" value="{{ old('tgl_masuk') }}">
                        @error('tgl_masuk')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="costumer_id">Costumer:</label>
                        <select class="form-select @error('costumer_id') is-invalid @enderror select2" name="costumer_id" id="costumer_id">
                            <option value="" selected>--</option>
                        </select>
                        @error('costumer_id')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="merek">Merek <span
                                class="text-danger fw-bold">*</span>:</label>
                        <select class="form-select @error('merek') is-invalid @enderror" name="merek" id="merek">
                            <option value="" selected>...</option>
                        </select>
                        @error('merek')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tipe">Tipe:</label>
                        <input class="form-control @error('tipe') is-invalid @enderror" type="text" name="tipe"
                            id="tipe" placeholder="..." value="{{ old('tipe') }}">
                        @error('tipe')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label" for="keluhan">Keluhan:</label>
                        <textarea class="form-control @error('keluhan') is-invalid @enderror" type="text" name="keluhan"
                            id="keluhan" placeholder="..." rows="2">{{ old('keluhan') }}</textarea>
                        @error('keluhan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kerusakan">Kerusakan:</label>
                        <textarea class="form-control @error('kerusakan') is-invalid @enderror" type="text" name="kerusakan"
                            id="kerusakan" placeholder="..." rows="2">{{ old('kerusakan') }}</textarea>
                        @error('kerusakan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="estimasi">Estimasi Pengerjaan:</label>
                        <input class="form-control @error('estimasi') is-invalid @enderror" type="date" name="estimasi"
                            id="estimasi" value="{{ old('estimasi') }}">
                        @error('estimasi')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tgl_selesai">Tanggal Selesai:</label>
                        <input class="form-control @error('tgl_selesai') is-invalid @enderror" type="date" name="tgl_selesai"
                            id="tgl_selesai" value="{{ old('tgl_selesai') }}">
                        @error('tgl_selesai')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ket">Keterangan:</label>
                        <textarea class="form-control @error('ket') is-invalid @enderror" type="text" name="ket"
                            id="ket" placeholder="..." rows="2">{{ old('ket') }}</textarea>
                        @error('ket')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="status">Status <span
                                class="text-danger fw-bold">*</span>:</label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="" selected>...</option>
                            @foreach ($status['status'] as $item)
                                <option value="">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="catatan">Catatan:</label>
                        <textarea class="form-control @error('catatan') is-invalid @enderror" type="text" name="catatan"
                            id="catatan" placeholder="..." rows="2">{{ old('catatan') }}</textarea>
                        @error('catatan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    
                </div>
            </div>

            <div class="d-flex justify-content-center my-3">
                <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Simpan</button>
                <a href="{{ url('/servisan-teknisi') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
            </div>
        </form>
    </div>
    
  
</section>



    
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection

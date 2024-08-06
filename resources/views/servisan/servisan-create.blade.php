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
                            <option value="" selected></option>
                            @foreach ($costumers as $item)
                                <option value="{{ $item->id }}" {{ old('costumer_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
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
                            @foreach ($laptop_merek as $item)
                                <option value="{{ $item->id }}" {{ old('merek') == $item->id ? 'selected' : '' }}>
                                    {{ $item->merek }}</option>
                            @endforeach
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
                        <label class="form-label" for="kelengkapan">Kelengkapan:</label>
                        <textarea class="form-control @error('kelengkapan') is-invalid @enderror" type="text" name="kelengkapan"
                            id="kelengkapan" placeholder="..." rows="1">{{ old('kelengkapan') }}</textarea>
                        @error('kelengkapan')
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
                </div>
            </div>

            <div class="d-flex justify-content-center my-3">
                <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Buat</button>
                <a href="{{ url('/servisan') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
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

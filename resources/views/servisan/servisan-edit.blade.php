@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>No. Servisan: {{ $servisan->no_servisan }}</h1>
</div>



<section class="section">

    <div class="card p-3">
        <form action="{{ url('servisan/' . $servisan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- gambar lama --}}
            <input type="hidden" name="gambar_lama" value="{{ $servisan->gambar }}">
            {{-- /gambar lama --}}

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label" for="tgl_masuk">Tanggal:</label>
                        <input class="form-control @error('tgl_masuk') is-invalid @enderror" type="date" name="tgl_masuk"
                            id="tgl_masuk" value="{{ $servisan->tgl_masuk }}">
                        @error('tgl_masuk')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="costumer_id">Costumer:</label>
                        <select class="form-select @error('costumer_id') is-invalid @enderror select2" name="costumer_id" id="costumer_id">
                            <option value="" selected></option>
                            @foreach ($costumer as $item)
                                <option value="{{ $item->id }}" {{ $servisan->costumer_id == $item->id ? 'selected' : '' }}>
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
                                <option value="{{ $item->id }}" {{ $servisan->laptop_merek_id == $item->id ? 'selected' : '' }}>
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
                            id="tipe" placeholder="..." value="{{ $servisan->tipe }}">
                        @error('tipe')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label" for="keluhan">Keluhan:</label>
                        <textarea class="form-control @error('keluhan') is-invalid @enderror" type="text" name="keluhan"
                            id="keluhan" placeholder="..." rows="2">{{ $servisan->keluhan }}</textarea>
                        @error('keluhan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kelengkapan">Kelengkapan:</label>
                        <textarea class="form-control @error('kelengkapan') is-invalid @enderror" type="text" name="kelengkapan"
                            id="kelengkapan" placeholder="..." rows="1">{{ $servisan->kelengkapan }}</textarea>
                        @error('kelengkapan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ket">Keterangan:</label>
                        <textarea class="form-control @error('ket') is-invalid @enderror" type="text" name="ket"
                            id="ket" placeholder="..." rows="2">{{ $servisan->ket }}</textarea>
                        @error('ket')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="gambar" class="form-label">Gambar Laptop</label>
                        <input class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                            name="gambar" type="file">
                        @error('gambar')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                        <img id="preview" src="{{ asset('storage/gambar-laptop-servisan/' . $servisan->gambar) }}" alt="Image Preview"
                            style="width: 200px; height: auto;" class="mt-2">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center my-3 border-top pt-2">
                <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm"><i class="bi bi-floppy"></i> Simpan</button>
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

            $('#gambar').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection

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
            <form action="{{ url('servisan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_masuk">Tanggal:</label>
                            <input class="form-control @error('tgl_masuk') is-invalid @enderror" type="date"
                                name="tgl_masuk" id="tgl_masuk" value="{{ old('tgl_masuk') }}" required>
                            @error('tgl_masuk')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3" id="costumer-lama">
                            <label class="form-label" for="costumer_id">Costumer:</label>
                            <div class="d-flex">
                                <div id="cos_id" class="me-2">
                                    <select class="form-select @error('costumer_id') is-invalid @enderror select2"
                                        name="costumer_id" id="costumer_id">
                                        <option value="" selected></option>
                                        @foreach ($costumers as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('costumer_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('costumer_id')
                                        <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="">
                                    <button type="button" class="btn btn-sm btn-primary shadow-sm mb-3 d-block"
                                        onclick="tc()" id="plus"><i class="bi bi-plus-lg"></i></button>
                                    <button type="button" class="btn btn-sm btn-secondary shadow-sm mb-3 d-none"
                                        onclick="tc()" id="dash"><i class="bi bi-dash-lg"></i></button>
                                </div>
                            </div>

                        </div>


                        <div id="costumer-baru" class="d-none px-3 py-2 shadow-sm  border border-1 mb-3">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Costumer <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                        name="nama" id="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="no_wa">No_Wa <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input class="form-control @error('no_wa') is-invalid @enderror" type="number"
                                        name="no_wa" id="no_wa" value="{{ old('no_wa') }}" maxlength="13">
                                    @error('no_wa')
                                        <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" id="alamat"
                                        placeholder="..." rows="3">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
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
                            <textarea class="form-control @error('keluhan') is-invalid @enderror" type="text" name="keluhan" id="keluhan"
                                placeholder="..." rows="2">{{ old('keluhan') }}</textarea>
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
                            <textarea class="form-control @error('ket') is-invalid @enderror" type="text" name="ket" id="ket"
                                placeholder="..." rows="2">{{ old('ket') }}</textarea>
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
                            <img id="preview" src="#" alt="Image Preview"
                                style="display: none; width: 200px; height: auto;" class="mt-2">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center my-3 border-top pt-2">
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

        function tc() {
            $('#cos_id').slideToggle('slow').toggleClass('d-none')
            $('#costumer-baru').slideToggle('slow').toggleClass('d-none')
            $('#plus').fadeIn('slow').toggleClass('d-none')
            $('#dash').fadeIn('slow').toggleClass('d-none')
        }
    </script>
@endsection

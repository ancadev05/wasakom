@extends('template-dashboard.template-niceadmin')

@section('title')
    Merek & Tipe Laptop
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Tipe Laptop</h1>
    </div><!-- End Page Title -->
    <section class="section">
        {{-- continer content --}}
        <div class="card p-3">
            <form action="{{ url('tambah-tipe') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="merek">Merek <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-select @error('merek') is-invalid @enderror" name="merek" id="merek">
                            <option value="" selected>---</option>
                            @foreach ($laptop_merek as $item)
                                <option value="{{ $item->id }}" {{ old('merek') == $item->id ? 'selected' : '' }}>
                                    {{ $item->merek }}</option>
                            @endforeach
                        </select>
                        @error('merek')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tipe" class="col-sm-3 col-form-label">Tipe Laptop</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe"
                            name="tipe" value="{{ old('tipe') }}">
                        @error('tipe')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="layar_size">Layar Size</label>
                    <div class="col-sm-9">
                        <input class="form-control @error('layar_size') is-invalid @enderror mb-2" type="text"
                            name="layar_size" id="layar_size" value="{{ old('layar_size') }}" placeholder='example: 15,6"'>
                        @error('layar_size')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="layar_resolusi">Resolusi Layar</label>
                    <div class="col-sm-9">
                        <input class="form-control @error('layar_resolusi') is-invalid @enderror" type="text"
                            name="layar_resolusi" id="layar_resolusi" value="{{ old('layar_resolusi') }}"
                            placeholder="example: FHD (1920x1080)">
                        @error('layar_resolusi')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="gambar_1" class="form-label">Gambar 1</label>
                                <input class="form-control @error('gambar_1') is-invalid @enderror" id="gambar_1"
                                    name="gambar_1" type="file">
                                @error('gambar_1')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                                <img id="preview_1" src="#" alt="Image Preview"
                                    style="display: none; width: 200px; height: auto;" class="mt-2">
                            </div>
                            <div class="mb-2">
                                <label for="gambar_2" class="form-label">Gambar 2</label>
                                <input class="form-control @error('gambar_2') is-invalid @enderror" id="gambar_2"
                                    name="gambar_2" type="file">
                                @error('gambar_2')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                                <img id="preview_2" src="#" alt="Image Preview"
                                    style="display: none; width: 200px; height: auto;" class="mt-2">
                            </div>
                            <div class="mb-2">
                                <label for="gambar_3" class="form-label">Gambar 3</label>
                                <input class="form-control @error('gambar_3') is-invalid @enderror" id="gambar_3"
                                    name="gambar_3" type="file">
                                @error('gambar_3')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                                <img id="preview_3" src="#" alt="Image Preview"
                                    style="display: none; width: 200px; height: auto;" class="mt-2">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <label for="gambar_4" class="form-label">Gambar 4</label>
                                <input class="form-control @error('gambar_4') is-invalid @enderror" id="gambar_4"
                                    name="gambar_4" type="file">
                                @error('gambar_4')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                                <img id="preview_4" src="#" alt="Image Preview"
                                    style="display: none; width: 200px; height: auto;" class="mt-2">
                            </div>
                            <div class="mb-2">
                                <label for="gambar_5" class="form-label">Gambar 5</label>
                                <input class="form-control @error('gambar_5') is-invalid @enderror" id="gambar_5"
                                    name="gambar_5" type="file">
                                @error('gambar_5')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                                <img id="preview_5" src="#" alt="Image Preview"
                                    style="display: none; width: 200px; height: auto;" class="mt-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary me-2">Tambah</button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="window.history.back()">Batal</button>
                </div>
            </form>
        </div>

    </section>
@endsection

{{-- script --}}
@section('script')
    <script>
        $(document).ready(function() {
            $('#gambar_1').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_1').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#gambar_2').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_2').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#gambar_3').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_3').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#gambar_4').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_4').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
            $('#gambar_5').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview_5').attr('src', e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection

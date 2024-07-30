@extends('template-dashboard.template-niceadmin')

@section('title')
    Jual Laptop
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Jual Laptop</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card p-3">
            <form action="{{ url('juallaptop') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="costumer_id">Nama User:</label>
                            <span><i class="text-secondary" style="font-size: 11px">Boleh kosong</i></span>
                            <select class="form-select @error('costumer_id') is-invalid @enderror" name="costumer_id"
                                id="costumer_id">
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
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_jual">Tanggal:</label>
                            <span><i class="text-secondary" style="font-size: 11px">Boleh kosong</i></span>
                            <input class="form-control @error('tgl_jual') is-invalid @enderror" type="date"
                                name="tgl_jual" id="tgl_jual" placeholder="..." value="{{ old('tgl_jual') }}">
                            @error('tgl_jual')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="laptop_id">Masukkan ID Laptop:</label>
                            <span><i class="text-danger">*</i></span>
                            <select class="form-select @error('laptop_id') is-invalid @enderror" name="laptop_id"
                                id="laptop_id">
                                <option value="" selected>---</option>
                                @foreach ($laptops as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('laptop_id') == $item->id ? 'selected' : '' }}>
                                        {{ '#' . $item->id . '|' . $item->laptopmerek->merek . '-' . $item->laptoptipe->tipe . ' ' . $item->cpu . '/' . $item->gpu . '/' . $item->ram . '/' . $item->storage }}</option>
                                @endforeach
                            </select>
                            @error('laptop_id')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="harga_jual">Harga Jual:</label>
                            <span><i class="text-secondary" style="font-size: 11px">Boleh kosong</i></span>
                            <input class="form-control @error('harga_jual') is-invalid @enderror" type="number" name="harga_jual"
                                id="harga_jual" placeholder="..." value="{{ old('harga_jual') }}">
                            @error('harga_jual')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <span><i class="text-secondary" style="font-size: 11px">Boleh kosong</i></span>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" type="text" name="keterangan"
                                id="keterangan" placeholder="masukkan keterangan tambahan" rows="5">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Jual</button>
                    <a href="{{ url('/laptop-terjual') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
                </div>
            </form>
        </div>
    </section>
@endsection
